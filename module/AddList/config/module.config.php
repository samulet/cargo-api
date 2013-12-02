<?php
namespace AddList;

return array(
    'controllers' => array(
        'invokables' => array(
            'AddList\Controller\AddList' => 'AddList\Controller\AddListController',
            'AddList\Controller\Company' => 'AddList\Controller\CompanyController',
            'AddList\Controller\CompanyUser' => 'AddList\Controller\CompanyUserController'
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'odm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);