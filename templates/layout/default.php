<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->fetch('title') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <?= $this->Html->css(['style', 'nosotros', 'modal', 'header','footer','galeria']) ?>
    <?= $this->fetch('/css') ?>
</head>

<body>

    <?= $this->element('header') ?>

    <main class="container">
        <?= $this->fetch('content') ?>
    </main>

    <?= $this->element('footer') ?>

    <?= $this->fetch('modal','productos','carrusel') ?>
</body>
</html>
