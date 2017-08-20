<?php
return [
    'controllers'  => [
        'factories'  => [
            'ZendSwagger\Controller\SwaggerDoc' => 'ZendSwagger\Factory\Controller\SwaggerDocControllerFactory',
            'ZendSwagger\Controller\SwaggerUi'  => 'ZendSwagger\Factory\Controller\SwaggerUiControllerFactory',
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [__DIR__ . '/../view'],
        'strategies'          => ['ViewJsonStrategy'],
    ],
    'router' => [
        'routes' => [
            'swagger-resources' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/api/docs',
                    'defaults' => ['controller' => 'ZendSwagger\Controller\SwaggerDoc', 'action' => 'display']
                ]
            ],
            'swagger-resource-detail' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/api/docs/:resource',
                    'defaults' => ['controller' => 'ZendSwagger\Controller\SwaggerDoc', 'action' => 'details']
                ]
            ],
            'swagger-ui' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/api/doc',
                    'defaults' => [
                        'controller' => 'ZendSwagger\Controller\SwaggerUi',
                        'action'     => 'index'
                    ]
                ]
            ]
        ]
    ]
];