<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\ProfileStatus\ProfileStatusResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProfileStatusResource implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Controller($serviceLocator->get('UserModel'));
    }
}
