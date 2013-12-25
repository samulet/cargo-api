<?php
namespace Api;

use ZF\Apigility\ApigilityModuleInterface;
use Api\V1\Rest\Profile\ProfileResource;
use Api\V1\Rest\Company\CompanyResource;
use Api\V1\Rest\CompanyEmployee\CompanyEmployeeResource;
use Api\V1\Rest\ResourceMeta\ResourceMetaResource;
use Api\V1\Rest\AccessDenied\AccessDeniedResource;
use Api\V1\Rest\AccountCompany\AccountCompanyResource;
use Api\V1\Rest\ProfileStatus\ProfileStatusResource;
use Api\V1\Rest\ReferenceProductGroup\ReferenceProductGroupResource;
use Api\V1\Rest\Reference\ReferenceResource;
use Api\V1\Rest\Cargo\CargoResource;
use Api\V1\Rest\ExtServiceCompany\ExtServiceCompanyResource;
use Api\V1\Rest\ExtServiceCompanyIntersect\ExtServiceCompanyIntersectResource;
use Api\V1\Rest\ExternalServicePlace\ExternalServicePlaceResource;
use Api\V1\Rest\ExternalServicePlaceIntersect\ExternalServicePlaceIntersectResource;
use Exception;

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
                'AuthTokenModel' => 'AuthToken\ModelFactory',
                'QueryBuilderModel' => 'QueryBuilder\Factory\QueryBuilderModelFactory',
                'CompanyModel' => 'Account\Factory\CompanyModelFactory',
                'CompanyUserModel' => 'Account\Factory\CompanyUserModelFactory',
                'AccountModel' => 'Account\Factory\AccountModelFactory',
                'CargoModel' => 'Cargo\Factory\CargoModelFactory',
                'AddListProductGroupModel' => 'Reference\Factory\AddListProductGroupModelFactory',
                'ReferenceModel' => 'Reference\Factory\ReferenceModelFactory',
                'ExternalCompanyModel' => 'ExtService\Factory\ExternalCompanyModelFactory',
                'ExternalCompanyIntersectModel' => 'ExtService\Factory\ExternalCompanyIntersectModelFactory',
                'ExternalCompanyImportModel' => 'ExtService\Factory\ExternalCompanyImportModelFactory',
                'ExternalPunctModel' => 'ExtService\Factory\ExternalPunctModelFactory',
                'ExternalPunctIntersectModel' => 'ExtService\Factory\ExternalPunctIntersectModelFactory',
                'ExternalPunctImportModel' => 'ExtService\Factory\ExternalPunctImportModelFactory',
                'Api\V1\Rest\Profile\ProfileResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ProfileResource(
                            $sm->get('UserModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\Company\CompanyResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new CompanyResource(
                            $sm->get('CompanyModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\AccountCompany\AccountCompanyResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new AccountCompanyResource(
                            $sm->get('CompanyModel'),
                            $sm->get('CompanyUserModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\CompanyEmployee\CompanyEmployeeResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new CompanyEmployeeResource(
                            $sm->get('CompanyUserModel'),
                            $tokenEntity->getUser()
                        );
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
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ProfileStatusResource(
                            $sm->get('UserModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\Reference\ReferenceResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ReferenceResource(
                            $sm->get('ReferenceModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\ReferenceProductGroup\ReferenceProductGroupResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ReferenceProductGroupResource(
                            $sm->get('AddListProductGroupModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\Cargo\CargoResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new CargoResource(
                            $sm->get('CargoModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\ExtServiceCompany\ExtServiceCompanyResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ExtServiceCompanyResource(
                            $sm->get('ExternalCompanyImportModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\ExtServiceCompanyIntersect\ExtServiceCompanyIntersectResource' => function ($sm) {

                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ExtServiceCompanyIntersectResource(
                            $sm->get('ExternalCompanyIntersectModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\ExternalServicePlace\ExternalServicePlaceResource' => function ($sm) {
                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ExternalServicePlaceResource(
                            $sm->get('ExternalPunctImportModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
                'Api\V1\Rest\ExternalServicePlaceIntersect\ExternalServicePlaceIntersectResource' => function ($sm) {

                    /** @var \Zend\Http\Header\GenericHeader $authToken */
                    try {
                        $authToken = $sm->get('request')->getHeaders()->get('X-Auth-UserToken');
                    } catch (Exception $e) {
                        return new AccessDeniedResource();
                    }
                    /** @var \AuthToken\Model\AuthToken $AuthTokenModel */
                    $AuthTokenModel = $sm->get('AuthToken\\Model\\AuthToken');
                    if(!empty($authToken)) {
                        $tokenEntity = $AuthTokenModel->fetch($authToken->getFieldValue());
                    } else {
                        return new AccessDeniedResource();
                    }
                    if (!empty($tokenEntity)) {
                        return new ExternalServicePlaceIntersectResource(
                            $sm->get('ExternalPunctIntersectModel'),
                            $tokenEntity->getUser()
                        );
                    } else {
                        return new AccessDeniedResource();
                    }
                },
            ),
        );
    }
}
