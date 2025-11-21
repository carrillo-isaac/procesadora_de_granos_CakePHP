<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\Api\ApiController;

class ProductosController extends ApiController
{
    public function initialize(): void
    {
        parent::initialize();
        // $this->loadModel('Productos'); // 

    }

    public function destacados()
    {
        // Obtenemos los campos esenciales para devolver al frontend
        $query = $this->Productos->find()
            ->select(['id', 'nombre', 'descripcion', 'categoria_id', 'precio', 'ruta_imagen', 'creado_en'])
            ->order(['creado_en' => 'DESC']) // <-- ordenar por el campo correcto
            ->limit(6);

        // Ejecutar la query y convertir el resultado a array serializable
        // En CakePHP 5 -> all() retorna un ResultSet; toArray() es seguro y serializable
        $lista = $query->all()->toArray();

        $this->set([
            'status' => 'success',
            'data' => $lista
        ]);

        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }


    // GET /api/productos.json
    public function index()
    {
        $productos = $this->Productos->find()->all();
        $this->set([
            'status' => 'success',
            'data' => $productos
        ]);

        // Especificar qué se debe convertir a JSON
        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }

    // GET /api/productos/1.json
    public function view($id = null)
    {
        $producto = $this->Productos->get($id);

        $this->set([
            'status' => 'success',
            'data' => $producto
        ]);
        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }

    // POST /api/productos.json
    public function add()
    {
        $this->request->allowMethod(['post']);

        $productos = $this->fetchTable('Productos');

        $producto = $productos->newEmptyEntity();
        $producto = $productos->patchEntity($producto, $this->request->getData());

        if ($productos->save($producto)) {
            $this->set([
                'status' => 'success',
                'data' => $producto
            ]);
        } else {
            $this->set([
                'status' => 'error',
                'errors' => $producto->getErrors()
            ]);
        }

        $this->viewBuilder()->setOption('serialize', ['status', 'data', 'errors']);
    }


    // PUT /api/productos/1.json
    public function edit($id)
    {
        $producto = $this->Productos->get($id);
        $producto = $this->Productos->patchEntity($producto, $this->request->getData());

        if ($this->Productos->save($producto)) {
            $this->set([
                'status' => 'success',
                'producto' => $producto
            ]);
        } else {
            $this->set([
                'status' => 'error',
                'errors' => $producto->getErrors()
            ]);
        }
    }

    // DELETE /api/productos/1.json
    public function delete($id)
    {
        $producto = $this->Productos->get($id);

        if ($this->Productos->delete($producto)) {
            $this->set(['status' => 'success']);
        } else {
            $this->set(['status' => 'error']);
        }
    }
}
