<?php
return [
    'controllers' => [
        'factories' => [],
    ],
    'router' => [
        'routes' => [],
    ],
    'zf-versioning' => [
        'uri' => [],
    ],
    'zf-rpc' => [],
    'zf-content-negotiation' => [
        'controllers' => [],
        'accept_whitelist' => [],
        'content_type_whitelist' => [],
    ],
    'zf-content-validation' => [],
    'input_filter_specs' => [
        'status\\V1\\Rpc\\Ping\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'id',
            ],
        ],
    ],
];
