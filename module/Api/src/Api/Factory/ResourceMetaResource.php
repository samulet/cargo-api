<?php
namespace Api\Factory;

use Api\V1\Rest\ResourceMeta\ResourceMetaResource as Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ResourceMetaResource implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $routes = !empty($config['router']['routes']) ? $config['router']['routes'] : array();
        return new Controller($routes);
    }
}
