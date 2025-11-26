<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class ApiController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', true);
    }
}
