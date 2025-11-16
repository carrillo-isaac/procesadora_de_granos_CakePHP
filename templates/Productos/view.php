<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($producto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($producto->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $producto->stock === null ? '' : $this->Number->format($producto->stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($producto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($producto->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($producto->descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Pedidos Detalle') ?></h4>
                <?php if (!empty($producto->pedidos_detalle)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pedido Id') ?></th>
                            <th><?= __('Producto Id') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio Unitario') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->pedidos_detalle as $pedidosDetalle) : ?>
                        <tr>
                            <td><?= h($pedidosDetalle->id) ?></td>
                            <td><?= h($pedidosDetalle->pedido_id) ?></td>
                            <td><?= h($pedidosDetalle->producto_id) ?></td>
                            <td><?= h($pedidosDetalle->cantidad) ?></td>
                            <td><?= h($pedidosDetalle->precio_unitario) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PedidosDetalle', 'action' => 'view', $pedidosDetalle->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PedidosDetalle', 'action' => 'edit', $pedidosDetalle->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'PedidosDetalle', 'action' => 'delete', $pedidosDetalle->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $pedidosDetalle->id),
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