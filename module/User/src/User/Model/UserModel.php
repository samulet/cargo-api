<?php
namespace User\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use QueryBuilder\Model\QueryBuilderModel;
use User\Entity\User;
use Zend\Log\LoggerAwareInterface;
use Zend\Log\LoggerAwareTrait;

class UserModel implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var \QueryBuilder\Model\QueryBuilderModel
     */
    protected $queryBuilderModel;
    /**
     * @var \ZF\MvcAuth\Identity\IdentityInterface
     */
    protected $identity;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, $identity)
    {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
        $this->identity = $identity;

        $this->setLogger(new \Zend\Log\Logger(['writers' => [['name' => 'null']]]));
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

        $this->getLogger()->info(
            'User profile updated',
            array(
                'initiator' => $this->identity->getAuthenticationIdentity(),
                'uuid' => $uuid,
                'data' => $data,
            )
        );

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
        /** @var \User\Entity\User $user */
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
