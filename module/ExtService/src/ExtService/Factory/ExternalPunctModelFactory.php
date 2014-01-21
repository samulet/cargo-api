<?php
namespace ExtService\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExternalPunctModel;

class ExternalPunctModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ExternalPunctModel($serviceLocator->get('doctrine.documentmanager.odm_default'),$serviceLocator->get('QueryBuilderModel'));
    }
}
