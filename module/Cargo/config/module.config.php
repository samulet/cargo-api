<?php
namespace Cargo;

return array(
    'controllers' => array(
        'invokables' => array(
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
    'service_manager' => array(
        'aliases' => array(
            'CargoModel' => 'Cargo\\Model\\CargoModel',
        ),
        'factories' => array(
            'Cargo\\Model\\CargoModel' => 'Cargo\\Factory\\CargoModelFactory',
        ),
    ),
);
