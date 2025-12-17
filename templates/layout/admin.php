<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo</title>

    <?= $this->Html->css('admin') ?>
    <?= $this->fetch('css') ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="admin-layout">

        <!-- SIDEBAR -->
        <aside class="admin-sidebar">

            <div class="sidebar-logo">
                <a href="/admin">
                    <img src="/img/logo/logo_miro.webp" alt="Logo Arroz Miro">
                </a>
            </div>

            <nav class="sidebar-menu">
                <a href="/admin" class="sidebar-link">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>

                <a href="/admin/productos" class="sidebar-link">
                    <i class="bi bi-box-seam"></i>
                    Productos
                </a>

                <a href="/admin/categorias" class="sidebar-link">
                    <i class="bi bi-tags"></i>
                    Categorías
                </a>

                <a href="/admin/usuarios" class="sidebar-link">
                    <i class="bi bi-people"></i>
                    Usuarios
                </a>

                <a href="/admin/facturas" class="sidebar-link">
                    <i class="bi bi-receipt"></i>
                    Facturas
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="/logout" class="sidebar-link logout">
                    <i class="bi bi-box-arrow-right"></i>
                    Cerrar sesión
                </a>
            </div>

        </aside>

        <!-- CONTENIDO -->
        <main class="admin-content">
            <?= $this->fetch('content') ?>
        </main>

    </div>

</body>

</html>