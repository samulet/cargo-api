<?php
return array(
    'modules' => array(
        'Application',
        'DoctrineModule',
        'DoctrineMongoODMModule',
        'ZfcBase',
        'ZfcUser',
        'ZfcUserDoctrineMongoODM',
        'AssetManager',
        'ZF\ApiProblem',
        'ZF\MvcAuth',
        'ZF\Hal',
        'ZF\ContentNegotiation',
        'ZF\Rest',
        'ZF\Rpc',
        'ZF\Configuration',
        'ZF\Versioning',
        'ZfcRbac',
        'Api',
        'Account',
        'User',
        'QueryBuilder',
        'AuthToken',
        'Reference',
        'Cargo',
        'ExtService',
        'Place',
        ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
            ),
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}.php')
        )
    );
