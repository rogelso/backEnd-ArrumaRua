<?php
return [
    'service_manager' => [
        'factories' => [
            \Android\V1\Rest\User\UserResource::class => \Android\V1\Rest\User\UserResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'android.rest.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'Android\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'android.rest.user',
        ],
    ],
    'zf-rest' => [
        'Android\\V1\\Rest\\User\\Controller' => [
            'listener' => \Android\V1\Rest\User\UserResource::class,
            'route_name' => 'android.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'POST',
                1 => 'PUT',
                2 => 'DELETE',
                3 => 'PATCH',
                4 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Android\V1\Rest\User\UserEntity::class,
            'collection_class' => \Android\V1\Rest\User\UserCollection::class,
            'service_name' => 'user',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Android\\V1\\Rest\\User\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Android\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.android.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Android\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.android.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Android\V1\Rest\User\UserEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'android.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Android\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'android.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Android\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'Android\\V1\\Rest\\User\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Android\\V1\\Rest\\User\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'id',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'username',
                'field_type' => '',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'email',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Android\\V1\\Rest\\User\\Controller' => [
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
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
