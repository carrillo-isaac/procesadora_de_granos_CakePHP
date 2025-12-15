<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController as BaseController;
use Cake\Event\EventInterface;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication'); // Asegúrate de que esto esté cargado
        
        // 1. Configuración por defecto: TODO requiere autenticación.
        // 2. Sobrescribe esto en beforeFilter() si es una acción pública.
        
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', true);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        // ************************************************************
        //  AQUÍ ESTÁ LA CORRECCIÓN CLAVE
        // ************************************************************
        
        // Definir qué controladores (y sus acciones) son públicos
        $publicControllers = [
            'Productos' => ['destacados', 'mostrar', 'categoria', 'destacadosId', 'index', 'view'],
            // Agrega otros controladores públicos aquí si los tienes
        ];

        $currentController = $this->getName();
        $currentAction = $this->getRequest()->getParam('action');

        // Si el controlador actual está en la lista de públicos Y la acción también, permitir.
        if (isset($publicControllers[$currentController]) && 
            in_array($currentAction, $publicControllers[$currentController])) 
        {
            $this->Authentication->allowUnauthenticated([$currentAction]);
        }
        
        // No es necesario llamar a setClassName('Json') aquí de nuevo
        // $this->viewBuilder()->setClassName('Json');
    }
}