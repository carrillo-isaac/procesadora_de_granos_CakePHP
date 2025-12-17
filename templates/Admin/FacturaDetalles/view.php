<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FacturaDetalle $facturaDetalle
 */
?>
<?= $this->Html->css('facturas') ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Factura Detalle'), ['action' => 'edit', $facturaDetalle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Factura Detalle'), ['action' => 'delete', $facturaDetalle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturaDetalle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Factura Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Factura Detalle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="facturaDetalles view content">
            <h3><?= h($facturaDetalle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Factura') ?></th>
                    <td><?= $facturaDetalle->hasValue('factura') ? $this->Html->link($facturaDetalle->factura->id, ['controller' => 'Facturas', 'action' => 'view', $facturaDetalle->factura->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Producto') ?></th>
                    <td><?= $facturaDetalle->hasValue('producto') ? $this->Html->link($facturaDetalle->producto->nombre, ['controller' => 'Productos', 'action' => 'view', $facturaDetalle->producto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($facturaDetalle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $facturaDetalle->cantidad === null ? '' : $this->Number->format($facturaDetalle->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio Unitario') ?></th>
                    <td><?= $facturaDetalle->precio_unitario === null ? '' : $this->Number->format($facturaDetalle->precio_unitario) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>