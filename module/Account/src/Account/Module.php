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
                    $objectManager = $sm->get('doctrine.documentmanager.odm_default');
                    $acc = new AccountModel($objectManager);
                    return $acc;
                },
                'Account\V1\Rest\Account\AccountResource' => function ($sm) {
                    $model = $sm->get('Account\Model\AccountModel');
                    $acc = new V1\Rest\Account\AccountResource($model);
                    return $acc;
                },
            ),
        );
    }
}
