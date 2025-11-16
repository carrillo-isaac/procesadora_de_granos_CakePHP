<?php
// título y botón (puedes pasarlo directo al element)
$title = 'Usuarios';
$newButton = $this->Html->link('Nuevo Usuario', ['action' => 'add'], ['class' => 'btn-add']);

// thead
$this->start('thead'); ?>
<tr>
    <th><?= $this->Paginator->sort('id') ?></th>
    <th><?= $this->Paginator->sort('nombre') ?></th>
    <th><?= $this->Paginator->sort('correo') ?></th>
    <th><?= $this->Paginator->sort('rol') ?></th>
    <th><?= $this->Paginator->sort('creado_en') ?></th>
    <th>Acciones</th>
</tr>
<?php $this->end();

// tbody
$this->start('tbody'); ?>
<?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $this->Number->format($usuario->id) ?></td>
        <td><?= h($usuario->nombre) ?></td>
        <td><?= h($usuario->correo) ?></td>
        <td><?= h($usuario->rol) ?></td>
        <td><?= h($usuario->creado_en) ?></td>
        <td>
            <?= $this->Html->link('Ver', ['action' => 'view', $usuario->id], ['class' => 'btn-view']) ?>
            <?= $this->Html->link('Editar', ['action' => 'edit', $usuario->id], ['class' => 'btn-edit']) ?>
            <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $usuario->id], ['confirm' => "¿Seguro?", 'class' => 'btn-delete']) ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php $this->end();

// Llamada al element
echo $this->element('index_layout', ['title' => $title, 'newButton' => $newButton]);
