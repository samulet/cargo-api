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
            error_log(__METHOD__ . __LINE__);
            /** @var PlaceModel $placeModel */
            $placeModel = $serviceLocator->get('PlaceModel');
            error_log(__METHOD__ . __LINE__);
        } catch (\Exception $e) {
            error_log(__METHOD__ . __LINE__);
            $prev = $e->getPrevious();
            $exception = $prev ? : $e;
            error_log(__METHOD__ . __LINE__);
            return new AccessDeniedResource($exception->getCode(), $exception->getMessage());
        }

        error_log(__METHOD__ . __LINE__);
        return new PlacesResource($placeModel, $provider);
    }
}
