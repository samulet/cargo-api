<?php
namespace Place\Model;

use Application\Service\AuthorizationServiceAwareInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Place\Entity\PlaceEntity;
use User\Identity\IdentityProvider;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use ZfcRbac\Exception\UnauthorizedException;
use ZfcRbac\Service\AuthorizationService;

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
        if (!empty($data['company']['uuid'])) {
            $companyRepository = $this->documentManager->getRepository('Account\Entity\Company');
            $company = $companyRepository->findOneBy(array('uuid' => $data['company']['uuid']));
            $entity->setCompany($company);
        }

        $this->getEventManager()->trigger('place.create.persist.pre', $this, array('entity' => $entity));
        $this->documentManager->persist($entity);
        $this->documentManager->flush();
        $this->getEventManager()->trigger('place.create.persist.post', $this, array('entity' => $entity));

        return $entity;
    }

    public function fetch()
    {
        if (!$this->getAuthorizationService()->isGranted('get.places')) {
            throw new UnauthorizedException('Dosn`t have permission to get places list');
        }
        $result = array();
        if ($this->getAuthorizationService()->isGranted('get.places.all')) {
            $result = $this->getRepository()->getAvailablePlaces()->toArray();
        }

        return $result;
    }

    /**
     * Удаляет пункт
     *
     * @param string $uuid
     *
     * @return bool
     */
    public function delete($uuid)
    {
        /** @var \Place\Entity\PlaceEntity $entity */
        $entity = $this->getRepository()->findOneBy(array('uuid' => $uuid));
        if (empty($entity)) {
            return false;
        }

        $this->getEventManager()->trigger('place.delete.pre', $this, array('entity' => $entity));
        $this->documentManager->remove($entity);
        $this->documentManager->flush();
        $this->getEventManager()->trigger('place.delete.post', $this, array('entity' => $entity));

        return true;
    }

    /**
     * @param \ZfcRbac\Service\AuthorizationService $authorizationService
     */
    public function setAuthorizationService(AuthorizationService $authorizationService)
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
     * @return \Place\Repository\Place
     */
    protected function getRepository()
    {
        return $this->documentManager->getRepository('Place\\Entity\\PlaceEntity');
    }
}
