<?php
namespace ExtService;

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
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'ExternalCompanyModel' => 'ExtService\\Factory\\ExternalCompanyModelFactory',
            'ExternalCompanyIntersectModel' => 'ExtService\\Factory\\ExternalCompanyIntersectModelFactory',
            'ExternalCompanyImportModel' => 'ExtService\\Factory\\ExternalCompanyImportModelFactory',
            'ExternalPunctModel' => 'ExtService\\Factory\\ExternalPunctModelFactory',
            'ExternalPunctIntersectModel' => 'ExtService\\Factory\\ExternalPunctIntersectModelFactory',
            'ExternalPunctImportModel' => 'ExtService\\Factory\\ExternalPunctImportModelFactory',
        ),
    ),

    'online' => array(
        'vesta' => array(
            'http://vesta2.altlog.ru' => 'a8ER5Kh8dQi3EYnK'
        ),
        'dievas' => array(
            'http://dievas.altlog.ru' => 'BAK6bH8R8N6QRKTQ'
        ),
        'prodrezerv' => array(
            'http://prodrezerv.altlog.ru' => 'N6kERS4GrQQh7D42'
        )
    )
);
