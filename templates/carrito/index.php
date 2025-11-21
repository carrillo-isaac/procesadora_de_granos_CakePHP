<div class="carrito index content" style="max-width: 1200px; margin: 40px auto; padding: 30px;">
    
    <!-- Header del carrito -->
    <div style="display: flex; align-items: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #ecf0f1;">
        <i class="bi bi-cart3" style="font-size: 36px; color: #2c3e50; margin-right: 15px;"></i>
        <h3 style="margin: 0; color: #2c3e50; font-weight: 600;">
            <?= __('Mi Carrito de Compras') ?>
        </h3>
    </div>
    
    <?php if (empty($carrito) && empty($carritoSesion)): ?>
        
        <!-- Carrito vacío -->
        <div style="text-align: center; padding: 80px 20px; background: #f8f9fa; border-radius: 12px;">
            <i class="bi bi-cart-x" style="font-size: 80px; color: #bdc3c7; display: block; margin-bottom: 20px;"></i>
            <h4 style="color: #7f8c8d; margin-bottom: 10px;">Tu carrito está vacío</h4>
            <p style="color: #95a5a6; margin-bottom: 30px;">
                ¡Agrega productos para comenzar tu compra!
            </p>
            <?= $this->Html->link(
                '<i class="bi bi-arrow-left"></i> Ver productos',
                ['controller' => 'Productos', 'action' => 'index'],
                [
                    'escape' => false,
                    'style' => 'display: inline-block; padding: 12px 30px; background: #3498db; color: white; text-decoration: none; border-radius: 6px; font-weight: 500; transition: background 0.3s;'
                ]
            ) ?>
        </div>
        
    <?php else: ?>
        
        <!-- Tabla del carrito -->
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #34495e; color: white;">
                        <th style="padding: 15px; text-align: left; font-weight: 600;">Producto</th>
                        <th style="padding: 15px; text-align: center; font-weight: 600;">Precio</th>
                        <th style="padding: 15px; text-align: center; font-weight: 600;">Cantidad</th>
                        <th style="padding: 15px; text-align: center; font-weight: 600;">Subtotal</th>
                        <th style="padding: 15px; text-align: center; font-weight: 600;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($carrito)): ?>
                        <?php foreach ($carrito as $item): ?>
                        <tr style="border-bottom: 1px solid #ecf0f1;">
                            <td style="padding: 20px;">
                                <div style="display: flex; align-items: center;">
                                    <i class="bi bi-box-seam" style="font-size: 24px; color: #95a5a6; margin-right: 15px;"></i>
                                    <span style="font-weight: 500; color: #2c3e50;">
                                        <?= h($item->producto->nombre ?? 'Producto #' . $item->producto_id) ?>
                                    </span>
                                </div>
                            </td>
                            <td style="padding: 20px; text-align: center; color: #27ae60; font-weight: 500;">
                                $<?= number_format($item->producto->precio ?? 0, 2) ?>
                            </td>
                            <td style="padding: 20px; text-align: center;">
                                <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                    <?= $this->Form->create(null, [
                                        'url' => ['action' => 'actualizar', $item->id],
                                        'style' => 'display: flex; align-items: center; gap: 10px;'
                                    ]) ?>
                                    <?= $this->Form->control('cantidad', [
                                        'type' => 'number',
                                        'value' => $item->cantidad,
                                        'min' => 1,
                                        'label' => false,
                                        'style' => 'width: 70px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; text-align: center;'
                                    ]) ?>
                                    <?= $this->Form->button('<i class="bi bi-check-lg"></i>', [
                                        'escape' => false,
                                        'style' => 'padding: 8px 15px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer;'
                                    ]) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </td>
                            <td style="padding: 20px; text-align: center;">
                                <strong style="color: #2c3e50; font-size: 16px;">
                                    $<?= number_format(($item->producto->precio ?? 0) * $item->cantidad, 2) ?>
                                </strong>
                            </td>
                            <td style="padding: 20px; text-align: center;">
                                <?= $this->Form->postLink(
                                    '<i class="bi bi-trash"></i>',
                                    ['action' => 'eliminar', $item->id],
                                    [
                                        'confirm' => '¿Eliminar este producto del carrito?',
                                        'escape' => false,
                                        'style' => 'color: #e74c3c; font-size: 20px; text-decoration: none;'
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <?php if (!empty($carritoSesion)): ?>
                        <?php foreach ($carritoSesion as $id => $item): ?>
                        <tr style="border-bottom: 1px solid #ecf0f1;">
                            <td style="padding: 20px;">
                                <span style="font-weight: 500; color: #2c3e50;">Producto #<?= h($id) ?></span>
                            </td>
                            <td style="padding: 20px; text-align: center; color: #95a5a6;">$0.00</td>
                            <td style="padding: 20px; text-align: center;"><?= h($item['cantidad']) ?></td>
                            <td style="padding: 20px; text-align: center;">$0.00</td>
                            <td style="padding: 20px; text-align: center;">
                                <?= $this->Form->postLink(
                                    '<i class="bi bi-trash"></i>',
                                    ['action' => 'eliminar', $id],
                                    [
                                        'confirm' => '¿Eliminar?',
                                        'escape' => false,
                                        'style' => 'color: #e74c3c; font-size: 20px; text-decoration: none;'
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Total y acciones -->
        <div style="margin-top: 30px; padding: 25px; background: #ecf0f1; border-radius: 12px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <span style="font-size: 24px; font-weight: 600; color: #2c3e50;">Total:</span>
                    <span style="font-size: 32px; font-weight: 700; color: #27ae60; margin-left: 20px;">
                        $<?= number_format($total ?? 0, 2) ?>
                    </span>
                </div>
                <div style="display: flex; gap: 15px;">
                    <?= $this->Form->postLink(
                        'Vaciar carrito',
                        ['action' => 'vaciar'],
                        [
                            'confirm' => '¿Vaciar todo el carrito?',
                            'style' => 'padding: 12px 25px; background: white; color: #e74c3c; text-decoration: none; border-radius: 6px; font-weight: 500; border: 2px solid #e74c3c;'
                        ]
                    ) ?>
                    
                    <?= $this->Html->link(
                        'Proceder al pago',
                        ['controller' => 'Facturas', 'action' => 'checkout'],
                        ['style' => 'padding: 12px 30px; background: #27ae60; color: white; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 16px;']
                    ) ?>
                </div>
            </div>
        </div>
        
        <!-- Botón volver -->
        <div style="margin-top: 20px;">
            <?= $this->Html->link(
                '<i class="bi bi-arrow-left"></i> Seguir comprando',
                ['controller' => 'Productos', 'action' => 'index'],
                [
                    'escape' => false,
                    'style' => 'color: #7f8c8d; text-decoration: none; font-weight: 500;'
                ]
            ) ?>
        </div>
        
    <?php endif; ?>
</div>