<?php
namespace Place\Factory;

use Place\Model\PlaceModel;
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
        error_log(__METHOD__);
        /** @var \User\Identity\IdentityProvider $provider */
        $provider = $serviceLocator->get('User\Identity\IdentityProvider');
        error_log(__METHOD__);
        return new PlaceModel();
    }
}
