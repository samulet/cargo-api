<?php
namespace Api\Factory;

use Api\V1\Rest\Reference\ReferenceResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ReferenceResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Controller($serviceLocator->get('ReferenceModel'));
    }
}
