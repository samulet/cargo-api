<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\Account\AccountResource as AccountController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new AccountController(
            $serviceLocator->get('AccountModel'),
            $serviceLocator->get('CompanyUserModel'),
            $serviceLocator->get('CompanyModel')
        );
    }
}
