<?php
$title = 'Nuevo Usuario';

echo $this->element('admin/page-header', compact('title'));
?>

<?php $this->start('content'); ?>
<div class="card">
    <?= $this->Form->create($usuario) ?>
    <?= $this->Form->control('nombre') ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->control('rol') ?>
    <?= $this->Form->button('Guardar', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<?php $this->end(); ?>

<?= $this->element('admin/crud-layout') ?>
