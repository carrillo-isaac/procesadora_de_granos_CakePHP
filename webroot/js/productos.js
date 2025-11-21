console.log(">>> productos.js CARGADO <<<");

document.addEventListener("DOMContentLoaded", () => {
    fetch("http://localhost:8765/api/productos")
        .then(res => res.json())
        .then(json => {
            if (json.status === "success") {
                generarCards(json.data);
            }
        })
        .catch(err => console.error("Error cargando productos:", err));
});

function generarCards(productos) {
    const contenedor = document.getElementById("contenedor-productos");

    productos.forEach(prod => {
        const card = document.createElement("article");
        card.classList.add("producto");

        // estructura basada en tu HTML actual
        card.innerHTML = `
            <h3>${prod.nombre}</h3>
            <figure>
                <img src="${prod.ruta_imagen}" alt="${prod.nombre}">
                <figcaption>${prod.nombre}</figcaption>
            </figure>
            <p>${prod.descripcion}</p>
            <p><strong>Precio:</strong> $${parseFloat(prod.precio).toFixed(2)}</p>
            <p>Precio/Unidad</p>
            <a class="btn_producto">ver más</a>
        `;

        // Añadir los data-atributos que tu modal usa
        card.dataset.nombre = prod.nombre;
        card.dataset.imagen = prod.ruta_imagen;
        card.dataset.descripcion = prod.descripcion;
        card.dataset.precio = "$" + prod.precio;

        contenedor.appendChild(card);
    });

    activarEventosModal();
}

function activarEventosModal() {
    const botones = document.querySelectorAll(".btn_producto");
    const modal = document.getElementById("modal-producto");
    const cerrar = modal.querySelector(".cerrar");

    botones.forEach(btn => {
        btn.addEventListener("click", e => {
            const card = e.target.closest(".producto");

            document.getElementById("modal-nombre").textContent = card.dataset.nombre;
            document.getElementById("modal-imagen").src = card.dataset.imagen;
            document.getElementById("modal-descripcion").textContent = card.dataset.descripcion;
            document.getElementById("modal-precio").textContent = card.dataset.precio;

            modal.style.display = "block";
        });
    });

    cerrar.addEventListener("click", () => modal.style.display = "none");

    window.addEventListener("click", e => {
        if (e.target === modal) modal.style.display = "none";
    });
}
