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
    )
);
