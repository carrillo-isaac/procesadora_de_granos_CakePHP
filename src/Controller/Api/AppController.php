<?php
namespace App\Controller\Api;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize();
        // Forzar serialización de respuestas JSON si no usas templates
        $this->viewBuilder()->setClassName('Json');
        // Opcional: desactivar layout
        $this->viewBuilder()->disableAutoLayout();
    }
}
