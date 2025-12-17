<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 */
?>
<?= $this->Html->css('facturas') ?>
<div class="facturas content form">

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="facturas form content">
            <?= $this->Form->create($factura) ?>
            <fieldset>
                <legend><?= __('Add Factura') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios, 'empty' => true]);
                    echo $this->Form->control('total');
                    echo $this->Form->control('fecha');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> ba4d536 (Agregando estilos a paginas faltantes.)
