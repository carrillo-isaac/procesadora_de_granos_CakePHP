<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 */
?>
<?= $this->Html->css('facturas') ?>
<div class="facturas content view">

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Factura'), ['action' => 'edit', $factura->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Factura'), ['action' => 'delete', $factura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Factura'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="facturas view content">
            <h3><?= h($factura->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $factura->hasValue('usuario') ? $this->Html->link($factura->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $factura->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($factura->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $factura->total === null ? '' : $this->Number->format($factura->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($factura->fecha) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Factura Detalles') ?></h4>
                <?php if (!empty($factura->factura_detalles)) : ?>
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
                        <?php foreach ($factura->factura_detalles as $facturaDetalle) : ?>
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