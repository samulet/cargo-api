<?php
namespace QueryBuilder;

return array(
    'controllers' => array(
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',
            ),
            'odm_default' => array(
                'drivers' => array(
                )
            )
        )
    ),
    'service_manager' => array(
        'aliases' => array(
            'QueryBuilderModel' => 'QueryBuilder\\Model\\QueryBuilderModel',
        ),
        'factories' => array(
            'QueryBuilder\\Model\\QueryBuilderModel' => 'QueryBuilder\\Factory\\QueryBuilderModelFactory',
        ),
    ),
);
