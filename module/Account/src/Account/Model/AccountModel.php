<?php
namespace Account\Model;

use Account\Entity\Account as AccountEntity;
use Application\Service\AuthorizationServiceAwareInterface;
use Application\Service\AuthorizationServiceAwareTrait;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use QueryBuilder\Model\QueryBuilderModel;
use User\Identity\IdentityProvider;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\Log\LoggerAwareInterface;
use Zend\Log\LoggerAwareTrait;
use ZfcRbac\Exception\UnauthorizedException;

class AccountModel implements AuthorizationServiceAwareInterface, EventManagerAwareInterface, LoggerAwareInterface
{
    use EventManagerAwareTrait;
    use AuthorizationServiceAwareTrait;
    use LoggerAwareTrait;

    const PERMISSION_CREATE = 'account.create';
    const PERMISSION_DELETE = 'account.delete';
    const PERMISSION_UPDATE = 'account.update';
    const PERMISSION_READ   = 'account.read';

    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var QueryBuilderModel
     */
    protected $queryBuilderModel;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $provider;
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, IdentityProvider $provider)
    {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
        $this->provider = $provider;

        $this->setLogger(new \Zend\Log\Logger(['writers' => [['name' => 'null']]]));
    }

    /**
     * Создать или обновить аккаунт. Возвращает сущность созданного или модифицированого аккаунта
     *
     * @param array  $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Account\Entity\Account|null
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('Account\Entity\Account', $data, $uuid);
    }

    /**
     * Создает новый аккаунт
     *
     * @param array $data
     *
     * @throws \ZfcRbac\Exception\UnauthorizedException
     * @return AccountEntity
     */
    public function create($data)
    {
        if (!$this->authorizationService->isGranted(self::PERMISSION_CREATE)) {
            throw new UnauthorizedException('Insufficient permissions to perform the account creation', 403);
        }

        $entity = new AccountEntity();

        $this->getHydrator()->hydrate($entity, $data);
        $entity->setCreator($this->provider->getIdentity());
        $entity->addStaff($this->provider->getIdentity()->getUuid());
        $entity->activate();

        $this->getEventManager()->trigger('account.create.pre', $this, array('entity' => $entity));
        $this->documentManager->persist($entity);
        $this->documentManager->flush();
        $this->getEventManager()->trigger('account.create.post', $this, array('entity' => $entity));

        return $entity;
    }

    /**
     * Обновляет продуктовую группу
     *
     * Обновление выполняется путем удаления старой записи и создания новой.
     * Новая запись создается из данных предыдущей версии
     *
     * @param string $uuid код продуктовой группы для удаления
     * @param array  $data
     *
     * @throws \Doctrine\ODM\MongoDB\DocumentNotFoundException
     * @throws \ZfcRbac\Exception\UnauthorizedException
     * @return AccountEntity
     */
    public function update($uuid, array $data)
    {
        $this->getLogger()->debug('Change account', ['uuid' => $uuid, 'data' => $data, '_method' => __METHOD__]);

        if (!$this->getAuthorizationService()->isGranted(self::PERMISSION_UPDATE)) {
            $this->getLogger()->debug('Insufficient rights to change a record', ['uuid' => $uuid, '_method' => __METHOD__]);
            throw new UnauthorizedException('Insufficient rights to change an account');
        }

        /** @var AccountEntity $entity */
        $entity = $this->getRepository()->exists()->uuid($uuid)->fetchOne();
        if (empty($entity)) {
            $this->getLogger()->debug('Account not found', ['uuid' => $uuid, '_method' => __METHOD__]);
            throw DocumentNotFoundException::documentNotFound('Account\\Entity\\Account', $uuid);
        }
        $roles = $this->authorizationService->getIdentityRoles();
        if (!in_array('system', $roles) && !in_array('account.admin.' . $uuid, $roles)) {
            throw new UnauthorizedException('Insufficient permissions to perform the account change', 403);
        }

        $newEntity = new AccountEntity();
        $newEntity->setData($entity->getData());
        $newEntity->setDeleted(new \DateTime());

        $this->getHydrator()->hydrate($entity, $data);
        $entity->incrementVersion();

        $this->documentManager->persist($entity);
        $this->documentManager->persist($newEntity);

        $this->documentManager->flush();

        return $entity;
    }

    /**
     * Возвращает сущность аккаунта по унакальному идентификатору
     *
     * @param string $uuid
     *
     * @throws \ZfcRbac\Exception\UnauthorizedException
     * @return \Account\Entity\Account|null
     */
    public function fetch($uuid)
    {
        if (!$this->authorizationService->isGranted(self::PERMISSION_READ)) {
            throw new UnauthorizedException('Insufficient permissions to perform the account fetching', 403);
        }

        /** @var \Account\Entity\Account $entity */
        $entity = $this->getRepository()->exists()->active()->uuid($uuid)->fetchOne();
        if (empty($entity)) {
            return null;
        }

        if (!in_array('system', $this->authorizationService->getIdentityRoles())) {
            $user = $this->provider->getIdentity()->getUuid();
            if (!in_array($user, $entity->getStaff())) {
                throw new UnauthorizedException('Insufficient permissions to perform the account fetching', 403);
            }
        }

        return $entity;
    }

    /**
     * Возвращает массив сущностей аккаунтов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @throws \ZfcRbac\Exception\UnauthorizedException
     * @return \Account\Entity\Account[]|null
     */
    public function fetchAll($findParams)
    {
        if (!$this->authorizationService->isGranted(self::PERMISSION_READ)) {
            throw new UnauthorizedException('Insufficient permissions to perform the account creation', 403);
        }

        $query = $this->getRepository()->exists()->active();

        if (!in_array('system', $this->authorizationService->getIdentityRoles())) {
            $uuid = $this->provider->getIdentity()->getUuid();
            $query->user($uuid);
        }

        return $query->fetchAll()->toArray();
    }

    /**
     * Удалить аккаунт. При успехе возвращает uuid удаленого аккаунта
     *
     * @param string $uuid uuid аккаунта
     *
     * @return string|null
     */
    public function delete($uuid)
    {
        $this->queryBuilderModel->delete('Account\Entity\Account', array('uuid' => $uuid));
    }

    /**
     * @param \Doctrine\ODM\MongoDB\Hydrator\HydratorInterface $hydrator
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @throws \RuntimeException
     * @return \Doctrine\ODM\MongoDB\Hydrator\HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @return \Account\Repository\AccountRepository
     */
    protected function getRepository()
    {
        return $this->documentManager->getRepository('Account\\Entity\\Account');
    }
}
