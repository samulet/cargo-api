<?php
namespace Api;

use ZF\Apigility\ApigilityModuleInterface;
use Api\V1\Rest\Account\AccountResource;
use Api\V1\Rest\Profile\ProfileResource;
use Api\V1\Rest\Company\CompanyResource;

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
                'UserModel' => 'User\Factory\UserModelFactory',
                'Api\V1\Rest\Account\AccountResource' => function ($sm) {
                    $accountModel = $sm->get('AccountModel');
                    $companyUserModel = $sm->get('CompanyUserModel');
                    $request = $sm->get('request');
                    $acc = new AccountResource($accountModel,$companyUserModel,$request);
                    return $acc;
                },
                'Api\V1\Rest\Profile\ProfileResource' => function ($sm) {
                    $userModel = $sm->get('UserModel');
                    $user = new ProfileResource($userModel);
                    return $user;
                },
                'Api\V1\Rest\Company\CompanyResource' => function ($sm) {
                    $companyModel = $sm->get('CompanyModel');
                    $com = new CompanyResource($companyModel);
                    return $com;
                },
                'Api\V1\Rest\CompanyEmployee\CompanyEmployeeResource' => function ($sm) {
                    $companyModel = $sm->get('CompanyUserModel');
                    $com = new CompanyResource($companyModel);
                    return $com;
                },
            ),
        );
    }
} 
