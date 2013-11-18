<?php
return array(
    'router' => array(
        'routes' => array(
            'api.rest.account' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/accounts[/:account_uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Account\\Controller',
                    ),
                ),
            ),
            'api.rest.profile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/profiles[/:profile_uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Profile\\Controller',
                    ),
                ),
            ),
            'api.rest.company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/companies[/:company_uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Company\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'api.rest.account',
            1 => 'api.rest.profile',
            2 => 'api.rest.company',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Api\\V1\\Rest\\Account\\AccountResource' => 'Api\\V1\\Rest\\Account\\AccountResource',
            'Api\\V1\\Rest\\Profile\\ProfileResource' => 'Api\\V1\\Rest\\Profile\\ProfileResource',
            'Api\\V1\\Rest\\Company\\CompanyResource' => 'Api\\V1\\Rest\\Company\\CompanyResource',
        ),
    ),
    'zf-rest' => array(
        'Api\\V1\\Rest\\Account\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Account\\AccountResource',
            'route_name' => 'api.rest.account',
            'identifier_name' => 'account_uuid',
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
            'entity_class' => 'Api\\V1\\Rest\\Account\\AccountEntity',
            'collection_class' => 'Api\\V1\\Rest\\Account\\AccountCollection',
        ),
        'Api\\V1\\Rest\\Profile\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Profile\\ProfileResource',
            'route_name' => 'api.rest.profile',
            'identifier_name' => 'profile_uuid',
            'collection_name' => 'profile',
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
            'entity_class' => 'Api\\V1\\Rest\\Profile\\ProfileEntity',
            'collection_class' => 'Api\\V1\\Rest\\Profile\\ProfileCollection',
        ),
        'Api\\V1\\Rest\\Company\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Company\\CompanyResource',
            'route_name' => 'api.rest.company',
            'identifier_name' => 'company_uuid',
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
            'entity_class' => 'Api\\V1\\Rest\\Company\\CompanyEntity',
            'collection_class' => 'Api\\V1\\Rest\\Company\\CompanyCollection',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Api\\V1\\Rest\\Account\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Profile\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Company\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'Api\\V1\\Rest\\Account\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\Profile\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\Company\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'Api\\V1\\Rest\\Account\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\Profile\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\Company\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Api\\V1\\Rest\\Account\\AccountEntity' => array(
                'identifier_name' => 'account_uuid',
                'route_name' => 'api.rest.account',
            ),
            'Api\\V1\\Rest\\Account\\AccountCollection' => array(
                'identifier_name' => 'account_uuid',
                'route_name' => 'api.rest.account',
                'is_collection' => '1',
            ),
            'Api\\V1\\Rest\\Profile\\ProfileEntity' => array(
                'identifier_name' => 'profile_uuid',
                'route_name' => 'api.rest.profile',
            ),
            'Api\\V1\\Rest\\Profile\\ProfileCollection' => array(
                'identifier_name' => 'profile_uuid',
                'route_name' => 'api.rest.profile',
                'is_collection' => '1',
            ),
            'Api\\V1\\Rest\\Company\\CompanyEntity' => array(
                'identifier_name' => 'company_uuid',
                'route_name' => 'api.rest.company',
            ),
            'Api\\V1\\Rest\\Company\\CompanyCollection' => array(
                'identifier_name' => 'company_uuid',
                'route_name' => 'api.rest.company',
                'is_collection' => '1',
            ),
        ),
    ),
);
