<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\ExternalServicePlaceIntersect\ExternalServicePlaceIntersectResource as IntersectController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ExternalServicePlaceIntersectResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new IntersectController(
            $serviceLocator->get('ExternalPunctIntersectModel'),
            $serviceLocator->get('PlaceModel')
        );
    }
}
