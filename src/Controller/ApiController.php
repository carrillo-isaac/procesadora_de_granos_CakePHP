<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class ApiController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
       // Permitir TODAS las acciones del controlador actual
        $this->Authentication->allowUnauthenticated([
            $this->getRequest()->getParam('action')
        ]);

        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', true);
    }
}
