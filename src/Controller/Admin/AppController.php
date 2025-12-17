<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController as BaseController;
use Cake\Event\EventInterface;
use Cake\Http\Exception\ForbiddenException;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize();

        // Layout exclusivo del admin
        $this->viewBuilder()->setLayout('admin');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $identity = $this->request->getAttribute('identity');

        //  Solo admins
        if (!$identity || $identity->rol !== 'admin') {
            throw new ForbiddenException('No tienes permisos para acceder');
        }
    }
}
