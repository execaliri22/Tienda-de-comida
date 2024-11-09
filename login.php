<?php
session_start();

$server = "localhost";
$user = "root";
$password = "12345"; 
$db = "registro_usuarios";

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_errno) {
    die("Conexión fallida: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Consulta para obtener los datos del usuario y la foto desde la tabla fotos
    $consulta = "
        SELECT usuarios.id, usuarios.nombre, fotos.foto_url
        FROM usuarios
        LEFT JOIN fotos ON usuarios.id = fotos.usuario_id
        WHERE usuarios.email='$email' AND usuarios.password='$password'
    ";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Guardar datos del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre_usuario'] = $usuario['nombre']; // Nombre del usuario
        $_SESSION['foto_perfil'] = $usuario['foto_url']; // URL de la foto de perfil

        // Redirigir al usuario a la página de inicio
        header("Location: inicio.php");
        exit();
    } else {
        echo "<h3 class='error'>Correo o contraseña incorrectos</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="CSS/Login-index.css">
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST">
            <h2>Iniciar Sesión</h2>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</body>
</html>
