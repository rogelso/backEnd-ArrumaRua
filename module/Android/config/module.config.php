<?php
return [
    'service_manager' => [
        'factories' => [
            \Android\V1\Rest\User\UserResource::class => \Android\V1\Rest\User\UserResourceFactory::class,
            \Android\V1\Rest\Publicacao\PublicacaoResource::class => \Android\V1\Rest\Publicacao\PublicacaoResourceFactory::class,
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
            'android.rest.publicacao' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/publicacao[/:publicacao_id]',
                    'defaults' => [
                        'controller' => 'Android\\V1\\Rest\\Publicacao\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'android.rest.user',
            1 => 'android.rest.publicacao',
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
        'Android\\V1\\Rest\\Publicacao\\Controller' => [
            'listener' => \Android\V1\Rest\Publicacao\PublicacaoResource::class,
            'route_name' => 'android.rest.publicacao',
            'route_identifier_name' => 'publicacao_id',
            'collection_name' => 'publicacao',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Android\V1\Rest\Publicacao\PublicacaoEntity::class,
            'collection_class' => \Android\V1\Rest\Publicacao\PublicacaoCollection::class,
            'service_name' => 'publicacao',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Android\\V1\\Rest\\User\\Controller' => 'HalJson',
            'Android\\V1\\Rest\\Publicacao\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Android\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.android.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Android\\V1\\Rest\\Publicacao\\Controller' => [
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
            'Android\\V1\\Rest\\Publicacao\\Controller' => [
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
            \Android\V1\Rest\Publicacao\PublicacaoEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'android.rest.publicacao',
                'route_identifier_name' => 'publicacao_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Android\V1\Rest\Publicacao\PublicacaoCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'android.rest.publicacao',
                'route_identifier_name' => 'publicacao_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Android\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'Android\\V1\\Rest\\User\\Validator',
        ],
        'Android\\V1\\Rest\\Publicacao\\Controller' => [
            'input_filter' => 'Android\\V1\\Rest\\Publicacao\\Validator',
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
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '1',
                            'max' => '20',
                            'message' => 'O campo username deve conter no máximo 20 caracteres',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [
                            'charlist' => '',
                            'allowAttribs' => '',
                        ],
                    ],
                ],
                'name' => 'username',
                'field_type' => '',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'email',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'nome',
                'field_type' => 'string',
            ],
            4 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'senha',
                'field_type' => 'string',
            ],
        ],
        'Android\\V1\\Rest\\Publicacao\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'id',
                'field_type' => 'integer',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'id_user',
                'field_type' => 'integer',
            ],
            2 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '1',
                            'message' => 'O campo endereço deve conter entre 1 e 30 caracteres',
                            'max' => '30',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [
                            'allowTags' => '',
                        ],
                    ],
                ],
                'name' => 'endereco',
                'field_type' => 'string',
            ],
            3 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '30',
                            'min' => '1',
                            'message' => 'O campo descrição deve conter entre 1 e 30 caracteres',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [
                            'allowTags' => '',
                        ],
                    ],
                ],
                'name' => 'descricao',
                'field_type' => 'string',
            ],
            4 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'img_1',
                'field_type' => 'byte',
            ],
            5 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'img_2',
                'field_type' => 'byte',
            ],
            6 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'img_3',
                'field_type' => 'byte',
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
