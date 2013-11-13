<?php
namespace Account;

use ZF\Apigility\ApigilityModuleInterface;
use Account\Model\AccountModel;
class Module implements ApigilityModuleInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Account\Model\AccountModel' => function ($sm) {
                    $acc = new AccountModel();
                    return $acc;
                }
            ),
        );
    }
} 
