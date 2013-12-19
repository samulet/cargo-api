<?php

namespace User\Factory;

use User\Identity\IdentityProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcRbac\Exception;

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
        /** @var \Zend\Http\Header\GenericHeader $authToken */
        try {
            $authToken = $serviceLocator->get('request')->getHeaders()->get('X-Auth-UserToken');
        } catch (\Exception $e) {
            throw new Exception\UnauthorizedException('Auth token don\'t exists', 403);
        }

        if (empty($authToken)) {
            throw new Exception\UnauthorizedException('Auth token not known', 403);
        }

        /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
        $AuthTokenModel = $serviceLocator->get('AuthToken\\Model\\AuthToken');
        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());

        if (empty($tokenEntity)) {
            throw new Exception\UnauthorizedException('Auth token not found', 403);
        }

        return new IdentityProvider($tokenEntity->getUser());
    }
}
