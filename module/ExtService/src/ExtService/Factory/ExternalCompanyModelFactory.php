<?php
namespace ExtService\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExternalCompanyModel;

class ExternalCompanyModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ExternalCompanyModel($serviceLocator->get('doctrine.documentmanager.odm_default'),$serviceLocator->get('QueryBuilderModel'));
    }
}
