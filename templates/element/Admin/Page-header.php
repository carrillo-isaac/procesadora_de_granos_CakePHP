<div class="page-header">
    <h1><?= $title ?></h1>

    <?php if (!empty($actions)): ?>
        <div class="page-actions">
            <?= implode('', $actions) ?>
        </div>
    <?php endif; ?>
</div>
