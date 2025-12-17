<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Factura> $facturas
 */
?>
<<<<<<< HEAD
=======
<?= $this->Html->css('facturas') ?>
<div class="facturas content index">

>>>>>>> ba4d536 (Agregando estilos a paginas faltantes.)
<div class="facturas index content">
    <?= $this->Html->link(__('New Factura'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Facturas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $factura): ?>
                <tr>
                    <td><?= $this->Number->format($factura->id) ?></td>
                    <td><?= $factura->hasValue('usuario') ? $this->Html->link($factura->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $factura->usuario->id]) : '' ?></td>
                    <td><?= $factura->total === null ? '' : $this->Number->format($factura->total) ?></td>
                    <td><?= h($factura->fecha) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $factura->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $factura->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $factura->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $factura->id),
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