<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Controller\Controller;

class ApiController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        // Indica que se trabajará con JSON
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', true);
    }
}
