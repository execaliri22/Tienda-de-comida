<?php
session_start();
require_once __DIR__ . "/conexion.php"; // Incluye la conexión

// Verifica si la conexión existe antes de ejecutar la consulta
if (!isset($conexion)) {
    die("Error: No se pudo conectar a la base de datos.");
}

$sql = "SELECT id, nombre, apellido, email, fecha FROM usuarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <link rel="stylesheet" href="CSS/usuarios-personal.css">
</head>
<body>

<header>
    <h1>Lista de Usuarios Registrados</h1>
</header>

<main>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$fila['id']}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['apellido']}</td>
                            <td>{$fila['email']}</td>
                            <td>{$fila['fecha']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay usuarios registrados.</td></tr>";
            }
            $conexion->close();
            ?>
        </tbody>
    </table>
</main>

</body>
</html>
