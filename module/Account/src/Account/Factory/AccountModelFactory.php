<?php
namespace Account\Factory;

use Account\Model\AccountModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $queryBuilderModel = $serviceLocator->get('QueryBuilderModel');
        $acc = new AccountModel($documentManager, $queryBuilderModel);
        return $acc;
    }
}
