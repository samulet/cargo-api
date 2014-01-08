<?php
namespace Application\Initializer;

use Zend\Log\LoggerAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerInitializer implements InitializerInterface
{
    /**
     * @inheritdoc
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof LoggerAwareInterface) {
            $logger = $serviceLocator->get('Application\\Log');
            $instance->setLogger($logger);
        }
    }
}
