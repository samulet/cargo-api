<?php
return array(
    'router' => array(
        'routes' => array(
            'account.rest.account' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/account[/:account_id]',
                    'defaults' => array(
                        'controller' => 'Account\\V1\\Rest\\Account\\Controller',
                    ),
                ),
            ),
            'account.rest.company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/company[/:company_id]',
                    'defaults' => array(
                        'controller' => 'Account\\V1\\Rest\\Company\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'account.rest.account',
            1 => 'account.rest.company',
        ),
    ),
    'zf-rest' => array(
        'Account\\V1\\Rest\\Account\\Controller' => array(
            'listener' => 'Account\\V1\\Rest\\Account\\AccountResource',
            'route_name' => 'account.rest.account',
            'identifier_name' => 'account_id',
            'collection_name' => 'account',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'PATCH',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => 'Account\\V1\\Rest\\Account\\AccountEntity',
            'collection_class' => 'Account\\V1\\Rest\\Account\\AccountCollection',
        ),
        'Account\\V1\\Rest\\Company\\Controller' => array(
            'listener' => 'Account\\V1\\Rest\\Company\\CompanyResource',
            'route_name' => 'account.rest.company',
            'identifier_name' => 'company_id',
            'collection_name' => 'company',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'PATCH',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => 'Account\\V1\\Rest\\Company\\CompanyEntity',
            'collection_class' => 'Account\\V1\\Rest\\Company\\CompanyCollection',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Account\\V1\\Rest\\Account\\Controller' => 'HalJson',
            'Account\\V1\\Rest\\Company\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'Account\\V1\\Rest\\Account\\Controller' => array(
                0 => 'application/vnd.account.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Account\\V1\\Rest\\Company\\Controller' => array(
                0 => 'application/vnd.account.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'Account\\V1\\Rest\\Account\\Controller' => array(
                0 => 'application/vnd.account.v1+json',
                1 => 'application/json',
            ),
            'Account\\V1\\Rest\\Company\\Controller' => array(
                0 => 'application/vnd.account.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Account\\V1\\Rest\\Account\\AccountEntity' => array(
                'identifier_name' => 'account_id',
                'route_name' => 'account.rest.account',
            ),
            'Account\\V1\\Rest\\Account\\AccountCollection' => array(
                'identifier_name' => 'account_id',
                'route_name' => 'account.rest.account',
                'is_collection' => '1',
            ),
            'Account\\V1\\Rest\\Company\\CompanyEntity' => array(
                'identifier_name' => 'company_id',
                'route_name' => 'account.rest.company',
            ),
            'Account\\V1\\Rest\\Company\\CompanyCollection' => array(
                'identifier_name' => 'company_id',
                'route_name' => 'account.rest.company',
                'is_collection' => '1',
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'Account_driver' => array(
                'class' => 'Doctrine\\ODM\\MongoDB\\Mapping\\Driver\\AnnotationDriver',
                'paths' => array(
                    0 => '/var/www/zend/apigility/module/Account/config/../src/Account/Entity',
                ),
            ),
            'odm_default' => array(
                'drivers' => array(
                    'Account\\Entity' => 'Account_driver',
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Account\\V1\\Rest\\Company\\CompanyResource' => 'Account\\V1\\Rest\\Company\\CompanyResource',
        ),
    ),
);
