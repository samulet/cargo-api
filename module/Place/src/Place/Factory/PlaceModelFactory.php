<?php
namespace Place\Factory;

use Place\Model\PlaceModel;
use Zend\EventManager\EventManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PlaceModelFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return PlaceModel
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \User\Identity\IdentityProvider $provider */
        $provider = $serviceLocator->get('User\Identity\IdentityProvider');
        /** @var \Doctrine\ODM\MongoDB\DocumentManager $documentManager */
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        /** @var EventManager $eventManager */
        $eventManager = $serviceLocator->get('EventManager');

        $placeModel = new PlaceModel($documentManager, $provider);
        $placeModel->setEventManager($eventManager);
        $placeModel->setHydrator($documentManager->getHydratorFactory());

        return $placeModel;
    }
}
