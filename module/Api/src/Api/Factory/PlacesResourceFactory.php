<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\Places\PlacesResource;
use Place\Model\PlaceModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PlacesResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        try {
            /** @var \User\Identity\IdentityProvider $provider */
            $provider = $serviceLocator->get('User\Identity\IdentityProvider');
            /** @var PlaceModel $placeModel */
            $placeModel = $serviceLocator->get('PlaceModel');
        } catch (\Exception $e) {
            $prev = $e->getPrevious();
            $exception = $prev ? : $e;
            return new AccessDeniedResource($exception->getCode(), $exception->getMessage());
        }

        return new PlacesResource($placeModel, $provider);
    }
}
