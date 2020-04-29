<?php

return [
    'controllers'  => [
        'factories' => [
            LaminasSwagger\Controller\SwaggerDocController::class => LaminasSwagger\Factory\Controller\SwaggerDocControllerFactory::class,
            LaminasSwagger\Controller\SwaggerUiController::class  => LaminasSwagger\Factory\Controller\SwaggerUiControllerFactory::class,
        ],
    ],
    'router'       => [
        'routes' => [
            'swagger-resources'       => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/api/docs',
                    'defaults' => ['controller' => LaminasSwagger\Controller\SwaggerDocController::class, 'action' => 'display'],
                ],
            ],
            'swagger-resource-detail' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/api/docs/:resource',
                    'defaults' => ['controller' => LaminasSwagger\Controller\SwaggerDocController::class, 'action' => 'details'],
                ],
            ],
            'swagger-ui'              => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/api/doc',
                    'defaults' => [
                        'controller' => LaminasSwagger\Controller\SwaggerUiController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [__DIR__ . '/../view'],
        'strategies'          => ['ViewJsonStrategy'],
    ],
];