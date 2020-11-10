<?php
return [
    'service_manager' => [
        'factories' => [
            \addstock\V1\Rest\Enterprise\EnterpriseResource::class => \addstock\V1\Rest\Enterprise\EnterpriseResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'addstock.rest.enterprise' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/enterprise[/:enterprise_id]',
                    'defaults' => [
                        'controller' => 'addstock\\V1\\Rest\\Enterprise\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'addstock.rest.enterprise',
        ],
    ],
    'api-tools-rest' => [
        'addstock\\V1\\Rest\\Enterprise\\Controller' => [
            'listener' => \addstock\V1\Rest\Enterprise\EnterpriseResource::class,
            'route_name' => 'addstock.rest.enterprise',
            'route_identifier_name' => 'enterprise_id',
            'collection_name' => 'enterprise',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \addstock\V1\Rest\Enterprise\EnterpriseEntity::class,
            'collection_class' => \addstock\V1\Rest\Enterprise\EnterpriseCollection::class,
            'service_name' => 'Enterprise',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'addstock\\V1\\Rest\\Enterprise\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'addstock\\V1\\Rest\\Enterprise\\Controller' => [
                0 => 'application/vnd.addstock.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'addstock\\V1\\Rest\\Enterprise\\Controller' => [
                0 => 'application/vnd.addstock.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \addstock\V1\Rest\Enterprise\EnterpriseEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'addstock.rest.enterprise',
                'route_identifier_name' => 'enterprise_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
            ],
            \addstock\V1\Rest\Enterprise\EnterpriseCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'addstock.rest.enterprise',
                'route_identifier_name' => 'enterprise_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'addstock\\V1\\Rest\\Enterprise\\Controller' => [
            'input_filter' => 'addstock\\V1\\Rest\\Enterprise\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'addstock\\V1\\Rest\\Enterprise\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'logo',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'addstock\\V1\\Rest\\Enterprise\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];
