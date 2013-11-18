<?php
namespace Account;

return array(
    'controllers' => array(
        'invokables' => array(
            'Account\Controller\Account' => 'Account\Controller\AccountController',
            'Account\Controller\Company' => 'Account\Controller\CompanyController',
            'Account\Controller\CompanyUser' => 'Account\Controller\CompanyUserController'
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
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'account' => __DIR__ . '/../view',
        ),
    ),
    'module_layouts' => array(
    ),
);