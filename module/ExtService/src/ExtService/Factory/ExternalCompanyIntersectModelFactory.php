<?php
namespace ExtService\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExternalCompanyIntersectModel;

class ExternalCompanyIntersectModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ExternalCompanyIntersectModel($serviceLocator->get('doctrine.documentmanager.odm_default'),$serviceLocator->get('QueryBuilderModel'),$serviceLocator->get('ExternalCompanyModel'));
    }
}
