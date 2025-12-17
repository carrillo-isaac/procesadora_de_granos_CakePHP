<?php
$title = 'Detalle de Usuario';

$actions = [
    $this->Html->link('Editar', ['action' => 'edit', $usuario->id], ['class' => 'btn']),
    $this->Form->postLink('Eliminar', ['action' => 'delete', $usuario->id], ['confirm' => '¿Seguro?']),
    $this->Html->link('Volver a la lista', ['action' => 'index'], ['class' => 'btn'])
];

echo $this->element('admin/page-header', compact('title', 'actions'));
?>

<?php $this->start('content'); ?>
<table class="detail-table">
    <tr><th>Nombre</th><td><?= h($usuario->nombre) ?></td></tr>
    <tr><th>Email</th><td><?= h($usuario->email) ?></td></tr>
    <tr><th>Rol</th><td><?= h($usuario->rol) ?></td></tr>
    <tr><th>Creado</th><td><?= h($usuario->creado_en) ?></td></tr>
</table>
<?php $this->end(); ?>

<?= $this->element('admin/crud-layout') ?>
