<?php
namespace Application\Factory;

use Application\Authentication\Adapter\TokenAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TokenAdapterFactory  implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \AuthToken\Model\AuthToken $authTokenModel */
        $authTokenModel = $serviceLocator->get('AuthToken\\Model\\AuthToken');

        return new TokenAdapter($authTokenModel);
    }
}
