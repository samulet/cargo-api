<?php

namespace User\Factory;

use User\Identity\IdentityProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory used to create an object identity provider
 */
class IdentityProviderFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return IdentityProvider
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Zend\Authentication\AuthenticationService $authentication */
        $authentication = $serviceLocator->get('authentication');
        /** @var \ZF\MvcAuth\Identity\IdentityInterface $identity */
        $identity = $authentication->getIdentity();

        /** @var \User\Model\UserModel $userModel */
        $userModel = $serviceLocator->get('User\\Model\\UserModel');

        return new IdentityProvider($identity->getAuthenticationIdentity(), $userModel);
    }
}
