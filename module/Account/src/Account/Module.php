<?php
namespace Account;

use ZF\Apigility\ApigilityModuleInterface;
use Account\Model\AccountModel;
use Account\V1\Rest\Account\AccountResource;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use DoctrineMongoODMModule\Service as ODMService;
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
            'aliases' => array(
                'Doctrine\ODM\MongoDB\DocumentManager' => 'doctrine.documentmanager.odm_default',

            ) ,
            'factories' => array(
                'CompanyModel' => 'Account\Factory\CompanyModelFactory',
                'CompanyUserModel' => 'Account\Factory\CompanyUserModelFactory',
                'AccountModel' => 'Account\Factory\AccountModelFactory',
                'Account\V1\Rest\Account\AccountResource' => function ($sm) {
                    $model = $sm->get('AccountModel');
                    $acc = new AccountResource($model);
                    return $acc;
                },
            ),
        );
    }
}
