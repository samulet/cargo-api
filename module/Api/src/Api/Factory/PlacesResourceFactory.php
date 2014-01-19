<?php
namespace Api\Factory;

use Api\V1\Rest\Places\PlacesResource;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PlacesResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PlacesResource($serviceLocator->get('PlaceModel'));
    }
}
