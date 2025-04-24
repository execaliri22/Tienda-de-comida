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

    // Consulta para obtener los datos del personal
    $consulta = "SELECT idpersonal, nombre, apellido FROM personal WHERE email='$email' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $personal = mysqli_fetch_assoc($resultado);

        // Guardar datos del personal en la sesión
        $_SESSION['personal_id'] = $personal['idpersonal'];
        $_SESSION['nombre_personal'] = $personal['nombre'] . " " . $personal['apellido']; // Nombre completo

        // Redirigir al usuario a la página de inicio
        header("Location: menu-personal.php");
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
        <form action="login-personal.php" method="POST">
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
