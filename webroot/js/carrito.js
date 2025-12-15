document.addEventListener("DOMContentLoaded", cargarCarrito);

async function cargarCarrito() {
    try {
        const response = await fetch("/api/carrito");

        // 🔐 SIN SESIÓN
        if (response.status === 401) {
            mostrarCarritoVacio();
            return;
        }

        // ❌ Error real
        if (!response.ok) {
            throw new Error("Error cargando carrito");
        }

        const json = await response.json();

        const tbody = document.getElementById("carrito-body");
        tbody.innerHTML = "";

        // 🛒 CARRITO VACÍO
        if (!json.data || json.data.length === 0) {
            mostrarCarritoVacio();
            return;
        }

        let total = 0;

        json.data.forEach(item => {
            const precio = parseFloat(item.producto.precio);
            const subtotal = precio * item.cantidad;
            total += subtotal;

            const row = document.createElement("tr");
            row.innerHTML = `
                <td class="carrito-producto">${item.producto.nombre}</td>
                <td>$${precio.toFixed(2)}</td>
                <td>
                    <div class="cantidad-control">
                        <button type="button" class="btn-menos" data-id="${item.id}">−</button>
                        <span class="cantidad">${item.cantidad}</span>
                        <button type="button" class="btn-mas" data-id="${item.id}">+</button>
                    </div>
                </td>

                <td>$${subtotal.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn-danger btn-eliminar" data-id="${item.id}">
                        🗑
                    </button>
                </td>
            `;

            tbody.appendChild(row);
        });

        document.getElementById("carrito-total").textContent =
            `$${total.toFixed(2)}`;

        document.getElementById("carrito-vacio").style.display = "none";
        document.getElementById("carrito-contenido").style.display = "block";

    } catch (error) {
        console.error("Error cargando carrito:", error);
        mostrarCarritoVacio();
    }
}

function mostrarCarritoVacio() {
    document.getElementById("carrito-vacio").style.display = "block";
    document.getElementById("carrito-contenido").style.display = "none";
}
document.addEventListener("click", async (e) => {

    if (e.target.classList.contains("btn-mas")) {
        await fetch(`/api/carrito/mas/${e.target.dataset.id}`, {
            method: "POST"
        });
        cargarCarrito();
    }

    if (e.target.classList.contains("btn-menos")) {
        await fetch(`/api/carrito/menos/${e.target.dataset.id}`, {
            method: "POST"
        });
        cargarCarrito();
    }

    if (e.target.classList.contains("btn-eliminar")) {
        await fetch(`/api/carrito/${e.target.dataset.id}`, {
            method: "DELETE"
        });
        cargarCarrito();
    }

});





