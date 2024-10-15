document.addEventListener('DOMContentLoaded', function() {
    const resumenPedido = document.querySelector('#resumen-pedido tbody');
    let carritoItems = [];

    // Intentar cargar los elementos del carrito del localStorage
    try {
        carritoItems = JSON.parse(localStorage.getItem('carritoItems')) || [];
    } catch (error) {
        console.error('Error al leer el carrito del localStorage:', error);
    }

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

        // Validar que haya productos en el carrito
        if (carritoItems.length === 0) {
            alert('No puedes realizar una compra sin productos en el carrito.');
            return;
        }

        // Obtener los datos del formulario
        const direccion = document.getElementById('direccion').value.trim();
        const opcionEnvio = document.querySelector('input[name="envio"]:checked');

        // Validar que se haya seleccionado una opción de envío
        if (!opcionEnvio) {
            alert('Por favor, selecciona una opción de envío.');
            return;
        }

        // Validar dirección
        if (!direccion) {
            alert('La dirección no puede estar vacía.');
            return;
        }

        const data = {
            direccion,
            opcionEnvio: opcionEnvio.value,
            carritoItems
        };

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
            console.log(result); // Verifica la respuesta completa
            if (result && result.success) {
                alert('Compra realizada con éxito!');
                localStorage.removeItem('carritoItems');
                
                // Eliminar mensaje de éxito anterior si existe
                const mensajeExistente = document.getElementById('mensaje-exito');
                if (mensajeExistente) {
                    mensajeExistente.remove();
                }

                // Mostrar un nuevo mensaje de éxito
                const mensajeExito = document.createElement('div');
                mensajeExito.id = 'mensaje-exito';
                mensajeExito.textContent = 'Gracias por su compra. Su pedido ha sido procesado con éxito.';
                mensajeExito.style.color = 'green';
                document.body.appendChild(mensajeExito);
                
            } else {
                alert(`Hubo un error en la compra: ${result?.error || 'Error desconocido'}`);
            }
        })
        .catch(async error => {
            console.error('Error en la solicitud:', error);
            alert('Error al realizar la compra. Por favor, inténtalo de nuevo.');
        });
    });
});
