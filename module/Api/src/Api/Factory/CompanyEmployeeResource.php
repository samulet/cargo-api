<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\CompanyEmployee\CompanyEmployeeResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CompanyEmployeeResource implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Controller($serviceLocator->get('CompanyUserModel'));
    }
}
