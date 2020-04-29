<?php

namespace LaminasSwagger\Factory\Controller;

use Interop\Container\ContainerInterface;
use LaminasSwagger\Controller\SwaggerUiController;

class SwaggerUiControllerFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SwaggerUiController();
    }
}