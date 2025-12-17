<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<?= $this->Html->css('productos') ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productos view content">
            <h3><?= h($producto->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($producto->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= $producto->hasValue('categoria') ? $this->Html->link($producto->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $producto->categoria->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ruta Imagen') ?></th>
                    <td><?= h($producto->ruta_imagen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($producto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $producto->precio === null ? '' : $this->Number->format($producto->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado En') ?></th>
                    <td><?= h($producto->creado_en) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($producto->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Carrito') ?></h4>
                <?php if (!empty($producto->carrito)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Usuario Id') ?></th>
                            <th><?= __('Producto Id') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->carrito as $carrito) : ?>
                        <tr>
                            <td><?= h($carrito->id) ?></td>
                            <td><?= h($carrito->usuario_id) ?></td>
                            <td><?= h($carrito->producto_id) ?></td>
                            <td><?= h($carrito->cantidad) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Carrito', 'action' => 'view', $carrito->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Carrito', 'action' => 'edit', $carrito->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Carrito', 'action' => 'delete', $carrito->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $carrito->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Factura Detalles') ?></h4>
                <?php if (!empty($producto->factura_detalles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Factura Id') ?></th>
                            <th><?= __('Producto Id') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio Unitario') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->factura_detalles as $facturaDetalle) : ?>
                        <tr>
                            <td><?= h($facturaDetalle->id) ?></td>
                            <td><?= h($facturaDetalle->factura_id) ?></td>
                            <td><?= h($facturaDetalle->producto_id) ?></td>
                            <td><?= h($facturaDetalle->cantidad) ?></td>
                            <td><?= h($facturaDetalle->precio_unitario) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FacturaDetalles', 'action' => 'view', $facturaDetalle->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FacturaDetalles', 'action' => 'edit', $facturaDetalle->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'FacturaDetalles', 'action' => 'delete', $facturaDetalle->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $facturaDetalle->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>