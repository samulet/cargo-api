<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\Cargo\CargoResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CargoResource implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        try {
            /** @var \User\Identity\IdentityProvider $identity */
            $identity = $serviceLocator->get('User\Identity\IdentityProvider')->getIdentity();
        } catch (\Exception $e) {
            $prev = $e->getPrevious();
            $exception = empty($prev) ? $e : $prev;
            $code = $exception->getCode();
            if (empty($code)) {
                $code = 500;
            }
            return new AccessDeniedResource($code, $exception->getMessage());
        }
        if (empty($identity)) {
            return new AccessDeniedResource();
        }

        return new Controller($serviceLocator->get('CargoModel'), $identity);
    }
}
