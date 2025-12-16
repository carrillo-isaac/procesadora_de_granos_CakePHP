<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Carrito Controller
 *
 * @property \App\Model\Table\CarritoTable $Carrito
 */
class CarritoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Carrito->find()
            ->contain(['Usuarios', 'Productos']);
        $carrito = $this->paginate($query);

        $this->set(compact('carrito'));
    }

    /**
     * View method
     *
     * @param string|null $id Carrito id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carrito = $this->Carrito->get($id, contain: ['Usuarios', 'Productos']);
        $this->set(compact('carrito'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carrito = $this->Carrito->newEmptyEntity();
        if ($this->request->is('post')) {
            $carrito = $this->Carrito->patchEntity($carrito, $this->request->getData());
            if ($this->Carrito->save($carrito)) {
                $this->Flash->success(__('The carrito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrito could not be saved. Please, try again.'));
        }
        $usuarios = $this->Carrito->Usuarios->find('list', limit: 200)->all();
        $productos = $this->Carrito->Productos->find('list', limit: 200)->all();
        $this->set(compact('carrito', 'usuarios', 'productos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carrito id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carrito = $this->Carrito->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carrito = $this->Carrito->patchEntity($carrito, $this->request->getData());
            if ($this->Carrito->save($carrito)) {
                $this->Flash->success(__('The carrito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrito could not be saved. Please, try again.'));
        }
        $usuarios = $this->Carrito->Usuarios->find('list', limit: 200)->all();
        $productos = $this->Carrito->Productos->find('list', limit: 200)->all();
        $this->set(compact('carrito', 'usuarios', 'productos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carrito id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carrito = $this->Carrito->get($id);
        if ($this->Carrito->delete($carrito)) {
            $this->Flash->success(__('The carrito has been deleted.'));
        } else {
            $this->Flash->error(__('The carrito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
