<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Authentication\Controller\Component\AuthenticationComponent;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication', [
            'logoutRedirect' => '/',
        ]); 
    }
    // 👇 IMPORTANTE: definir acciones públicas
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Permitir acceso SIN login
        $this->Authentication->addUnauthenticatedActions([
            'login',
            'logout',
            'display'
        ]);
    }
}