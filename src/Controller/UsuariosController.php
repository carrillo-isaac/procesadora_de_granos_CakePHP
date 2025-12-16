<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{
    // ⚠️ EL MÉTODO login() HA SIDO ELIMINADO/MOVIDO A PagesController.php
    
    // ⚠️ EL MÉTODO logout() HA SIDO ELIMINADO/MOVIDO A PagesController.php

    /**
     * Register method (Mantener o mover según se desee)
     */
    public function register()
    {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Hashear la contraseña
            if (!empty($data['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
            
            $usuario = $this->Usuarios->patchEntity($usuario, $data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Registro exitoso. Ya puedes iniciar sesión.'));
                return $this->redirect(['action' => 'login']); // Asegúrate de que esta ruta ahora apunte a /login
            }
            $this->Flash->error(__('No se pudo completar el registro. Intenta de nuevo.'));
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
        $data = $this->request->getData();
        
        // Encriptar la contraseña antes de guardar
        if (!empty($data['contrasena'])) {
            $data['contrasena'] = password_hash($data['contrasena'], PASSWORD_DEFAULT);
        }

        $usuario = $this->Usuarios->patchEntity($usuario, $data);
        if ($this->Usuarios->save($usuario)) {
            $this->Flash->success(__('El usuario ha sido guardado correctamente.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('No se pudo guardar el usuario. Por favor, intenta de nuevo.'));
    }
      $this->set(compact('usuario'));
       }  
    
    public function edit($id = null)
    {
        // ... contenido de edit() ...
    }
    
    public function delete($id = null)
    {
        // ... contenido de delete() ...
    }
}