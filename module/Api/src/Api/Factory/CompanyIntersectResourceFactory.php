<?php
namespace Api\Factory;

use Api\V1\Rest\ExtServiceCompanyIntersect\CompanyIntersectResource as IntersectController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CompanyIntersectResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new IntersectController(
            $serviceLocator->get('ExternalCompanyIntersectModel'),
            $serviceLocator->get('CompanyModel')
        );
    }
}
