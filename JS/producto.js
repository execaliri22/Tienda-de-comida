document.addEventListener("DOMContentLoaded", function() {
    // Inicializamos el carrusel
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
        interval: 2000, // Cambia el intervalo entre las transiciones de las diapositivas (en milisegundos)
        wrap: true // Permite que el carrusel vuelva al principio después de llegar a la última diapositiva
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const carrito = document.getElementById('carrito');
    const lista = document.querySelector('#lista-carrito tbody');
    const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
    const carritoCount = document.getElementById('carrito-count');
    let cantidadProductos = 0;

    cargarEventListeners();

    function cargarEventListeners() {
        // Agrega event listeners a los botones de "Agregar al carrito"
        document.querySelectorAll('.product .btn').forEach(btn => {
            btn.addEventListener('click', comprarElemento);
        });

        // Event listeners para el carrito
        if (carrito) {
            carrito.addEventListener('click', eliminarElemento);
        }

        // Event listener para vaciar el carrito
        if (vaciarCarritoBtn) {
            vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
        }
    }

    function comprarElemento(e) {
        e.preventDefault();
        const elemento = e.target.closest('.product');
        leerDatosElemento(elemento);
    }

    function leerDatosElemento(elemento) {
        const infoElemento = {
            imagen: elemento.querySelector('img').src,
            titulo: elemento.querySelector('h4').textContent,
            precio: elemento.querySelector('.price').textContent,
            id: Date.now() // Genera un ID único usando la hora actual
        };
        insertarCarrito(infoElemento);
    }

    function insertarCarrito(elemento) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><img src="${elemento.imagen}" width="100"></td>
            <td>${elemento.titulo}</td>
            <td>${elemento.precio}</td>
            <td><a href="#" class="borrar" data-id="${elemento.id}">X</a></td>
        `;
        lista.appendChild(row);
        cantidadProductos++;
        actualizarCarritoCount();
    }

    function eliminarElemento(e) {
        e.preventDefault();
        if (e.target.classList.contains('borrar')) {
            e.target.closest('tr').remove();
            cantidadProductos--;
            actualizarCarritoCount();
        }
    }

    function vaciarCarrito() {
        while (lista.firstChild) {
            lista.removeChild(lista.firstChild);
        }
        cantidadProductos = 0;
        actualizarCarritoCount();
        return false;
    }

    function actualizarCarritoCount() {
        carritoCount.textContent = cantidadProductos;
    }
});

document.getElementById('comprar-carrito').addEventListener('click', function(event) {
    event.preventDefault(); // Evita la acción por defecto del enlace si es necesario

    const carritoItems = [];
    const rows = document.querySelectorAll('#lista-carrito tbody tr');

    console.log('Filas en la tabla del carrito:', rows.length); // Añadir para verificar

    rows.forEach(row => {
        const imagen = row.querySelector('td img').src;
        const nombre = row.querySelector('td:nth-child(2)').textContent;
        const precio = row.querySelector('td:nth-child(3)').textContent;

        carritoItems.push({ imagen, nombre, precio });
    });

    if (carritoItems.length > 0) {
        localStorage.setItem('carritoItems', JSON.stringify(carritoItems)); // Guardar en localStorage
    } else {
        console.log('No hay productos en el carrito.');
    }

    // Redirige a la página "Finalizar Compra"
    window.location.href = 'https://localhost/PHP-registro/Finalizar-compra.php';
});

