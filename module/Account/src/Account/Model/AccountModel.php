<?php
namespace Account\Model;

use Account\Entity\Account as AccountEntity;
use Application\Service\AuthorizationServiceAwareInterface;
use Application\Service\AuthorizationServiceAwareTrait;
use Doctrine\ODM\MongoDB\DocumentManager;
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
    const PERMISSION_LIST   = 'account.list';

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
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Account\Entity\Account|null
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('Account\Entity\Account', $data, $uuid);
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Account\Entity\Account|null
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('Account\Entity\Account', $findParams);
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
        if (!$this->authorizationService->isGranted(self::PERMISSION_LIST)) {
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
     * @return \Account\Repository\AccountRepository
     */
    protected function getRepository()
    {
        return $this->documentManager->getRepository('Account\\Entity\\Account');
    }
}
