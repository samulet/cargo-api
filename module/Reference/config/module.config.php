<?php
namespace Reference;

return array(
    'controllers' => array(
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
            'ProductGroupModel' => 'Reference\\Model\\ProductGroupModel',
            'ReferenceModel' => 'Reference\\Model\\ReferenceModel',
        ),
        'factories' => array(
            'Reference\\Model\\ProductGroupModel' => 'Reference\\Factory\\ProductGroupModel',
            'Reference\\Model\\ReferenceModel' => 'Reference\\Factory\\ReferenceModelFactory',
        ),
    ),
);
