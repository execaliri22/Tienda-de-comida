<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['personal_id'])) {
    $nombre_usuario = $_SESSION['nombre_personal']; // Nombre del usuario almacenado en la sesión
} else {
    // Si no ha iniciado sesión, redirige al login
    header("Location: login-personal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="CSS/menu-personal.css">
    <script defer src="menu-personal.js"></script>
</head>
<body>
<header>
    <div class="menu container">
        <img class="logo-1" src="images/logo.svg" alt="Logo">
        <input type="checkbox" id="menu">
        <label for="menu"> 
            <img src="images/menu.png" class="menu-icono" alt="Menú">
        </label>
        <nav class="navbar">
            <div class="profile-info">
                <!-- Foto de perfil con la imagen obtenida de la sesión -->
                <h2 id="username"><?php echo $_SESSION['nombre_personal']; ?></h2> <!-- Muestra el nombre de personal -->
            </div>

            <img class="logo-2" src="images/logo.svg" alt="Logo">     
            <div class="menu-2">
                <div class="menu-1">
                    <ul>
                        <li><a href="https://localhost/PHP-registro/usuario-personal.php">Usuarios</a></li>
                    </ul> 
                </div>

                <div>
                    <ul>
                        <li><a href="https://localhost/PHP-registro/compras-personal.php">Compras</a></li>
                    </ul>  
                </div> 

                <!-- Ícono de campana -->
                <div class="icono-campana">
                    <a href="notificaciones.php">
                        <img src="images/campana.png" alt="Notificaciones">
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
</body>
</html>
