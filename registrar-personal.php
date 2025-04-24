
<?php
include("conexion.php");

if (isset($_POST["register"])) {
    if (
        strlen($_POST["nombre"]) >= 1 &&
        strlen($_POST["apellido"]) >= 1 &&
        strlen($_POST["email"]) >= 1 &&
        strlen($_POST["password"]) >= 1
    ) {
        // Recuperar datos del formulario
        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $fecha = date("Y-m-d"); 

        // Consulta SQL para insertar el personal
        $consulta = "INSERT INTO personal (nombre, apellido, email, password, fecha) 
                     VALUES ('$nombre', '$apellido', '$email', '$password', '$fecha')";

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            header("Location: login-personal.php");  // Redirigir al login si se registró correctamente
            exit();
        } else {
            // Si hubo un error, mostrar el mensaje
            echo "<h3 class='error'>Ocurrió un error: " . mysqli_error($conexion) . "</h3>";
        }
    } else {
        // Si faltan datos, mostrar mensaje de error
        echo "<h3 class='error'>Llena todos los campos</h3>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="CSS/Login-index.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2>Registro de Personal</h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="register">Registrarse</button>
            </div>
        </form>
    </div>
</body>
</html>
