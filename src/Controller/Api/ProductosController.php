<?php

declare(strict_types=1);

namespace App\Controller\Api;
use App\Controller\ApiController;
use Cake\Http\Exception\NotFoundException;


/**
 * @property \App\Model\Table\ProductosTable $Productos
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class ProductosController extends ApiController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Productos = $this->fetchTable('Productos');
        $this->Categorias = $this->fetchTable('Categorias');
    }

    public function destacados()
    {
        // Obtenemos los campos esenciales para devolver al frontend, solo se muestran lso productos añadidos recientemente
        $query = $this->Productos->find()
            ->select(['id', 'nombre', 'descripcion', 'categoria_id', 'precio', 'ruta_imagen', 'creado_en'])
            ->order(['creado_en' => 'DESC']) // <-- ordenar por el campo correcto
            ->limit(6);

        $lista = $query->all()->toArray();

        $this->set([
            'status' => 'success',
            'data' => $lista
        ]);

        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }
    
    // prueba para producto destacado
    public function destacadosId($idCategoria = null)
    {
        if (!$idCategoria) {
        throw new NotFoundException('Debe enviar una categoría');
    }
        // Obtenemos los campos esenciales para devolver al frontend, solo se muestran lso productos añadidos recientemente
        $query = $this->Productos->find()
            ->where(['categoria_id' => $idCategoria])
            ->select(['id', 'nombre', 'descripcion', 'precio', 'ruta_imagen', 'creado_en'])
            ->order(['creado_en' => 'DESC'])
            ->toArray(); // <-- aquí está la clave

        $lista = $query;

        $this->set([
            'status' => 'success',
            'data' => $lista
        ]);

        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }


    public function mostrar()
    {
        // Obtenemos los campos esenciales para devolver al frontend, solo se muestran lso productos añadidos recientemente
        $query = $this->Productos->find()
            ->select(['id', 'nombre', 'descripcion', 'categoria_id', 'precio', 'ruta_imagen', 'creado_en'])
            ->order(['creado_en' => 'ASC']); // <-- ordenar por el campo correcto

        $lista = $query->all()->toArray();

        $this->set([
            'status' => 'success',
            'data' => $lista
        ]);

        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }

    public function categoria($idCategoria = null)
    {
    if (!$idCategoria) {
        throw new NotFoundException('Debe enviar una categoría');
    }

    $productos = $this->Productos->find()
        ->where(['categoria_id' => $idCategoria])
        ->select(['id', 'nombre', 'descripcion', 'precio', 'ruta_imagen', 'creado_en'])
        ->order(['creado_en' => 'DESC'])
        ->toArray(); // <-- aquí está la clave

    $this->set([
        'status' => 'success',
        'data' => $productos
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
