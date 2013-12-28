<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\ExtServiceCompanyIntersect\ExtServiceCompanyIntersectResource as IntersectController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CompanyIntersectResourceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        try {
            /** @var \User\Identity\IdentityProvider $provider */
            $provider = $serviceLocator->get('User\Identity\IdentityProvider');
        } catch (\Exception $e) {
            $prev = $e->getPrevious();
            $exception = empty($prev) ? $e : $prev;
            $code = $exception->getCode();
            if (empty($code)) {
                $code = 500;
            }
            return new AccessDeniedResource($code, $exception->getMessage());
        }

        return new IntersectController(
            $serviceLocator->get('ExternalCompanyIntersectModel'),
            $serviceLocator->get('CompanyModel'),
            $provider
        );
    }
}
