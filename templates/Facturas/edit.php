<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factura $factura
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $factura->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Facturas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="facturas form content">
            <?= $this->Form->create($factura) ?>
            <fieldset>
                <legend><?= __('Edit Factura') ?></legend>
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
</div>
