<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\EventInterface;
// Se elimina la importación del modelo Usuarios (no necesaria al usar fetchTable)

/**
 * Static content controller
 *
 * Este controlador manejará la lógica de login y logout.
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Login method 
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);

        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            return $this->redirect([
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Correo o contraseña incorrectos');
        }
    }
    // Logout method
    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect('/');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        //  Acciones públicas
        $this->Authentication->addUnauthenticatedActions([
            'login',
            'display'
        ]);
    }




    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     * be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     * be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        // verificar si el usuario ya ha iniciado sesión
        $identity = $this->request->getAttribute('identity');

        if ($identity) {
            // Usuario logueado
            $userId = $identity->getIdentifier();
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
