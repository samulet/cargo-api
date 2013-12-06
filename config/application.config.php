<?php
/**
 * Configuration file generated by ZF Apigility Admin
 *
 * The previous config file has been stored in application.config.old
 */
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
        'Api',
        'Account',
        'User',
        'QueryBuilder',
        'AuthToken',
        'Reference'
        ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
            ),
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}.php')
        )
    );
