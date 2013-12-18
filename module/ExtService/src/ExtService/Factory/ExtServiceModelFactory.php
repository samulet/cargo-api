<?php

namespace ExtService\Factory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExtServiceModel;

class ExtServiceModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $queryBuilderModel = $serviceLocator->get('QueryBuilderModel');
        $config = $serviceLocator->get('config');
        if(!empty($config)) {
            $configOnline = $config['online'];
        } else {
            $configOnline=null;
        }
        return new ExtServiceModel($documentManager,$queryBuilderModel, $configOnline);
    }
}