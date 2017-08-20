<?php

namespace ZendSwagger;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Swagger\Swagger as SwaggerLibrary;

class Module {
    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig() {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__=> __DIR__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Swagger\Swagger' => function($serviceManager) {
                    $config = $serviceManager->get('Config');

                    return new SwaggerLibrary($config['swagger']['paths']);
                },
            )
        );
    }

}
