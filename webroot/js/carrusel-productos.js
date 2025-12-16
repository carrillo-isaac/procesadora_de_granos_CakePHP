/* =======================================================
    CONFIGURACIÓN DE CARRUSELES DINÁMICOS
   ======================================================= */

document.addEventListener("DOMContentLoaded", () => {
    // Crear cada carrusel:
    crearCarrusel("destacados", "carousel-destacados");
    listaProductos("mostrar", "contenedor-productos")
});

/* =======================================================
    FUNCIÓN PRINCIPAL PARA CREAR CADA CARRUSEL
   ======================================================= */
async function crearCarrusel(endpoint, trackId) {
    const track = document.getElementById(trackId);
    if (!track) {
        console.error(`Error: No existe el track '${trackId}'`);
        return;
    }

    try {
        const response = await fetch(`http://localhost:8765/api/productos/${endpoint}`);
        const json = await response.json();
        const productos = json.data;
        generarCards(productos, track);
    } catch (error) {
        console.error(`Error cargando productos de ${endpoint}:`, error);
    }
}
async function listaProductos(endpoint, trackId) {
    const track = document.getElementById(trackId);
    if (!track) {
        console.error(`Error: No existe el track '${trackId}'`);
        return;
    }

    try {
        const response = await fetch(`http://localhost:8765/api/productos/${endpoint}`);
        const json = await response.json();
        const productos = json.data;
        generarCards(productos, track);
    } catch (error) {
        console.error(`Error cargando productos de ${endpoint}:`, error);
    }
}
/* =======================================================
    GENERAR CARDS DINÁMICAMENTE
   ======================================================= */
function generarCards(productos, track) {
    productos.forEach((producto) => {
        const card = document.createElement("div");
        card.classList.add("producto-card");

        const imageUrl = `http://localhost:8765${producto.ruta_imagen}`;

        card.innerHTML = `
            <figure class="producto-figure">
                <img src="${imageUrl}" alt="${producto.nombre}">
                <figcaption class="producto-nombre">${producto.nombre}</figcaption>
            </figure>

            <p class="producto-precio"><strong>$${producto.precio}</strong></p>

            <button class="btn-agregar-carrito" data-id="${producto.id}">
                Agregar al carrito
            </button>
        `;

        // Evitar que el botón abra el modal
        card.addEventListener("click", (e) => {
            if (e.target.classList.contains("btn-agregar-carrito")) return;
            abrirModal(producto);
        });

        track.appendChild(card);
    });
}
document.addEventListener("click", async (e) => {
    if (!e.target.classList.contains("btn-agregar-carrito")) return;

    const productoId = e.target.dataset.id;

    try {
        const response = await fetch("/api/carrito/agregar", {
            method: "POST",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                producto_id: productoId,
                cantidad: 1
            })
        });

        // 🔐 NO HAY SESIÓN
        if (response.status === 401) {
            alert("Debes iniciar sesión para agregar productos al carrito");
            return;
        }

        // ❌ Otro error
        if (!response.ok) {
            alert("Ocurrió un error al agregar el producto");
            return;
        }

        const json = await response.json();

        if (json.status === "success") {
            alert("Producto agregado al carrito");
        }

    } catch (error) {
        console.error("Error agregando producto:", error);
    }
});



function agregarProductos(producto) {
    productos.forEach((producto) => {
        const card = document.createElement("div");
        card.classList.add("producto-card");

        const imageUrl = `http://localhost:8765${producto.ruta_imagen}`;

        card.innerHTML = `
            <figure class="producto-figure">
                <img src="${imageUrl}" alt="${producto.nombre}">
                <figcaption class="producto-nombre">${producto.nombre}</figcaption>
            </figure>

            <p class="producto-precio"><strong>$${producto.precio}</strong></p>

            <button class="btn-agregar-carrito">Agregar al carrito</button>
        `;
    })
}


/* =======================================================
    BOTONES UNIVERSALES PARA TODOS LOS CARRUSELES
   ======================================================= */
document.addEventListener("click", (e) => {
    if (e.target.classList.contains("btn-left")) {
        const track = document.getElementById(e.target.dataset.track);
        track.scrollLeft -= 300;
    }

    if (e.target.classList.contains("btn-right")) {
        const track = document.getElementById(e.target.dataset.track);
        track.scrollLeft += 300;
    }
});

/* =======================================================
    MODAL UNIVERSAL
   ======================================================= */
function abrirModal(producto) {
    document.getElementById("modal-nombre").textContent = producto.nombre;
    document.getElementById("modal-descripcion").textContent = producto.descripcion;
    document.getElementById("modal-precio").textContent = `$${producto.precio}`;
    document.getElementById("modal-imagen").src = `http://localhost:8765${producto.ruta_imagen}`;

    document.getElementById("modal-producto").style.display = "flex";
}

// Cerrar modal
document.getElementById("modal-close").addEventListener("click", () => {
    document.getElementById("modal-producto").style.display = "none";
});

// Cerrar clic afuera
window.addEventListener("click", (e) => {
    if (e.target.id === "modal-producto") {
        document.getElementById("modal-producto").style.display = "none";
    }
});