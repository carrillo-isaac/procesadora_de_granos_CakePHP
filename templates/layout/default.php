<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->fetch('title') ?></title>

    <!-- Íconos de Bootstrap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Tus CSS en webroot/css -->
    <?= $this->Html->css([
        'style',
        'header',
        'nosotros',
        'modal',
        'footer',
        'galeria'
    ]) ?>

    <!-- CSS extra que quiera inyectar alguna vista -->
    <?= $this->fetch('css') ?>
</head>

<body>

    <!-- HEADER COMÚN -->
    <?= $this->element('header') ?>

    <!-- CONTENIDO DE CADA PÁGINA -->
    <main class="container">
        <?= $this->fetch('content') ?>
    </main>

    <!-- FOOTER COMÚN -->
    <?= $this->element('footer') ?>

    <!-- JS extra que inyecten las vistas -->
    <?= $this->fetch('script') ?>
</body>

</html>