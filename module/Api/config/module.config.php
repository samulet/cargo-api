<?php
return array(
    'router' => array(
        'routes' => array(
            'api.rest.account' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/accounts[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Account\\Controller',
                    ),
                ),
            ),
            'api.rest.profile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/profiles[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Profile\\Controller',
                    ),
                ),
            ),
            'api.rest.company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/companies[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Company\\Controller',
                    ),
                ),
            ),
            'api.rest.account-company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/accounts[/:account_uuid]/companies[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\AccountCompany\\Controller',
                    ),
                ),
            ),
            'api.rest.company-employee' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/companies[/:uuid]/employees',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\CompanyEmployee\\Controller',
                    ),
                ),
            ),
            'api.rest.company-partner' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/companies[/:uuid]/partners',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\CompanyPartner\\Controller',
                    ),
                ),
            ),
            'api.rest.resource-meta' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/meta[/:id]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ResourceMeta\\Controller',
                    ),
                ),
            ),
            'api.rest.profile-status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/profile[/:uuid]/status',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ProfileStatus\\Controller',
                    ),
                ),
            ),
            'api.rest.reference' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/ref[/:code]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Reference\\Controller',
                    ),
                ),
            ),
            'api.rest.reference-product-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/ref/product-group[/:code]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ReferenceProductGroup\\Controller',
                    ),
                ),
            ),
            'api.rest.cargo' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/cargo[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Cargo\\Controller',
                    ),
                ),
            ),
            'api.rest.ext-service-company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/service/import/company[/:code]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ExtServiceCompany\\Controller',
                    ),
                ),
            ),
            'api.rest.ext-service-company-intersect' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/service/import/company-intersect[/:code]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\Controller',
                    ),
                ),
            ),
            'api.rest.external-service-place' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/service/import/place[/:code]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ExternalServicePlace\\Controller',
                    ),
                ),
            ),
            'api.rest.external-service-place-intersect' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/service/import/place-intersect[/:code]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\Controller',
                    ),
                ),
            ),
            'api.rest.places' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/places[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\Places\\Controller',
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
            3 => 'api.rest.account-company',
            4 => 'api.rest.company-employee',
            5 => 'api.rest.company-partner',
            6 => 'api.rest.resource-meta',
            7 => 'api.rest.profile-status',
            8 => 'api.rest.reference',
            9 => 'api.rest.reference',
            10 => 'api.rest.reference-product-group',
            11 => 'api.rest.cargo',
            12 => 'api.rest.ext-service',
            13 => 'api.rest.ext-service-company',
            14 => 'api.rest.ext-service-company-intersect',
            15 => 'api.rest.external-service-place',
            16 => 'api.rest.external-service-place-intersect',
            17 => 'api.rest.places',
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'Doctrine\\ODM\\MongoDB\\DocumentManager' => 'doctrine.documentmanager.odm_default',
        ),
        'invokables' => array(),
        'factories' => array(
            'Api\\V1\\Rest\\Account\\AccountResource' => 'Api\\Factory\\AccountResource',
            'Api\\V1\\Rest\\AccountCompany\\AccountCompanyResource' => 'Api\\Factory\\AccountCompanyResource',
            'Api\\V1\\Rest\\Cargo\\CargoResource' => 'Api\\Factory\\CargoResource',
            'Api\\V1\\Rest\\Company\\CompanyResource' => 'Api\\Factory\\CompanyResource',
            'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeResource' => 'Api\\Factory\\CompanyEmployeeResource',
            'Api\\V1\\Rest\\Profile\\ProfileResource' => 'Api\\Factory\\ProfileResource',
            'Api\\V1\\Rest\\Reference\\ReferenceResource' => 'Api\\Factory\\ReferenceResource',
            'Api\\V1\\Rest\\ReferenceProductGroup\\ReferenceProductGroupResource' => 'Api\\Factory\\ReferenceProductGroupResource',
            'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusResource' => 'Api\\Factory\\ProfileStatusResource',
            'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaResource' => 'Api\\Factory\\ResourceMetaResource',
            'Api\\V1\\Rest\\ExtServiceCompany\\ExtServiceCompanyResource' => 'Api\\Factory\\ExtServiceCompanyResource',
            'Api\\V1\\Rest\\ExternalServicePlace\\ExternalServicePlaceResource' => 'Api\\Factory\\ExternalServicePlaceResource',
            'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\CompanyIntersectResource' => 'Api\\Factory\\CompanyIntersectResourceFactory',
            'Api\\V1\\Rest\\Places\\PlacesResource' => 'Api\\Factory\\PlacesResourceFactory',
            'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\ExternalServicePlaceIntersectResource' => 'Api\\Factory\\ExternalServicePlaceIntersectResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'Api\\V1\\Rest\\Account\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Account\\AccountResource',
            'route_name' => 'api.rest.account',
            'identifier_name' => 'account_uuid',
            'collection_name' => 'accounts',
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
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\Account\\AccountEntity',
            'collection_class' => 'Api\\V1\\Rest\\Account\\AccountCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\Profile\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Profile\\ProfileResource',
            'route_name' => 'api.rest.profile',
            'identifier_name' => 'uuid',
            'collection_name' => 'profiles',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'DELETE',
                2 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\Profile\\ProfileEntity',
            'collection_class' => 'Api\\V1\\Rest\\Profile\\ProfileCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\Company\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Company\\CompanyResource',
            'route_name' => 'api.rest.company',
            'identifier_name' => 'uuid',
            'collection_name' => 'companies',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'DELETE',
                2 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'filter',
                1 => 'sort',
            ),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\Company\\CompanyEntity',
            'collection_class' => 'Api\\V1\\Rest\\Company\\CompanyCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\AccountCompany\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\AccountCompany\\AccountCompanyResource',
            'route_name' => 'api.rest.account-company',
            'identifier_name' => 'uuid',
            'collection_name' => 'companies',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\AccountCompany\\AccountCompanyEntity',
            'collection_class' => 'Api\\V1\\Rest\\AccountCompany\\AccountCompanyCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\CompanyEmployee\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeResource',
            'route_name' => 'api.rest.company-employee',
            'identifier_name' => 'company_employee_uuid',
            'collection_name' => 'company_employee',
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
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeEntity',
            'collection_class' => 'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\CompanyPartner\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerResource',
            'route_name' => 'api.rest.company-partner',
            'identifier_name' => 'company_partner_uuid',
            'collection_name' => 'company_partner',
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
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerEntity',
            'collection_class' => 'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\ResourceMeta\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaResource',
            'route_name' => 'api.rest.resource-meta',
            'identifier_name' => 'resource_meta_id',
            'collection_name' => 'resource_meta',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaEntity',
            'collection_class' => 'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaCollection',
            'route_identifier_name' => 'id',
        ),
        'Api\\V1\\Rest\\ProfileStatus\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusResource',
            'route_name' => 'api.rest.profile-status',
            'identifier_name' => 'profile_uuid',
            'collection_name' => 'profile_status',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'DELETE',
                2 => 'POST',
                3 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'PUT',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusEntity',
            'collection_class' => 'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\Reference\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Reference\\ReferenceResource',
            'route_name' => 'api.rest.reference',
            'identifier_name' => 'code',
            'collection_name' => 'references',
            'resource_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\Reference\\ReferenceEntity',
            'collection_class' => 'Api\\V1\\Rest\\Reference\\ReferenceCollection',
            'route_identifier_name' => 'code',
        ),
        'Api\\V1\\Rest\\ReferenceProductGroup\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ReferenceProductGroup\\ReferenceProductGroupResource',
            'route_name' => 'api.rest.reference-product-group',
            'identifier_name' => 'code',
            'collection_name' => 'items',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ReferenceProductGroup\\ReferenceProductGroupEntity',
            'collection_class' => 'Api\\V1\\Rest\\ReferenceProductGroup\\ReferenceProductGroupCollection',
            'route_identifier_name' => 'code',
        ),
        'Api\\V1\\Rest\\Cargo\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Cargo\\CargoResource',
            'route_name' => 'api.rest.cargo',
            'identifier_name' => 'cargo_uuid',
            'collection_name' => 'cargo',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '25',
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\Cargo\\CargoEntity',
            'collection_class' => 'Api\\V1\\Rest\\Cargo\\CargoCollection',
            'route_identifier_name' => 'uuid',
        ),
        'Api\\V1\\Rest\\ExtServiceCompany\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ExtServiceCompany\\ExtServiceCompanyResource',
            'route_name' => 'api.rest.ext-service-company',
            'identifier_name' => 'code',
            'collection_name' => 'ext_service_company',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
                3 => 'PATCH',
                4 => 'PUT',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ExtServiceCompany\\ExtServiceCompanyEntity',
            'collection_class' => 'Api\\V1\\Rest\\ExtServiceCompany\\ExtServiceCompanyCollection',
            'route_identifier_name' => 'code',
        ),
        'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\CompanyIntersectResource',
            'route_name' => 'api.rest.ext-service-company-intersect',
            'identifier_name' => 'code',
            'collection_name' => 'companies',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\ExtServiceCompanyIntersectEntity',
            'collection_class' => 'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\ExtServiceCompanyIntersectCollection',
            'route_identifier_name' => 'code',
        ),
        'Api\\V1\\Rest\\ExternalServicePlace\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ExternalServicePlace\\ExternalServicePlaceResource',
            'route_name' => 'api.rest.external-service-place',
            'identifier_name' => 'code',
            'collection_name' => 'places',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ExternalServicePlace\\ExternalServicePlaceEntity',
            'collection_class' => 'Api\\V1\\Rest\\ExternalServicePlace\\ExternalServicePlaceCollection',
            'route_identifier_name' => 'code',
        ),
        'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\ExternalServicePlaceIntersectResource',
            'route_name' => 'api.rest.external-service-place-intersect',
            'identifier_name' => 'code',
            'collection_name' => 'places',
            'resource_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\ExternalServicePlaceIntersectEntity',
            'collection_class' => 'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\ExternalServicePlaceIntersectCollection',
            'route_identifier_name' => 'code',
        ),
        'Api\\V1\\Rest\\Places\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\Places\\PlacesResource',
            'route_name' => 'api.rest.places',
            'identifier_name' => 'uuid',
            'collection_name' => 'places',
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
            'collection_query_whitelist' => array(
                0 => 'filter',
                1 => 'sort',
            ),
            'page_size' => 25,
            'page_size_param' => 'psize',
            'entity_class' => 'Api\\V1\\Rest\\Places\\PlacesEntity',
            'collection_class' => 'Api\\V1\\Rest\\Places\\PlacesCollection',
            'route_identifier_name' => 'uuid',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Api\\V1\\Rest\\Account\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Profile\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Company\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\AccountCompany\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\CompanyEmployee\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\CompanyPartner\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ResourceMeta\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ProfileStatus\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Reference\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ReferenceProductGroup\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Cargo\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ExtService\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ExtServiceCompany\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ExternalServicePlace\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\Controller' => 'HalJson',
            'Api\\V1\\Rest\\Places\\Controller' => 'HalJson',
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
            'Api\\V1\\Rest\\AccountCompany\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\Controller' => array(
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
            'Api\\V1\\Rest\\AccountCompany\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
        ),
        'accept_whitelist' => array(
            'Api\\V1\\Rest\\ResourceMeta\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\AccountCompany\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
            'Api\\V1\\Rest\\ProfileStatus\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\Profile\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
            'Api\\V1\\Rest\\Company\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
            'Api\\V1\\Rest\\Account\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
            'Api\\V1\\Rest\\Reference\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
                3 => 'application/vnd.api.v1+json',
                4 => 'application/hal+json',
                5 => 'application/json',
            ),
            'Api\\V1\\Rest\\ReferenceProductGroup\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\Cargo\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExtService\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExtServiceCompany\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExternalServicePlace\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\Places\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\Controller' => array(
                0 => 'application/json',
                1 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'Api\\V1\\Rest\\ResourceMeta\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\AccountCompany\\Controller' => array(
                0 => 'application/json',
            ),
            'Api\\V1\\Rest\\ProfileStatus\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\Profile\\Controller' => array(
                0 => 'application/json',
            ),
            'Api\\V1\\Rest\\Company\\Controller' => array(
                0 => 'application/json',
            ),
            'Api\\V1\\Rest\\Account\\Controller' => array(
                0 => 'application/json',
            ),
            'Api\\V1\\Rest\\Reference\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
                2 => 'application/vnd.api.v1+json',
                3 => 'application/json',
            ),
            'Api\\V1\\Rest\\ReferenceProductGroup\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\Cargo\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExtService\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExtServiceCompany\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExternalServicePlace\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\Places\\Controller' => array(
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\Controller' => array(
                0 => 'application/json',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\Controller' => array(
                0 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Api\\V1\\Rest\\Account\\AccountEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.account',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\Account\\AccountCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.account',
            ),
            'Api\\V1\\Rest\\Profile\\ProfileEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.profile',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\Profile\\ProfileCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.profile',
            ),
            'Api\\V1\\Rest\\Company\\CompanyEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.company',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\Company\\CompanyCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.company',
            ),
            'Api\\V1\\Rest\\AccountCompany\\AccountCompanyEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.account-company',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\AccountCompany\\AccountCompanyCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.account-company',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.company-employee',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.company-employee',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.company-partner',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.company-partner',
            ),
            'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaEntity' => array(
                'route_identifier_name' => 'id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.resource-meta',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaCollection' => array(
                'route_identifier_name' => 'id',
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.resource-meta',
            ),
            'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.profile-status',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.profile-status',
            ),
            'Api\\V1\\Rest\\Reference\\ReferenceEntity' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.reference',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\Reference\\ReferenceCollection' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.reference',
            ),
            'Api\\V1\\Rest\\ReferenceProductGroup\\ReferenceProductGroupEntity' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.reference-product-group',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ReferenceProductGroup\\ReferenceProductGroupCollection' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.reference-product-group',
            ),
            'Api\\V1\\Rest\\Cargo\\CargoEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.cargo',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\Cargo\\CargoCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.cargo',
            ),
            'Api\\V1\\Rest\\ExtService\\ExtServiceEntity' => array(
                'identifier_name' => 'ext_service_type',
                'route_name' => 'api.rest.ext-service',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ExtService\\ExtServiceCollection' => array(
                'identifier_name' => 'ext_service_type',
                'route_name' => 'api.rest.ext-service',
                'is_collection' => true,
            ),
            'Api\\V1\\Rest\\ExtServiceCompany\\ExtServiceCompanyEntity' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.ext-service-company',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ExtServiceCompany\\ExtServiceCompanyCollection' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.ext-service-company',
            ),
            'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\ExtServiceCompanyIntersectEntity' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.ext-service-company-intersect',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ExtServiceCompanyIntersect\\ExtServiceCompanyIntersectCollection' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.ext-service-company-intersect',
            ),
            'Api\\V1\\Rest\\ExternalServicePlace\\ExternalServicePlaceEntity' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.external-service-place',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ExternalServicePlace\\ExternalServicePlaceCollection' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.external-service-place',
            ),
            'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\ExternalServicePlaceIntersectEntity' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.external-service-place-intersect',
                'hydrator' => 'Reflection',
            ),
            'Api\\V1\\Rest\\ExternalServicePlaceIntersect\\ExternalServicePlaceIntersectCollection' => array(
                'route_identifier_name' => 'code',
                'entity_identifier_name' => 'code',
                'route_name' => 'api.rest.external-service-place-intersect',
            ),
            'Api\\V1\\Rest\\Places\\PlacesEntity' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.places',
                'hydrator' => 'reflection',
            ),
            'Api\\V1\\Rest\\Places\\PlacesCollection' => array(
                'route_identifier_name' => 'uuid',
                'entity_identifier_name' => 'uuid',
                'route_name' => 'api.rest.places',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Api\\V1\\Rest\\Company\\Controller' => array(
            'input_filter' => 'Api\\V1\\Rest\\Company\\Validator',
        ),
    ),
    'input_filters' => array(
        'Api\\V1\\Rest\\Company\\Validator' => array(
            0 => array(
                'name' => 'uuid',
                'validators' => array(
                    0 => array(
                        'name' => 'stringlength',
                        'options' => array(
                            'max' => '32',
                            'min' => '32',
                        ),
                    ),
                    1 => array(
                        'name' => 'alnum',
                        'options' => array(
                            'allowwhitespace' => 'false',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
