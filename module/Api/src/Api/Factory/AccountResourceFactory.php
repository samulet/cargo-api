<?php
namespace Api\Factory;

use Account\Model;
use Api\V1\Rest\Account\AccountResource;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountResourceFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var Model\AccountModel $accountModel */
        $accountModel = $serviceLocator->get('AccountModel');
        /** @var Model\CompanyUserModel $companyUserModel */
        $companyUserModel = $serviceLocator->get('CompanyUserModel');
        /** @var Model\CompanyModel $companyModel */
        $companyModel = $serviceLocator->get('CompanyModel');

        return new AccountResource($accountModel, $companyUserModel, $companyModel);
    }
}
