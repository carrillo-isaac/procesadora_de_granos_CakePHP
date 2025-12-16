<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FacturaDetalle $facturaDetalle
 * @var \Cake\Collection\CollectionInterface|string[] $facturas
 * @var \Cake\Collection\CollectionInterface|string[] $productos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Factura Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="facturaDetalles form content">
            <?= $this->Form->create($facturaDetalle) ?>
            <fieldset>
                <legend><?= __('Add Factura Detalle') ?></legend>
                <?php
                    echo $this->Form->control('factura_id', ['options' => $facturas, 'empty' => true]);
                    echo $this->Form->control('producto_id', ['options' => $productos, 'empty' => true]);
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('precio_unitario');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
