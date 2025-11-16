<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class ProductosController extends AppController
{
    public function index()
    {
        $this->loadModel('productos');

        $productos = $this->Productos->find()->all();

        $this->set([
            'status' => 'success',
            'data' => $productos,
            '_serialize' => ['status', 'data']
        ]);
    }

    public function view($id = null)
    {
        $this->loadModel('Productos');

        $producto = $this->Productos->get($id);

        $this->set([
            'status' => 'success',
            'data' => $producto,
            '_serialize' => ['status', 'data']
        ]);
    }
}
