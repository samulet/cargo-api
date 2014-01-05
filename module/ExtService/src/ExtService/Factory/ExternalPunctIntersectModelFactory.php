<?php
namespace ExtService\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ExtService\Model\ExternalPunctIntersectModel;

class ExternalPunctIntersectModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ExternalPunctIntersectModel(
            $serviceLocator->get('doctrine.documentmanager.odm_default'),
            $serviceLocator->get('QueryBuilderModel'),
            $serviceLocator->get('ExternalPunctModel')
        );
    }
}
