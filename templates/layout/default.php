<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->fetch('title') ?></title>

<<<<<<< HEAD
    <?= $this->Html->css(['style', 'nosotros','carrusel-productos', 'modal', 'header','footer','galeria']) ?>
    <?= $this->fetch('/css') ?>
=======
    <?= $this->Html->css(['style', 'nosotros','carrusel-productos', 'modal', 'header','footer','galeria','actions' ]) ?>
    <?= $this->fetch('css') ?>
>>>>>>> ba4d536 (Agregando estilos a paginas faltantes.)
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
</body>

</html>