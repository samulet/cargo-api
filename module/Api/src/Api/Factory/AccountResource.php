<?php
namespace Api\Factory;

use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\Account\AccountResource as AccountController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountResource implements FactoryInterface
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

        return new AccountController(
            $serviceLocator->get('AccountModel'),
            $serviceLocator->get('CompanyUserModel'),
            $serviceLocator->get('CompanyModel'),
            $identity
        );
    }
}
