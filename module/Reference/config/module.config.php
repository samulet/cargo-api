<?php
namespace Reference;

return array(
    'controllers' => array(
        'invokables' => array(
            'Reference\Controller\Reference' => 'Reference\Controller\ReferenceController',
            'Reference\Controller\Company' => 'Reference\Controller\CompanyController',
            'Reference\Controller\CompanyUser' => 'Reference\Controller\CompanyUserController'
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