<?php

namespace ExtService\Factory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExtServiceModel;
use ExtService\Provider\OnlineProvider;

class ExtServiceModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        if(!empty($config)) {
            $configOnline = $config['online'];
        } else {
            $configOnline=null;
        }
        return new ExtServiceModel($serviceLocator->get('doctrine.documentmanager.odm_default'),$serviceLocator->get('QueryBuilderModel'), new OnlineProvider($configOnline));
    }
}