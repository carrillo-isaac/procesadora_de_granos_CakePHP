    <?php
$this->disableAutoLayout();
?>
    <head>
        <?= $this->Html->css('index') ?>
    </head>
    <div class="index-card">

        <div class="index-header">
            <h2><?= h($title) ?></h2>
            <?php if (!empty($newButton)) : ?>
                <div class="index-actions">
                    <?= $newButton ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="table-wrapper">
            <table class="styled-table">
                <thead class="styled-table-head">
                    <?= $this->fetch('thead') ?>
                </thead>
                <tbody>
                    <?= $this->fetch('tbody') ?>
                </tbody>
            </table>
        </div>

        <div class="index-footer">
            <div class="pagination">
                <?= $this->Paginator->first('<< Primero') ?>
                <?= $this->Paginator->prev('< Anterior') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('Siguiente >') ?>
                <?= $this->Paginator->last('Último >>') ?>
            </div>

            <p class="pagination-counter">
                <?= $this->Paginator->counter('{{page}} / {{pages}} — Mostrando {{current}} de {{count}}') ?>
            </p>
        </div>
    </div>
