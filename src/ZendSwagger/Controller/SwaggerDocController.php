<?php

namespace ZendSwagger\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Swagger\Swagger;

class SwaggerDocController extends AbstractActionController
{

    protected $swagger;
    protected $config;

    public function __construct(Swagger $swagger, $config)
    {
        $this->swagger = $swagger;
        $this->config  = $config;
    }

    public function displayAction()
    {
        $jsonModel = new JsonModel();

        return $jsonModel->setVariables($this->swagger->getResourceList());
    }

    public function detailsAction()
    {
        $resource = $this->swagger->getResource('/' . $this->params('resource', null), $this->config['swagger']['resource_options']);

        if($resource === false){
            return new JsonModel();
        }

        return new JsonModel($resource);
    }

}