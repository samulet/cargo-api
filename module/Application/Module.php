<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        /** @var \Zend\Log\LoggerInterface $logger */
        $logger = $e->getApplication()->getServiceManager()->get('Application\\Log');

        $eventManager->attach('dispatch.error', function ($event) use ($logger) {
            $exception = $event->getResult()->exception;
            if ($exception) {
                $trace = $exception->getTraceAsString();
                $i = 1;
                do {
                    $messages[] = $i++ . ": " . $exception->getMessage();
                } while ($exception = $exception->getPrevious());

                $log = "Exception:\n" . implode("\n", $messages);
                $log .= "\nTrace:\n" . $trace;

                $logger->err($log);
            }
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConsoleBanner()
    {
        return 'Zend Framework API First preview release';
    }

    public function getConsoleUsage()
    {
        return array(
            'development (disable|enable)' => 'Disable or enable development mode',
        );
    }
}
