<?php
$title = 'Usuarios';

$actions = [
    $this->Html->link('Nuevo Usuario', ['action' => 'add'], ['class' => 'btn btn-primary'])
];

echo $this->element('admin/page-header', compact('title', 'actions'));
?>

<?php $this->start('content'); ?>
<table class="admin-table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('rol') ?></th>
            <th><?= $this->Paginator->sort('creado_en') ?></th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario->id ?></td>
            <td><?= h($usuario->nombre) ?></td>
            <td><?= h($usuario->email) ?></td>
            <td><?= h($usuario->rol) ?></td>
            <td><?= h($usuario->creado_en) ?></td>
            <td class="actions">
                <?= $this->Html->link('Ver', ['action' => 'view', $usuario->id]) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $usuario->id]) ?>
                <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $usuario->id], ['confirm' => '¿Seguro?']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->end(); ?>

<?= $this->element('admin/crud-layout') ?>
