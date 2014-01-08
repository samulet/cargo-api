<?php
namespace User\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentNotFoundException;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use QueryBuilder\Model\QueryBuilderModel;
use User\Entity\User;
use User\Identity\IdentityProvider;

class UserModel
{
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var \QueryBuilder\Model\QueryBuilderModel
     */
    protected $queryBuilderModel;
    /**
     * @var \Doctrine\ODM\MongoDB\Id\UuidGenerator
     */
    protected $uuidGenerator;
    /**
     * @var IdentityProvider
     */
    protected $identityProvider;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, $identityProvider)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
        $this->identityProvider = $identityProvider;
    }

    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->fetch('User\Entity\User', $data, $uuid);
    }

    /**
     * @param array $data
     *
     * @return \User\Entity\User
     */
    public function create($data)
    {
        $entity = new \User\Entity\User();
        $this->hydrate($entity, $data);

        $this->documentManager->persist($entity);
        $this->documentManager->flush();

        return $entity;
    }

    /**
     * @param string $uuid
     * @param array $data
     *
     * @return \User\Entity\User
     */
    public function update($uuid, $data)
    {
        $entity = $this->fetch(array('uuid' => $uuid));
        $this->hydrate($entity, $data);
        $this->documentManager->persist($entity);
        $this->documentManager->flush();

        return $entity;
    }

    /**
     * Возвращает сущность юзера по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \User\Entity\User|null
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('User\Entity\User', $findParams);
    }

    /**
     * Возвращает массив сущностей юзера по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\User\Entity\User)|null
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll('User\Entity\User', $findParams);
    }

    /**
     * Возвращает текущий статус юзера (активирован, деактивирован....)
     *
     * @param string $uuid uuid юезра
     *
     * @return array()|null
     */
    public function getUserStatus($uuid)
    {
        $user = $this->queryBuilderModel->fetch('User\Entity\User', array('uuid' => $uuid));
        $status = $user->getStatus();
        $status['uuid'] = $user->getUuid();
        return $status;
    }

    /**
     * @param $entity
     * @param $data
     *
     * @return array
     */
    public function hydrate($entity, $data)
    {
        return $this->documentManager->getHydratorFactory()->hydrate($entity, $data);
    }
}
