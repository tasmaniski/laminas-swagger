<?php

namespace LaminasSwagger\Factory\Controller;

use Interop\Container\ContainerInterface;
use LaminasSwagger\Controller\SwaggerDocController;

class SwaggerDocControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new SwaggerDocController(
            $container->get('Swagger\Swagger'),
            $container->get('config')
        );
    }
}