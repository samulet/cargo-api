<?php
namespace Cargo\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Cargo\Model\CargoModel;

class CargoModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $queryBuilderModel=$serviceLocator->get('QueryBuilderModel');
        $acc = new CargoModel($documentManager,$queryBuilderModel);

        return $acc;
    }
}
