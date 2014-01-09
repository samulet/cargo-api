<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\Reference\ReferenceResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ReferenceResource implements FactoryInterface
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

        return new Controller($serviceLocator->get('ReferenceModel'), $provider);
    }
}
