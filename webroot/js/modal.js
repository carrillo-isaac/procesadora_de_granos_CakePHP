const modal = document.getElementById('modal-producto');
const modalNombre = document.getElementById('modal-nombre');
const modalImagen = document.getElementById('modal-imagen');
const modalDescripcion = document.getElementById('modal-descripcion');
const modalPrecio = document.getElementById('modal-precio');
const cerrar = document.querySelector('.cerrar');

document.querySelectorAll('.btn_producto').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const producto = e.target.closest('.producto');
        modalNombre.textContent = producto.dataset.nombre;
        modalImagen.src = producto.dataset.imagen;
        modalImagen.alt = producto.dataset.nombre;
        modalDescripcion.textContent = producto.dataset.descripcion;
        modalPrecio.textContent = producto.dataset.precio;

        modal.style.display = 'block';
    });
});

cerrar.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Cerrar al hacer click fuera del contenido
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});
