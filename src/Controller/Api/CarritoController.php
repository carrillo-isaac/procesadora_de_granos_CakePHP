<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\ApiController;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Http\Exception\BadRequestException;

/**
 * @property \App\Model\Table\CarritoTable $Carrito
 * @property \App\Model\Table\ProductosTable $Productos
 */
class CarritoController extends ApiController
{
    public function initialize(): void
    {
        parent::initialize();

        // Cargar tablas
        $this->Carrito = $this->fetchTable('Carrito');
        $this->Productos = $this->fetchTable('Productos');

        $session = $this->request->getSession();

        if (!$session->check('carrito')) {
            $session->write('carrito', []);
        }
    }

    /**
     * GET /api/carrito
     * Listar productos del carrito del usuario logueado
     */
    public function index()
    {
        $identity = $this->request->getAttribute('identity');

        if (!$identity) {
            throw new UnauthorizedException('Debe iniciar sesión');
        }

        $usuarioId = $identity->getIdentifier();

        $carrito = $this->Carrito->find()
            ->where(['usuario_id' => $usuarioId])
            ->contain(['Productos'])
            ->all();

        $this->set([
            'status' => 'success',
            'data' => $carrito
        ]);

        $this->viewBuilder()->setOption('serialize', ['status', 'data']);
    }

    /**
     * POST /api/carrito/agregar
     * Agregar producto al carrito
     */
    public function agregar()
    {
        $this->request->allowMethod(['post']);

        $identity = $this->request->getAttribute('identity');

        if (!$identity) {
            throw new UnauthorizedException('Debe iniciar sesión');
        }

        $usuarioId = $identity->getIdentifier();

        $productoId = $this->request->getData('producto_id');

        if (!$productoId) {
            throw new BadRequestException('Producto no válido');
        }

        // Verificar que el producto exista
        if (!$this->Productos->exists(['id' => $productoId])) {
            throw new BadRequestException('El producto no existe');
        }

        // Buscar si ya está en el carrito
        $item = $this->Carrito->find()
            ->where([
                'usuario_id' => $usuarioId,
                'producto_id' => $productoId
            ])
            ->first();

        if ($item) {
            // Si existe, sumar cantidad
            $item->cantidad += 1;
        } else {
            // Si no existe, crear nuevo
            $item = $this->Carrito->newEntity([
                'usuario_id' => $usuarioId,
                'producto_id' => $productoId,
                'cantidad' => 1
            ]);
        }

        if ($this->Carrito->save($item)) {
            $this->set([
                'status' => 'success',
                'message' => 'Producto agregado al carrito'
            ]);
        } else {
            $this->set([
                'status' => 'error',
                'errors' => $item->getErrors()
            ]);
        }

        $this->viewBuilder()->setOption('serialize', ['status', 'message', 'errors']);
    }
    // POST /api/carrito/mas/{id}
    public function mas($id)
    {
        $this->request->allowMethod(['post']);

        $identity = $this->request->getAttribute('identity');
        if (!$identity) {
            throw new UnauthorizedException();
        }

        $item = $this->Carrito->get($id);

        //  Validar que el item pertenezca al usuario
        if ($item->usuario_id !== $identity->getIdentifier()) {
            throw new UnauthorizedException();
        }

        $item->cantidad += 1;
        $this->Carrito->save($item);

        $this->set(['status' => 'success']);
        $this->viewBuilder()->setOption('serialize', ['status']);
    }


    // POST /api/carrito/menos/{id}
    public function menos($id)
    {
        $this->request->allowMethod(['post']);

        $identity = $this->request->getAttribute('identity');
        if (!$identity) {
            throw new UnauthorizedException();
        }

        $item = $this->Carrito->get($id);

        if ($item->usuario_id !== $identity->getIdentifier()) {
            throw new UnauthorizedException();
        }

        if ($item->cantidad > 1) {
            $item->cantidad -= 1;
            $this->Carrito->save($item);
        }

        $this->set(['status' => 'success']);
        $this->viewBuilder()->setOption('serialize', ['status']);
    }


    // DELETE /api/carrito/{id}
    public function delete($id)
    {
        $this->request->allowMethod(['delete']);

        $identity = $this->request->getAttribute('identity');
        if (!$identity) {
            throw new UnauthorizedException();
        }

        $item = $this->Carrito->get($id);

        if ($item->usuario_id !== $identity->getIdentifier()) {
            throw new UnauthorizedException();
        }

        $this->Carrito->delete($item);

        $this->set(['status' => 'success']);
        $this->viewBuilder()->setOption('serialize', ['status']);
    }
}
