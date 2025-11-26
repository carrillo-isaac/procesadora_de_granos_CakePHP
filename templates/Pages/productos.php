<!DOCTYPE html>
<html lang="en">

<body>
    <div class="layout">
        <main class="contenido">
            <h1 class="title-productos">Nuestros productos</h1>
            <!-- Sección: Productos destacados -->
            <section class="categoria">
                <h2 class="subtitle-productos">Productos Destacados</h2>
                <div class="carousel">
                    <button class="btn-left carousel-btn" data-track="carousel-destacados">‹</button>

                    <div class="carousel-track" id="carousel-destacados"></div>

                    <button class="btn-right carousel-btn" data-track="carousel-destacados">›</button>
                </div>
            </section>
            <!-- Modal universal -->
            <div id="modal-producto" class="modal">
                <div class="modal-contenido">
                    <span class="cerrar" id="modal-close">X</span>
                    <h3 id="modal-nombre"></h3>
                    <img id="modal-imagen" src="" alt="">
                    <p id="modal-descripcion"></p>
                    <p><strong>Precio: </strong><span id="modal-precio"></span></p>
                </div>
            </div>

        </main>
    </div>

    <script src="/js/carrusel-productos.js"></script>
</body>

</html>