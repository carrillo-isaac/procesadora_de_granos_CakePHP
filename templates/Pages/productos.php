<!DOCTYPE html>
<html lang="en">

<body>
    <div class="layout">
        <main class="contenido">
            <h1 class="nuestros_productos">Productos Recientes</h1>

            <div class="carousel-container">
                <button id="btn-left" class="carousel-btn">‹</button>

                <div class="carousel-track" id="carousel-track">
                    <!-- Aquí van las cards generadas por JS -->
                </div>

                <button id="btn-right" class="carousel-btn">›</button>
            </div>


            <!-- Modal genérico (solo uno) -->
            <div id="modal-producto" class="modal">
                <div class="modal-contenido">
                    <span class="cerrar">X</span>
                    <h3 id="modal-nombre"></h3>
                    <img id="modal-imagen" src="" alt="">
                    <p id="modal-descripcion"></p>
                    <p><strong>Precio: </strong><span id="modal-precio"></span></p>
                </div>
            </div>
        </main>
    </div>

    <script src="/js/carrusel-productos.js"></script>
    <script src="/js/modal.js"></script>
</body>

</html>