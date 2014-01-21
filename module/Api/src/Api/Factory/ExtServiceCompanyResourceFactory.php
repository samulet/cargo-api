<?php
namespace Api\Factory;

use Api\V1\Rest\ExtServiceCompany\ExtServiceCompanyResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ExtServiceCompanyResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Controller($serviceLocator->get('ExternalCompanyImportModel'));
    }
}
