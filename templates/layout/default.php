<?php
// Determina si estamos en la página de login (Controlador 'Users', Acción 'login')
$isLoginPage = ($this->getRequest()->getParam('action') === 'login' && $this->getRequest()->getParam('controller') === 'Users');
$bodyClass = $isLoginPage ? 'login-page' : '';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['style', 'modal', 'nosotros']) ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="<?= $bodyClass ?>">
    
    <?php if (!$isLoginPage): ?>
    <header>
        <?= $this->Html->image('Miro-logo.png', ['alt' => 'Logo Miró', 'height' => '50px', 'class' => 'menu_principal__logo']) ?>
        <nav class="menu_principal">
            <ul>
                <li><?= $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'home']) ?></li>
                <li><?= $this->Html->link('Nosotros', ['controller' => 'Pages', 'action' => 'about']) ?></li>
                <li><?= $this->Html->link('Productos', ['controller' => 'Products', 'action' => 'index']) ?></li>
            </ul>
        </nav>
        <div class="header-icons">
            <button class="btn-cart"><i class="bi bi-cart-fill"></i></button> 
            <?= $this->Html->link('<i class="bi bi-person-circle"></i>', ['controller' => 'Users', 'action' => 'profile'], ['escape' => false, 'class' => 'btn-profile']) ?>
        </div>
    </header>
    <?php endif; ?>
    
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <?php if (!$isLoginPage): ?>
    <footer>
        </footer>
    <?php endif; ?>

    <?= $this->fetch('scriptBottom') ?>
</body>
</html>