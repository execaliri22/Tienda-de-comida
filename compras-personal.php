<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$user = "root";
$password = "12345"; 
$db = "registro_usuarios";

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_errno) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Consulta para obtener todas las compras
$sql = "SELECT usuario_id, nombre_P, direccion, opcion_envio, opcion_pago, fecha, precio FROM compras";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error al ejecutar la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras de Usuarios</title>
    <link rel="stylesheet" href="CSS/compras-personal.css">
</head>
<body>
    <header>
        <h1>Compras de Todos los Usuarios</h1>
    </header>
    <main>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Producto</th>
                    <th>Dirección</th>
                    <th>Opción de Envío</th>
                    <th>Opción de Pago</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['usuario_id']); ?></td>
                        <td><?php echo htmlspecialchars($fila['nombre_P']); ?></td>
                        <td><?php echo htmlspecialchars($fila['direccion']); ?></td>
                        <td><?php echo htmlspecialchars($fila['opcion_envio']); ?></td>
                        <td><?php echo htmlspecialchars($fila['opcion_pago']); ?></td>
                        <td><?php echo htmlspecialchars($fila['fecha']); ?></td>
                        <td><?php echo htmlspecialchars($fila['precio']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>© 2025 Compras Personal</p>
    </footer>
</body>
</html>

<?php
// Cerrar la conexión
$conexion->close();
?>