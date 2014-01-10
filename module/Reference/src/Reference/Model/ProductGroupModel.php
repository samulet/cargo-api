<?php
namespace Reference\Model;

use Api\V1\Rest\ReferenceProductGroup\ReferenceProductGroupEntity;
use Application\Service\AuthorizationServiceAwareInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use QueryBuilder\Model\QueryBuilderModel;
use Reference\Entity\ProductGroup;
use Zend\Log\LoggerAwareInterface;
use Zend\Log\LoggerAwareTrait;
use ZfcRbac\Exception\UnauthorizedException;

class ProductGroupModel implements AuthorizationServiceAwareInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    const PERMISSION_CREATE = 'ref.create';

    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $identityProvider;
    /**
     * @var \ZfcRbac\Service\AuthorizationService
     */
    protected $authorizationService;
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->hydrator = $documentManager->getHydratorFactory();
    }

    /**
     * Создать новую продуктовую группу
     *
     * Возвращает сущность созданного элемента справочника
     *
     * @param array $data Данные для создания новой продуктовой группы
     *
     * @throws \ZfcRbac\Exception\UnauthorizedException
     * @return \Reference\Entity\ProductGroup
     */
    public function create($data)
    {
        if (!$this->getAuthorizationService()->isGranted(self::PERMISSION_CREATE)) {
            throw new UnauthorizedException();
        }

        $entity = new ProductGroup();

        $this->getHydrator()->hydrate($entity, $data);
//        $entity->setCreator($this->identityProvider->getIdentity());

        $this->documentManager->persist($entity);
        $this->documentManager->flush();

        return $entity;
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Reference\Entity\Reference|null
     */
    public function fetch($findParams)
    {
    }

    /**
     * Возвращает массив проуктовых групп
     *
     * @return \Reference\Entity\ProductGroup[]
     */
    public function fetchAll()
    {
        $result = array();
        foreach ($this->getRepository()->exists()->fetchAll() as $doc) {
            $result[] = new ReferenceProductGroupEntity($doc->getData());
        }
        return $result;
    }

    /**
     * Удаляет продуктовую группу
     *
     * @param string $code код продуктовой группы для удаления
     *
     * @throws \Doctrine\ODM\MongoDB\DocumentNotFoundException
     * @return boolean
     */
    public function delete($code)
    {
        $this->getLogger()->debug('Delete product group', ['code' => $code]);

        $entity = $this->getRepository()->exists()->code($code)->fetchOne();
        if (empty($entity)) {
            $this->getLogger()->debug('Product group not found', ['code' => $code]);
            throw DocumentNotFoundException::documentNotFound('Reference\\Entity\\ProductGroup', $code);
        }

        $this->documentManager->remove($entity);
        $this->documentManager->flush();

        return true;
    }

    /**
     * @param \ZfcRbac\Service\AuthorizationService $authorizationService
     */
    public function setAuthorizationService($authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }

    /**
     * @return \ZfcRbac\Service\AuthorizationService
     */
    public function getAuthorizationService()
    {
        return $this->authorizationService;
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
     * @return \Reference\Repository\ProductGroup
     */
    protected function getRepository()
    {
        return $this->documentManager->getRepository('Reference\\Entity\\ProductGroup');
    }
}
