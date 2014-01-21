<?php
namespace Account\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Account\Model\CompanyUserModel;

class CompanyUserModelFactory  implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $queryBuilderModel=$serviceLocator->get('QueryBuilderModel');
        $comUser = new CompanyUserModel($documentManager,$queryBuilderModel);

        return $comUser;
    }
}
