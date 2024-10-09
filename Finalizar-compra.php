<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="CSS/Finalizar-compra.css">
</head>
<body>
    <header>
        <h1>Finalizar Compra</h1>
    </header>

    <main>
        <section class="resumen-compra">
            <h2>Resumen del Pedido</h2>
            <table id="resumen-pedido">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se llenará con los productos seleccionados -->
                </tbody>
            </table>
        </section>

        <section class="datos-compra">
            <h2>Información del Cliente</h2>
            <form id="form-compra">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="direccion">Dirección de Envío:</label>
                <input type="text" id="direccion" name="direccion" required>

                <label for="opcion-envio">Opciones de Entrega:</label>
                <div>
                    <input type="radio" id="retiro-local" name="envio" value="retiro-local" checked>
                    <label for="retiro-local">Retirar en el local</label>
                </div>
                <div>
                    <input type="radio" id="envio-domicilio" name="envio" value="envio-domicilio">
                    <label for="envio-domicilio">Envío a domicilio</label>
                </div>

                <button type="submit" class="btn-2">Confirmar Compra</button>
            </form>
        </section>
    </main>

    <footer>
        <p>Gracias por su compra</p>
    </footer>

   <script src="Finalizar-compra.js"></script>
</body>
</html>
