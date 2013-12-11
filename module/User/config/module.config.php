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
);
