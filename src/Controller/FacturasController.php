<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Facturas Controller
 *
 * @property \App\Model\Table\FacturasTable $Facturas
 */
class FacturasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Facturas->find()
            ->contain(['Usuarios']);
        $facturas = $this->paginate($query);

        $this->set(compact('facturas'));
    }

    /**
     * View method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $factura = $this->Facturas->get($id, contain: ['Usuarios', 'FacturaDetalles']);
        $this->set(compact('factura'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $factura = $this->Facturas->newEmptyEntity();
        if ($this->request->is('post')) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
        }
        $usuarios = $this->Facturas->Usuarios->find('list', limit: 200)->all();
        $this->set(compact('factura', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $factura = $this->Facturas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factura = $this->Facturas->patchEntity($factura, $this->request->getData());
            if ($this->Facturas->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura could not be saved. Please, try again.'));
        }
        $usuarios = $this->Facturas->Usuarios->find('list', limit: 200)->all();
        $this->set(compact('factura', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factura = $this->Facturas->get($id);
        if ($this->Facturas->delete($factura)) {
            $this->Flash->success(__('The factura has been deleted.'));
        } else {
            $this->Flash->error(__('The factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
