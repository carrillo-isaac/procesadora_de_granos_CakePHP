<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FacturaDetalles Controller
 *
 * @property \App\Model\Table\FacturaDetallesTable $FacturaDetalles
 */
class FacturaDetallesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->FacturaDetalles->find()
            ->contain(['Facturas', 'Productos']);
        $facturaDetalles = $this->paginate($query);

        $this->set(compact('facturaDetalles'));
    }

    /**
     * View method
     *
     * @param string|null $id Factura Detalle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facturaDetalle = $this->FacturaDetalles->get($id, contain: ['Facturas', 'Productos']);
        $this->set(compact('facturaDetalle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $facturaDetalle = $this->FacturaDetalles->newEmptyEntity();
        if ($this->request->is('post')) {
            $facturaDetalle = $this->FacturaDetalles->patchEntity($facturaDetalle, $this->request->getData());
            if ($this->FacturaDetalles->save($facturaDetalle)) {
                $this->Flash->success(__('The factura detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura detalle could not be saved. Please, try again.'));
        }
        $facturas = $this->FacturaDetalles->Facturas->find('list', limit: 200)->all();
        $productos = $this->FacturaDetalles->Productos->find('list', limit: 200)->all();
        $this->set(compact('facturaDetalle', 'facturas', 'productos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Factura Detalle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facturaDetalle = $this->FacturaDetalles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facturaDetalle = $this->FacturaDetalles->patchEntity($facturaDetalle, $this->request->getData());
            if ($this->FacturaDetalles->save($facturaDetalle)) {
                $this->Flash->success(__('The factura detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura detalle could not be saved. Please, try again.'));
        }
        $facturas = $this->FacturaDetalles->Facturas->find('list', limit: 200)->all();
        $productos = $this->FacturaDetalles->Productos->find('list', limit: 200)->all();
        $this->set(compact('facturaDetalle', 'facturas', 'productos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Factura Detalle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facturaDetalle = $this->FacturaDetalles->get($id);
        if ($this->FacturaDetalles->delete($facturaDetalle)) {
            $this->Flash->success(__('The factura detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The factura detalle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
