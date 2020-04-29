<?php

namespace LaminasSwagger\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

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