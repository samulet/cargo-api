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
            'api.rest.account-company' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/accounts/[/:account_uuid]/companies',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\AccountCompany\\Controller',
                    ),
                ),
            ),
            'api.rest.company-employee' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/companies[/:company_employee_uuid]/employees',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\CompanyEmployee\\Controller',
                    ),
                ),
            ),
            'api.rest.company-partner' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/companies[/:company_partner_uuid]/partners',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\CompanyPartner\\Controller',
                    ),
                ),
            ),
            'api.rest.resource-meta' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/meta[/:resource_meta_id]',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ResourceMeta\\Controller',
                    ),
                ),
            ),
            'api.rest.profile-status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/profile[/:user_uuid]/status',
                    'defaults' => array(
                        'controller' => 'Api\\V1\\Rest\\ProfileStatus\\Controller',
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
        ),
    ),
    'service_manager' => array(
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
        'Api\\V1\\Rest\\AccountCompany\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\AccountCompany\\AccountCompanyResource',
            'route_name' => 'api.rest.account-company',
            'identifier_name' => 'account_company_id',
            'collection_name' => 'account_company',
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
            'page_size_param' => '',
            'entity_class' => 'Api\\V1\\Rest\\AccountCompany\\AccountCompanyEntity',
            'collection_class' => 'Api\\V1\\Rest\\AccountCompany\\AccountCompanyCollection',
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
            'page_size_param' => '',
            'entity_class' => 'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeEntity',
            'collection_class' => 'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeCollection',
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
            'page_size_param' => '',
            'entity_class' => 'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerEntity',
            'collection_class' => 'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerCollection',
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
            'page_size_param' => '',
            'entity_class' => 'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaEntity',
            'collection_class' => 'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaCollection',
        ),
        'Api\\V1\\Rest\\ProfileStatus\\Controller' => array(
            'listener' => 'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusResource',
            'route_name' => 'api.rest.profile-status',
            'identifier_name' => 'profile_status_id',
            'collection_name' => 'profile_status',
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
            'page_size' => '25',
            'page_size_param' => '',
            'entity_class' => 'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusEntity',
            'collection_class' => 'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusCollection',
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
            'Api\\V1\\Rest\\AccountCompany\\AccountCompanyEntity' => array(
                'identifier_name' => 'account_company_id',
                'route_name' => 'api.rest.account-company',
            ),
            'Api\\V1\\Rest\\AccountCompany\\AccountCompanyCollection' => array(
                'identifier_name' => 'account_company_id',
                'route_name' => 'api.rest.account-company',
                'is_collection' => '1',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeEntity' => array(
                'identifier_name' => 'company_employee_uuid',
                'route_name' => 'api.rest.company-employee',
            ),
            'Api\\V1\\Rest\\CompanyEmployee\\CompanyEmployeeCollection' => array(
                'identifier_name' => 'company_employee_uuid',
                'route_name' => 'api.rest.company-employee',
                'is_collection' => '1',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerEntity' => array(
                'identifier_name' => 'company_partner_uuid',
                'route_name' => 'api.rest.company-partner',
            ),
            'Api\\V1\\Rest\\CompanyPartner\\CompanyPartnerCollection' => array(
                'identifier_name' => 'company_partner_uuid',
                'route_name' => 'api.rest.company-partner',
                'is_collection' => '1',
            ),
            'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaEntity' => array(
                'identifier_name' => 'resource_meta_id',
                'route_name' => 'api.rest.resource-meta',
            ),
            'Api\\V1\\Rest\\ResourceMeta\\ResourceMetaCollection' => array(
                'identifier_name' => 'resource_meta_id',
                'route_name' => 'api.rest.resource-meta',
                'is_collection' => '1',
            ),
            'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusEntity' => array(
                'identifier_name' => 'profile_status_id',
                'route_name' => 'api.rest.profile-status',
            ),
            'Api\\V1\\Rest\\ProfileStatus\\ProfileStatusCollection' => array(
                'identifier_name' => 'profile_status_id',
                'route_name' => 'api.rest.profile-status',
                'is_collection' => '1',
            ),
        ),
    ),
);
