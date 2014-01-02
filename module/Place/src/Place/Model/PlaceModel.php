<?php
namespace Place\Model;

use Application\Service\AuthorizationServiceAwareInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Place\Entity\PlaceEntity;
use User\Identity\IdentityProvider;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

class PlaceModel implements AuthorizationServiceAwareInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $provider;
    /**
     * @var \ZfcRbac\Service\AuthorizationService
     */
    protected $authorizationService;
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    public function __construct(DocumentManager $documentManager, IdentityProvider $provider)
    {
        $this->documentManager = $documentManager;
        $this->provider = $provider;
    }

    /**
     * Сохраняет новую сущность в хранилище
     *
     * @param array $data
     *
     * @return PlaceEntity
     */
    public function create(array $data)
    {
        $entity = new PlaceEntity();
        $this->getHydrator()->hydrate($entity, $data);
        $entity->setCreator($this->provider->getIdentity());
        $this->getEventManager()->trigger('place.create.persist.pre', $this, array('entity' => $entity));
        $this->documentManager->persist($entity);
        $this->documentManager->flush();
        $this->getEventManager()->trigger('place.create.persist.post', $this, array('entity' => $entity));

        return $entity;
    }

    public function fetch()
    {
        if (!$this->getAuthorizationService()->isGranted('get.places')) {

        }
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
}
