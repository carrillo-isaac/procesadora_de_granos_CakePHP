<header class="main-header">
    <nav class="menu-principal">
        <a href="/pages/home">
            <img src="/img/logo/logo_miro.webp" alt="Logo de Arroz miro">
        </a>
        <ul class="menu-links">
            <li><a href="/pages/home">Inicio</a></li>
            <li><a href="/pages/nosotros">Nosotros</a></li>
            <li><a href="/pages/productos">Productos</a></li>

            <!-- Carrito -->
            <li>
                <a href="/pages/carrito" class="icon-btn carrito">
                    <i class="bi bi-cart3"></i>

                    <?php 
                        $carritoCount = isset($_SESSION['Carrito'])
                            ? array_sum(array_column($_SESSION['Carrito'], 'cantidad'))
                            : 0;
                    ?>
                    <?php if ($carritoCount > 0): ?>
                        <span class="badge"><?= $carritoCount ?></span>
                    <?php endif; ?>
                </a>
            </li>

            <!-- Icono usuario -->
            <li>
                <?php if (isset($_SESSION['Auth']['User'])): ?>
                    <a href="/usuarios/logout" class="icon-btn logout">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                <?php else: ?>
                    <a href="/usuarios/login" class="icon-btn login">
                        <i class="bi bi-person-circle"></i>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</header>
