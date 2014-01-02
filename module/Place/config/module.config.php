<?php
namespace Place;

return array(
    'service_manager' => array(
        'aliases' => array(
            'PlaceModel' => 'Place\\Model\\PlaceModel',
        ),
        'factories' => array(
            'Place\\Model\\PlaceModel' => 'Place\\Factory\\PlaceModelFactory',
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
