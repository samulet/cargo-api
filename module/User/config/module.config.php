<?php
return array(
    'router' => array(
        'routes' => array(
            'user.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'User\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'user.rest.user',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'User\\V1\\Rest\\User\\UserResource' => 'User\\V1\\Rest\\User\\UserResource',
        ),
    ),
    'zf-rest' => array(
        'User\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'User\\V1\\Rest\\User\\UserResource',
            'route_name' => 'user.rest.user',
            'identifier_name' => 'user_id',
            'collection_name' => 'user',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => 'User\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'User\\V1\\Rest\\User\\UserCollection',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'User\\V1\\Rest\\User\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'User\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.user.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'User\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.user.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'User\\V1\\Rest\\User\\UserEntity' => array(
                'identifier_name' => 'user_id',
                'route_name' => 'user.rest.user',
            ),
            'User\\V1\\Rest\\User\\UserCollection' => array(
                'identifier_name' => 'user_id',
                'route_name' => 'user.rest.user',
                'is_collection' => '1',
            ),
        ),
    ),
);
