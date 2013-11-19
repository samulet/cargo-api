<?php
namespace Api;

use ZF\Apigility\ApigilityModuleInterface;
use Api\V1\Rest\Account\AccountResource;
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
                'Api\V1\Rest\Account\AccountResource' => function ($sm) {
                    $accountModel = $sm->get('AccountModel');
                    $companyUserModel = $sm->get('CompanyUserModel');
                    $acc = new AccountResource($accountModel,$companyUserModel);
                    return $acc;
                },
            ),
        );
    }
} 
