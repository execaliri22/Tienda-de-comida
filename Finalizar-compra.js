document.addEventListener('DOMContentLoaded', function() {
    const resumenPedido = document.querySelector('#resumen-pedido tbody');
    const carritoItems = JSON.parse(localStorage.getItem('carritoItems')) || [];

    console.log('Carrito cargado:', carritoItems);

    // Rellenar la tabla con los productos del carrito
    if (carritoItems.length > 0) {
        carritoItems.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><img src="${item.imagen}" width="100" alt="Producto"></td>
                <td>${item.nombre}</td>
                <td>${item.precio}</td>
            `;
            resumenPedido.appendChild(row);
        });
    } else {
        resumenPedido.innerHTML = '<tr><td colspan="3">No hay productos en el carrito.</td></tr>';
    }

    const formulario = document.getElementById('form-compra');
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();

        console.log('Formulario enviado');

        // Obtener los datos del formulario
        const direccion = document.getElementById('direccion').value.trim();
        const opcionEnvio = document.querySelector('input[name="envio"]:checked');

        if (!opcionEnvio) {
            alert('Por favor, selecciona una opción de envío.');
            return;
        }

        const data = {
            direccion,
            opcionEnvio: opcionEnvio.value,
            carritoItems
        };

        // Validar dirección
        if (!direccion) {
            alert('La dirección no puede estar vacía.');
            return;
        }

        console.log('Enviando datos al backend', data);

        fetch('procesar_compra.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor: ' + response.statusText);
            }
            return response.json();
        })
        .then(result => {
            if (result.success) {
                alert('¡Compra realizada con éxito!');
                localStorage.removeItem('carritoItems');
                window.location.href = 'gracias.html';
            } else {
                alert(`Hubo un error en la compra: ${result.error}`);
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            alert('Error al realizar la compra. Por favor, inténtalo de nuevo.');
        });
    });
});
