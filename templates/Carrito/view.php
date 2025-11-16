<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrito $carrito
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Carrito'), ['action' => 'edit', $carrito->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Carrito'), ['action' => 'delete', $carrito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrito->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carrito'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Carrito'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="carrito view content">
            <h3><?= h($carrito->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $carrito->hasValue('usuario') ? $this->Html->link($carrito->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $carrito->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Producto') ?></th>
                    <td><?= $carrito->hasValue('producto') ? $this->Html->link($carrito->producto->nombre, ['controller' => 'Productos', 'action' => 'view', $carrito->producto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carrito->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($carrito->cantidad) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>