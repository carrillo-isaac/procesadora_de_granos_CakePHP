<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FacturaDetalle> $facturaDetalles
 */
?>
<?= $this->Html->css('facturas') ?>

<div class="facturaDetalles index content">
    <?= $this->Html->link(__('New Factura Detalle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Factura Detalles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('factura_id') ?></th>
                    <th><?= $this->Paginator->sort('producto_id') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('precio_unitario') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturaDetalles as $facturaDetalle): ?>
                <tr>
                    <td><?= $this->Number->format($facturaDetalle->id) ?></td>
                    <td><?= $facturaDetalle->hasValue('factura') ? $this->Html->link($facturaDetalle->factura->id, ['controller' => 'Facturas', 'action' => 'view', $facturaDetalle->factura->id]) : '' ?></td>
                    <td><?= $facturaDetalle->hasValue('producto') ? $this->Html->link($facturaDetalle->producto->nombre, ['controller' => 'Productos', 'action' => 'view', $facturaDetalle->producto->id]) : '' ?></td>
                    <td><?= $facturaDetalle->cantidad === null ? '' : $this->Number->format($facturaDetalle->cantidad) ?></td>
                    <td><?= $facturaDetalle->precio_unitario === null ? '' : $this->Number->format($facturaDetalle->precio_unitario) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $facturaDetalle->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $facturaDetalle->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $facturaDetalle->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $facturaDetalle->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>