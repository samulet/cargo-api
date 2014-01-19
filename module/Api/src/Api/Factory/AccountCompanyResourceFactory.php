<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\AccountCompany\AccountCompanyResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountCompanyResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Controller(
            $serviceLocator->get('CompanyModel'),
            $serviceLocator->get('CompanyUserModel')
        );
    }
}
