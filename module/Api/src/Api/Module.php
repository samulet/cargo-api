<?php
namespace Api;

use ZF\Apigility\ApigilityModuleInterface;
use Api\V1\Rest\Account\AccountResource;
use Api\V1\Rest\Profile\ProfileResource;
use Api\V1\Rest\Company\CompanyResource;
use Api\V1\Rest\CompanyEmployee\CompanyEmployeeResource;
use Api\V1\Rest\ResourceMeta\ResourceMetaResource;
use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\AccountCompany\AccountCompanyResource;

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
                'QueryBuilderModel' => 'QueryBuilder\Factory\QueryBuilderModelFactory',
                'CompanyModel' => 'Account\Factory\CompanyModelFactory',
                'CompanyUserModel' => 'Account\Factory\CompanyUserModelFactory',
                'AccountModel' => 'Account\Factory\AccountModelFactory',
                'UserModel' => 'User\Factory\UserModelFactory',
                'Api\V1\Rest\Account\AccountResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());

                    if (!empty($tokenEntity)) {
                        return new AccountResource(
                            $sm->get('AccountModel'),
                            $sm->get('CompanyUserModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\Profile\Controller' => function ($sm) {
                    $authToken=$sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    $queryBuilderModel=$sm->get('QueryBuilderModel');
                    $userEntity=$queryBuilderModel->getUserByToken($authToken);
                    if(!empty($user)) {
                        $userModel = $sm->get('UserModel');
                        $user = new ProfileResource($userModel,$userEntity);
                        return $user;
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\Company\CompanyResource' => function ($sm) {
                    $authToken=$sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    $queryBuilderModel=$sm->get('QueryBuilderModel');
                    $userEntity=$queryBuilderModel->getUserByToken($authToken);
                    if(!empty($user)) {
                        $companyModel = $sm->get('CompanyModel');
                        $com = new CompanyResource($companyModel,$userEntity);
                        return $com;
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\AccountCompany\AccountCompanyResource' => function ($sm) {
                    $authToken=$sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    $queryBuilderModel=$sm->get('QueryBuilderModel');
                    $userEntity=$queryBuilderModel->getUserByToken($authToken);
                    if(!empty($user)) {
                        $companyModel = $sm->get('CompanyModel');
                        $companyUserModel = $sm->get('CompanyUserModel');
                        $com = new AccountCompanyResource($companyModel,$companyUserModel,$userEntity);
                        return $com;
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\CompanyEmployee\CompanyEmployeeResource' => function ($sm) {
                    $authToken=$sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    $queryBuilderModel=$sm->get('QueryBuilderModel');
                    $userEntity=$queryBuilderModel->getUserByToken($authToken);
                    if(!empty($user)) {
                        $companyUserModel = $sm->get('CompanyUserModel');
                        $com = new CompanyEmployeeResource($companyUserModel,$userEntity);
                        return $com;
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\ResourceMeta\ResourceMetaResource' => function ($sm) {
                    $configRouter = $sm->get('Config')['router']['routes'];
                    $recourseMeta= new ResourceMetaResource($configRouter);
                    return $recourseMeta;
                },
                'Api\V1\Rest\ProfileStatus\ProfileStatusResource' => function ($sm) {
                    $authToken=$sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    $queryBuilderModel=$sm->get('QueryBuilderModel');
                    $userEntity=$queryBuilderModel->getUserByToken($authToken);
                    if(!empty($user)) {
                        $userModel = $sm->get('CompanyUserModel');
                        $profileStatusResource = new CompanyEmployeeResource($userModel,$userEntity);
                        return $profileStatusResource;
                    } else {
                        return new AccessDeniedResource();
                    }
                },
            ),
        );
    }
}
