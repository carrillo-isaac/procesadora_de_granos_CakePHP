<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Carrito> $carrito
 */
?>
<div class="carrito index content">
    <?= $this->Html->link(__('New Carrito'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Carrito') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('producto_id') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito as $carrito): ?>
                <tr>
                    <td><?= $this->Number->format($carrito->id) ?></td>
                    <td><?= $carrito->hasValue('usuario') ? $this->Html->link($carrito->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $carrito->usuario->id]) : '' ?></td>
                    <td><?= $carrito->hasValue('producto') ? $this->Html->link($carrito->producto->nombre, ['controller' => 'Productos', 'action' => 'view', $carrito->producto->id]) : '' ?></td>
                    <td><?= $this->Number->format($carrito->cantidad) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $carrito->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carrito->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $carrito->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $carrito->id),
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