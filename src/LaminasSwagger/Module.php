<?php

namespace LaminasSwagger;

use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Swagger\Swagger as SwaggerLibrary;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'Swagger\Swagger' => function ($serviceManager) {
                    $config = $serviceManager->get('Config');

                    return new SwaggerLibrary($config['swagger']['paths']);
                },
            ],
        ];
    }

}
