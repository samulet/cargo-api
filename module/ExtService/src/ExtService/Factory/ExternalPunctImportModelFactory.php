<?php

namespace ExtService\Factory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExternalPunctImportModel;
use ExtService\Provider\OnlineProvider;

class ExternalPunctImportModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        if(!empty($config)) {
            $configOnline = $config['online'];
        } else {
            $configOnline=null;
        }
        return new ExternalPunctImportModel($serviceLocator->get('doctrine.documentmanager.odm_default'),$serviceLocator->get('QueryBuilderModel'), new OnlineProvider($configOnline),$serviceLocator->get('ExternalPunctModel'));
    }
}