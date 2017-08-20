<?php

namespace ZendSwagger\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SwaggerUiController extends AbstractActionController
{

    public function __construct()
    {

    }

    public function indexAction()
    {
        $viewModel = new ViewModel(['swaggerUrl' => '/api/docs']);

        return $viewModel->setTerminal(true);
    }

}