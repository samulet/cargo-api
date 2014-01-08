<?php

namespace User;

return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\User' => 'User\Controller\UserController'
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'Doctrine\ODM\MongoDB\DocumentManager' => 'doctrine.documentmanager.odm_default',
        ),
        'factories' => array(
            'UserModel' => 'User\Factory\UserModelFactory',
            'User\Identity\IdentityProvider' => 'User\Factory\IdentityProviderFactory',
        )
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
