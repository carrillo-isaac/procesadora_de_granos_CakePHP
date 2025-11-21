<?php
$this->disableAutoLayout();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap Icons para Login y Carrito -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Arroz Miró - Innovación y Sostenibilidad</title>
</head>

<body>
    <header>
        <nav class="menu_principal"> <!--menu principal -->
            <a href="/pages/home">
                <img src="/img/logo/logo_miro.webp" alt="Logo de Arroz miro">
            </a>
            <ul style="display: flex; align-items: center;">
                <li><a href="/pages/home">Inicio</a></li>
                <li><a href="/pages/nosotros">Nosotros</a></li>
                <li><a href="/pages/productos_static">Productos</a></li>
                
                <!-- Iconos integrados en el menú -->
                <li style="list-style: none; margin-left: 20px;">
                    <a href="/carrito" title="Mi Carrito" style="display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: linear-gradient(135deg, #006747 0%, #4CAF50 100%); border-radius: 50%; box-shadow: 0 2px 10px rgba(0,103,71,0.3); transition: all 0.3s ease; text-decoration: none; position: relative;">
                        <i class="bi bi-cart3" style="font-size: 20px; color: white;"></i>
                        <?php 
                        $carritoCount = 0;
                        if (isset($_SESSION['Carrito'])) {
                            $carritoCount = array_sum(array_column($_SESSION['Carrito'], 'cantidad'));
                        }
                        if ($carritoCount > 0): 
                        ?>
                            <span style="position: absolute; top: -5px; right: -5px; background: #FF6B35; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; border: 2px solid white;"><?= $carritoCount ?></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li style="list-style: none; margin-left: 10px;">
                    <?php if (isset($_SESSION['Auth']['User'])): ?>
                        <a href="/usuarios/logout" title="Cerrar Sesión" style="display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: linear-gradient(135deg, #006747 0%, #4CAF50 100%); border-radius: 50%; box-shadow: 0 2px 10px rgba(0,103,71,0.3); transition: all 0.3s ease; text-decoration: none;">
                            <i class="bi bi-box-arrow-right" style="font-size: 20px; color: white;"></i>
                        </a>
                    <?php else: ?>
                        <a href="/usuarios/login" title="Iniciar Sesión" style="display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: linear-gradient(135deg, #006747 0%, #4CAF50 100%); border-radius: 50%; box-shadow: 0 2px 10px rgba(0,103,71,0.3); transition: all 0.3s ease; text-decoration: none;">
                            <i class="bi bi-person-circle" style="font-size: 20px; color: white;"></i>
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero_seccion">
            <div class="carousel">
                <!-- Radio Buttons -->
                <input type="radio" name="slides" id="slide1" checked>
                <input type="radio" name="slides" id="slide2">
                <input type="radio" name="slides" id="slide3">
                <!-- Slides -->
                <div class="slides">
                    <div class="slide s1">
                        <img src="/img/slider/Espiga-slider.jpg" alt="Arrozales Miró">
                        <div class="caption">
                            <h1>Calidad y tradición en cada grano — Bienvenido a Miró</h1>
                            <p>Miró acompaña a las familias panameñas con arroz y menestras de la más alta calidad.</p>
                        </div>
                    </div>
                    <div class="slide s2">
                        <img src="/img/slider/miro-arroz-slider.webp" alt="Campo de Arroz">
                        <div class="caption">
                            <h2>De nuestros campos a tu mesa</h2>
                            <p>Arroz y menestras cultivados con pasión y procesos sostenibles.</p>
                        </div>
                    </div>
                    <div class="slide s3">
                        <img src="/img/slider/procesadora-slider.webp" alt="Proceso de selección">
                        <div class="caption">
                            <h2>Procesos modernos, sabor tradicional</h2>
                            <p>Seleccionamos solo los mejores granos para tu familia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="nosotros_seccion">
            <h2>Nosotros</h2>
            <p>
                En Arroz Miró trabajamos con pasión para ofrecer a las familias panameñas arroz y granos
                de la más alta calidad. Nuestra historia está basada en la tradición agrícola de Chiriquí,
                combinada con innovación y sostenibilidad, garantizando siempre productos que transmiten
                confianza, nutrición y sabor en cada mesa.
            </p>
            <a href="/pages/nosotros" class="btn_nosotros">Conoce más</a>
        </section>
        
        <section class="productos_seccion">
            <h2>Nuestros productos</h2>
            <article class="producto">
                <h3>Arroz Especial</h3>
                <figure>
                    <img src="/img/products/arroz 2kg.webp" alt="Arroz Especial">
                    <figcaption>Arroz especial 2KG</figcaption>
                </figure>
                <p>Arroz de primera calidad, cultivado en Chiriquí con procesos modernos de selección y empaque.</p>
                <p><strong>Precio:</strong> $3.19</p>
                <p>Precio/Unidad</p>
                <a href="/pages/productos_static" class="btn_producto">ver más</a>
            </article>
            <article class="producto">
                <h3>Frijoles Chiricanos</h3>
                <figure>
                    <img src="/img/products/frijol_chiricano.webp" alt="Frijoles Chiricanos">
                    <figcaption>Frijoles Chiricanos 0.45KG</figcaption>
                </figure>
                <p>Disfruta del auténtico sabor de los Frijoles Chiricanos. Perfectos para sopas, guisos y acompañamientos tradicionales.</p>
                <p><strong>Precio:</strong>$1.35</p>
                <p>Precio/Unidad</p>
                <a href="/pages/productos_static" class="btn_producto">ver más</a>
            </article>
            <article class="producto">
                <h3>Porotos Rojos</h3>
                <figure>
                    <img src="/img/products/porotos_Rojos.webp" alt="Porotos Rojos">
                    <figcaption>Porotos Rojos 0.45KG</figcaption>
                </figure>
                <p>Arroz de primera calidad, cultivado en Chiriquí con procesos modernos de selección y empaque.</p>
                <p><strong>Precio:</strong> $1.55</p>
                <p>Precio/Unidad</p>
                <a href="/pages/productos_static" class="btn_producto">ver más</a>
            </article>
        </section>
    </main>

    <section class="gallery">
        <h2>Galería</h2>
        <figure>
            <img src="/img/gallery/image1.jpg" alt="Campo de Trigo Miró">
        </figure>
        <figure>
            <img src="/img/gallery/image2.webp" alt="Receta de comida">
        </figure>
        <figure>
            <img src="/img/gallery/image3.jpg" alt="Trigo">
        </figure>
        <figure>
            <img src="/img/gallery/image4.jpg" alt="Grupo Ejecutivo Miró">
        </figure>
        <figure>
            <img src="/img/gallery/image5.jpeg" alt="Productos Granos Miró">
        </figure>
        <figure>
            <img src="/img/gallery/image6.webp" alt="Revisión ejecutiva">
        </figure>
    </section>

    <footer>
        <section class="footer-info">
            <h4>Ubicación: </h4>
            <address>
                Vía Panamericana, San Pablo Viejo, Chiriquí.
                Tel: +507 775-6532
                Email: info@arrozmiro.com
            </address>
        </section>
        <section class="footer-social">
            <h4>Síguenos</h4>
            <nav>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/tu_pagina" target="_blank">
                            <img src="/img/icons/facebook.png" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/tu_pagina" target="_blank">
                            <img src="/img/icons/instagram.png" alt="Instagram">
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <p>&copy; 2025 Arroz Miró. Todos los derechos reservados.</p>
    </footer>
    <script src="/js/carrousel.js"></script>
</body>

</html>