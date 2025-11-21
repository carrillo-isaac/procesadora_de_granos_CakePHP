<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
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
    // Se elimina el método initialize() porque ya no se necesita $this->loadModel()
    
    /**
     * Login method (CORREGIDO para CakePHP 5)
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData('password');
            
            // 🎯 Solución Definitiva: Usar fetchTable para obtener la instancia del modelo.
            $UsuariosTable = $this->fetchTable('Usuarios');
            
            // Buscar el usuario usando la instancia obtenida
            $usuario = $UsuariosTable->findByEmail($email)->first(); 
            
            if ($usuario && password_verify($password, $usuario->password)) {
                $this->request->getSession()->write('Auth.User', [
                    'id' => $usuario->id,
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email
                ]);
                $this->Flash->success(__('¡Bienvenido {0}!', $usuario->nombre));
                // Redirección al home
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']); 
            }
            
            $this->Flash->error(__('Correo o contraseña incorrectos'));
        }
    }
    
    /**
     * Logout method (Añadido)
     */
    public function logout()
    {
        $this->request->getSession()->delete('Auth.User');
        $this->Flash->success(__('Has cerrado sesión correctamente'));
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
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