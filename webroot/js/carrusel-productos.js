const track = document.getElementById("carousel-track");
const left = document.getElementById("btn-left");
const right = document.getElementById("btn-right");

const scrollAmount = 300; // Movimiento del carrusel por clic

document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch(
            "http://localhost:8765/api/productos/destacados"
        );
        const json = await response.json();
        const productos = json.data;

        generarCards(productos);
    } catch (error) {
        console.error("Error cargando productos:", error);
    }
});

/* ============================
    GENERAR CARDS DEL CARRUSEL
   ============================ */
function generarCards(productos) {
    if (!track) {
        console.error("Error: el contenedor 'carousel-track' no existe.");
        return;
    }

    productos.forEach((producto) => {
        const card = document.createElement("div");
        card.classList.add("producto-card");

        // Ruta final de la imagen
        const imageUrl = `http://localhost:8765${producto.ruta_imagen}`;

        card.innerHTML = `
            <figure class="producto-figure">
                <img src="${imageUrl}" alt="${producto.nombre}">
                <figcaption class="producto-nombre">${
                    producto.nombre
                }
                </figcaption>
            </figure>

            <p class="producto-precio">
                <strong>$${producto.precio}</strong>
            </p>
            <button class="btn-agregar-carrito">
            Agregar al carrito
            </button>
        `;

        // Abre modal al hacer clic
        card.addEventListener("click", () => {
            abrirModal(producto);
        });

        track.appendChild(card);
    });
}

/* ============================
    BOTONES DEL CARRUSEL
   ============================ */
right.addEventListener("click", () => {
    track.scrollLeft += scrollAmount;
});

left.addEventListener("click", () => {
    track.scrollLeft -= scrollAmount;
});

// ------- FUNCIÓN PARA ABRIR MODAL -------
function abrirModal(producto) {
    document.getElementById("modal-imagen").src = `http://localhost:8765${producto.ruta_imagen}`;
    document.getElementById("modal-nombre").textContent = producto.nombre;
    document.getElementById("modal-descripcion").textContent = producto.descripcion;
    document.getElementById("modal-precio").textContent = `$${producto.precio}`;

    document.getElementById("modal-producto").style.display = "flex";
}

// ------- CERRAR MODAL -------
document.getElementById("modal-close").addEventListener("click", () => {
    document.getElementById("modal-producto").style.display = "none";
});

// Cerrar al hacer click fuera del modal
window.addEventListener("click", (e) => {
    if (e.target.id === "modal-producto") {
        document.getElementById("modal-producto").style.display = "none";
    }
});
