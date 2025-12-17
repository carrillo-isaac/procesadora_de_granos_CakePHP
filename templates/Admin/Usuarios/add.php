
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Add Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                    echo $this->Form->control('rol');
                    echo $this->Form->control('creado_en');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
>>>>>>> a369773260269c4791bfdf972695e8436dcf92ac
        </div>
        <button>Guardar Usuario</button>
    </div>
</div>
=======

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

