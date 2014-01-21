<?php

namespace ExtService\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExternalCompanyImportModel;
use ExtService\Provider\OnlineProvider;

class ExternalCompanyImportModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        if (!empty($config)) {
            $configOnline = $config['online'];
        } else {
            $configOnline=null;
        }

        return new ExternalCompanyImportModel($serviceLocator->get('doctrine.documentmanager.odm_default'),$serviceLocator->get('QueryBuilderModel'), new OnlineProvider($configOnline),$serviceLocator->get('ExternalCompanyModel'));
    }
}
