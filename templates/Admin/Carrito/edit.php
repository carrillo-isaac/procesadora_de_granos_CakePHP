<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrito $carrito
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 * @var string[]|\Cake\Collection\CollectionInterface $productos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carrito->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carrito->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Carrito'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="carrito form content">
            <?= $this->Form->create($carrito) ?>
            <fieldset>
                <legend><?= __('Edit Carrito') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios]);
                    echo $this->Form->control('producto_id', ['options' => $productos]);
                    echo $this->Form->control('cantidad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
