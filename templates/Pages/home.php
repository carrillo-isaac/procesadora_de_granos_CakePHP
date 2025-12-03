<?php
$this->assign('title', 'Arroz Miró - Innovación y Sostenibilidad');
?>

<section class="hero_seccion">
    <div class="carousel">
        <!-- Radio Buttons -->
        <input type="radio" name="slides" id="slide1" checked>
        <input type="radio" name="slides" id="slide2">
        <input type="radio" name="slides" id="slide3">

        <!-- Slides -->
        <div class="slides">
            <div class="slide s1">
                <?= $this->Html->image('slider/Espiga-slider.jpg', [
                    'alt' => 'Arrozales Miró'
                ]) ?>
                <div class="caption">
                    <h1>Calidad y tradición en cada grano — Bienvenido a Miró</h1>
                    <p>Miró acompaña a las familias panameñas con arroz y menestras de la más alta calidad.</p>
                </div>
            </div>

            <div class="slide s2">
                <?= $this->Html->image('slider/miro-arroz-slider.webp', [
                    'alt' => 'Campo de Arroz'
                ]) ?>
                <div class="caption">
                    <h2>De nuestros campos a tu mesa</h2>
                    <p>Arroz y menestras cultivados con pasión y procesos sostenibles.</p>
                </div>
            </div>

            <div class="slide s3">
                <?= $this->Html->image('slider/procesadora-slider.webp', [
                    'alt' => 'Proceso de selección'
                ]) ?>
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
            <?= $this->Html->image('products/arroz 2kg.webp', [
                'alt' => 'Arroz Especial'
            ]) ?>
            <figcaption>Arroz especial 2KG</figcaption>
        </figure>
        <p>Arroz de primera calidad, cultivado en Chiriquí con procesos modernos de selección y empaque.</p>
        <p><strong>Precio:</strong> $3.19</p>
        <p>Precio/Unidad</p>
        <a href="/pages/productos_static" class="btn_producto">Ver más</a>
    </article>

    <article class="producto">
        <h3>Frijoles Chiricanos</h3>
        <figure>
            <?= $this->Html->image('products/frijol_chiricano.webp', [
                'alt' => 'Frijoles Chiricanos'
            ]) ?>
            <figcaption>Frijoles Chiricanos 0.45KG</figcaption>
        </figure>
        <p>Disfruta del auténtico sabor de los Frijoles Chiricanos. Perfectos para sopas, guisos y acompañamientos tradicionales.</p>
        <p><strong>Precio:</strong> $1.35</p>
        <p>Precio/Unidad</p>
        <a href="/pages/productos_static" class="btn_producto">Ver más</a>
    </article>

    <article class="producto">
        <h3>Porotos Rojos</h3>
        <figure>
            <?= $this->Html->image('products/porotos_Rojos.webp', [
                'alt' => 'Porotos Rojos'
            ]) ?>
            <figcaption>Porotos Rojos 0.45KG</figcaption>
        </figure>
        <p>Arroz de primera calidad, cultivado en Chiriquí con procesos modernos de selección y empaque.</p>
        <p><strong>Precio:</strong> $1.55</p>
        <p>Precio/Unidad</p>
        <a href="/pages/productos_static" class="btn_producto">Ver más</a>
    </article>
</section>

<section class="gallery">
    <h2>Galería</h2>

    <figure>
        <?= $this->Html->image('gallery/image1.jpg', [
            'alt' => 'Campo de Trigo Miró'
        ]) ?>
    </figure>
    <figure>
        <?= $this->Html->image('gallery/image2.webp', [
            'alt' => 'Receta de comida'
        ]) ?>
    </figure>
    <figure>
        <?= $this->Html->image('gallery/image3.jpg', [
            'alt' => 'Trigo'
        ]) ?>
    </figure>
    <figure>
        <?= $this->Html->image('gallery/image4.jpg', [
            'alt' => 'Grupo Ejecutivo Miró'
        ]) ?>
    </figure>
    <figure>
        <?= $this->Html->image('gallery/image5.jpeg', [
            'alt' => 'Productos Granos Miró'
        ]) ?>
    </figure>
    <figure>
        <?= $this->Html->image('gallery/image6.webp', [
            'alt' => 'Revisión ejecutiva'
        ]) ?>
    </figure>
</section>

<!-- ============ FOOTER ============ -->


<?= $this->Html->script('carrousel') ?>
