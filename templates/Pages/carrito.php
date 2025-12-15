<?= $this->Html->css('carrito') ?>
<?= $this->Html->script('carrito') ?>

<div class="carrito-container">

    <!-- HEADER -->
    <div class="carrito-header">
        <i class="bi bi-cart3"></i>
        <h3>Mi Carrito de Compras</h3>
    </div>

    <!-- CARRITO VACÍO -->
    <div id="carrito-vacio" class="carrito-vacio" style="display:none">
        <i class="bi bi-cart-x"></i>
        <h4>Tu carrito está vacío</h4>
        <p>¡Agrega productos para comenzar tu compra!</p>

        <?= $this->Html->link(
            'Ver productos',
            ['controller' => 'Productos', 'action' => 'index'],
            ['class' => 'btn-primary']
        ) ?>
    </div>

    <!-- CARRITO CON PRODUCTOS -->
    <div id="carrito-contenido" style="display:none">

        <div class="carrito-tabla">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="carrito-body">
                    <!-- JS inyecta filas aquí -->
                </tbody>
            </table>
        </div>

        <div class="carrito-total">
            <span>Total:</span>
            <strong id="carrito-total">$0.00</strong>

            <div class="carrito-acciones">
                <button class="btn-danger" id="vaciar-carrito">
                    Vaciar carrito
                </button>
            </div>
        </div>

    </div>
</div>
