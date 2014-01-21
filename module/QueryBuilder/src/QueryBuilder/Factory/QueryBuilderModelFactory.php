<?php
namespace QueryBuilder\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use QueryBuilder\Model\QueryBuilderModel;

class QueryBuilderModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $query = new QueryBuilderModel($documentManager);

        return $query;
    }
}
