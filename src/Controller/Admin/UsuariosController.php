<?php

declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{
    /**
     * Register method (Mantener o mover según se desee)
     */
    public function register()
    {
        $usuario = $this->Usuarios->newEmptyEntity();

        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Registro exitoso. Ya puedes iniciar sesión.');
                return $this->redirect('/login');
            }

            $this->Flash->error('No se pudo completar el registro.');
        }

        $this->set(compact('usuario'));
    }


    /**
     * Index method
     */
    public function index()
    {
        $query = $this->Usuarios->find();
        $usuarios = $this->paginate($query);
        $this->set(compact('usuarios'));
    }

    // ... (El resto de métodos: view, add, edit, delete se mantienen iguales)

    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, contain: ['Carrito', 'Facturas']);
        $this->set(compact('usuario'));
    }

    public function add()
    {
        $usuario = $this->Usuarios->newEmptyEntity();

        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity(
                $usuario,
                $this->request->getData()
            );

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuario creado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('No se pudo guardar el usuario.'));
        }

        $this->set(compact('usuario'));
    }


    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity(
                $usuario,
                $this->request->getData()
            );

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuario actualizado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('No se pudo actualizar el usuario.'));
        }

        $this->set(compact('usuario'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $usuario = $this->Usuarios->get($id);

        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('Usuario eliminado correctamente.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el usuario.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions([
            'add',
            'view',
            'edit',
            'register'
        ]);
    }
}
