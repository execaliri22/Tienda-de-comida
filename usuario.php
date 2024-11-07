<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al login si el usuario no está autenticado
    header("Location: login.php");
    exit();
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "registro_usuarios";  // Cambia este valor con tu nombre de base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario desde la sesión
$usuario_id = $_SESSION['usuario_id'];

// Variable para el nombre actualizado
$nombre_actual = '';

// Si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_usuario'])) {
    $nombre_usuario = $_POST['nombre_usuario'];

    // Validar y sanear el input
    $nombre_usuario = $conn->real_escape_string($nombre_usuario);

    // Actualizar el nombre en la base de datos
    $sql = "UPDATE usuarios SET nombre = '$nombre_usuario' WHERE id = $usuario_id";

    if ($conn->query($sql) === TRUE) {
        // Actualizar el nombre en la sesión
        $_SESSION['nombre_usuario'] = $nombre_usuario;  // Actualizamos el nombre en la sesión
        header('Location: usuario.php');  // Redirigir a la misma página para actualizar los cambios
        exit();
    } else {
        // Mostrar error si algo falla
        echo "Error al actualizar el nombre: " . $conn->error;
    }
}

// Obtener el nombre actualizado desde la base de datos
$sql = "SELECT nombre FROM usuarios WHERE id = $usuario_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Establecer el nombre actualizado
    $row = $result->fetch_assoc();
    $nombre_actual = $row['nombre'];
    // Actualizar el nombre en la sesión si no está actualizado
    if ($_SESSION['nombre_usuario'] !== $nombre_actual) {
        $_SESSION['nombre_usuario'] = $nombre_actual;
    }
} else {
    $nombre_actual = '';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Verifica que la ruta del archivo CSS sea correcta -->
    <link rel="stylesheet" href="usuario.css">
    <title>Página de Perfil</title>
</head>
<body>
    <div class="container">
        
        <!-- Botón "Inicio" en la esquina superior izquierda -->
     

        <!-- Sección de Perfil -->
        <div class="profile-section">
            <h1>Perfil de usuario</h1>
            <div class="profile-info">
                <h2 id="username"><?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></h2>
            </div>
        </div>
        
        <div class="button-container">
          <button id="inicio-button" onclick="window.location.href='https://localhost/PHP-registro/inicio.php'">Inicio</button>
       </div>

        <!-- Sección de configuraciones y compras -->
        <div class="settings-and-purchases">
            <div class="settings-section">
                <!-- Editar perfil -->
                <section class="settings-item">
                    <h2>Editar Perfil</h2>
                    <form method="POST" action="usuario.php">
                        <input type="text" id="username-input" name="nombre_usuario" placeholder="Ingrese su nombre de usuario" value="<?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>" required>
                        <button type="submit">Actualizar</button>
                    </form>
                </section>
                <!-- Botón cerrar sesión -->
                <section class="settings-item">
    
        <button id="logout-button">Cerrar Sesión</button>

</section>
            </div>

            <!-- Sección de Mis Compras -->
            <div class="purchases-section">
                <section class="settings-item">
                    <h2>Mis Compras</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí podrías agregar contenido dinámico de las compras -->
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <script src="JS/usuario.js"></script>
</body>
</html>