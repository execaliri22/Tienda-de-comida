document.addEventListener("DOMContentLoaded", function() {
    // Inicializamos el carrusel
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
        interval: 2000, // Cambia el intervalo entre las transiciones de las diapositivas (en milisegundos)
        wrap: true // Permite que el carrusel vuelva al principio después de llegar a la última diapositiva
    });
});






// Seleccionar los elementos del carrito y los contenedores de productos
const carrito = document.getElementById('carrito');
const lista = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

// Cargar todos los event listeners
cargarEventListeners();

function cargarEventListeners() {
    // Añadir event listener a todos los botones de "Agregar al carrito"
    document.querySelectorAll('.swiper-swrapper').forEach(elemento => {
        elemento.addEventListener('click', comprarElemento);
    });

    // Listener para eliminar productos del carrito
    carrito.addEventListener('click', eliminarElemento);

    // Listener para vaciar el carrito
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

// Función para agregar el producto al carrito
function comprarElemento(e) {
    e.preventDefault();

    if (e.target.classList.contains('btn')) {
        const elemento = e.target.closest('.product');
        leerDatosElemento(elemento);
    }
}

// Función para leer los datos del producto
function leerDatosElemento(elemento) {
    const infoElemento = {
        imagen: elemento.querySelector('img').src,
        titulo: elemento.querySelector('h4').textContent,
        precio: elemento.querySelector('.price').textContent,
        id: elemento.querySelector('.btn').getAttribute('data-id') || Math.random().toString(36).substring(2, 9)
    }
    insertarCarrito(infoElemento);
}

// Función para insertar el producto en el carrito
function insertarCarrito(elemento) {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td><img src="${elemento.imagen}" width=100></td>
        <td>${elemento.titulo}</td>
        <td>${elemento.precio}</td>
        <td><a href="#" class="borrar" data-id="${elemento.id}">X</a></td>
    `;
    lista.appendChild(row);
}

// Función para eliminar un producto del carrito
function eliminarElemento(e) {
    e.preventDefault();
    if (e.target.classList.contains('borrar')) {
        e.target.closest('tr').remove();
    }
}

// Función para vaciar el carrito
function vaciarCarrito() {
    while (lista.firstChild) {
        lista.removeChild(lista.firstChild);
    }
    return false;
}
