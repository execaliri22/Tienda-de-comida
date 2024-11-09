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

// Si el formulario ha sido enviado para actualizar el nombre de usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_usuario'])) {
    $nombre_usuario = $_POST['nombre_usuario'];

    // Validar y sanear el input
    $nombre_usuario = $conn->real_escape_string($nombre_usuario);

    // Actualizar el nombre en la base de datos
    $sql = "UPDATE usuarios SET nombre = '$nombre_usuario' WHERE id = $usuario_id";

    if ($conn->query($sql) === TRUE) {
        // Actualizar el nombre en la sesión
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        header('Location: usuario.php');
        exit();
    } else {
        echo "Error al actualizar el nombre: " . $conn->error;
    }
}

// Subir la foto de perfil
if (isset($_FILES['foto_perfil'])) {
    // Verificar si el archivo se subió correctamente
    if ($_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK) {
        // Validar y mover el archivo a la carpeta de imágenes
        $foto_temp = $_FILES['foto_perfil']['tmp_name'];
        $foto_nombre = basename($_FILES['foto_perfil']['name']);
        $foto_url = 'uploads/' . $foto_nombre;

        // Verificar si el archivo es una imagen
        if (getimagesize($foto_temp)) {
            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($foto_temp, $foto_url)) {
                // Actualizar la foto en la base de datos
                $sql = "INSERT INTO fotos (usuario_id, foto_url) VALUES ($usuario_id, '$foto_url')";

                if ($conn->query($sql) === TRUE) {
                    echo "Foto de perfil actualizada con éxito.";
                } else {
                    echo "Error al actualizar la foto: " . $conn->error;
                }
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "El archivo no es una imagen válida.";
        }
    } else {
        echo "Error al subir el archivo: " . $_FILES['foto_perfil']['error'];
    }
}

// Obtener el nombre actualizado desde la base de datos
$sql = "SELECT nombre FROM usuarios WHERE id = $usuario_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre_actual = $row['nombre'];
    if ($_SESSION['nombre_usuario'] !== $nombre_actual) {
        $_SESSION['nombre_usuario'] = $nombre_actual;
    }
} else {
    $nombre_actual = '';
}

// Obtener la foto de perfil del usuario
$sql = "SELECT foto_url FROM fotos WHERE usuario_id = $usuario_id ORDER BY idfotos LIMIT 1";
$result = $conn->query($sql);

$foto_url = '';
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $foto_url = $row['foto_url'];
}

// Obtener las compras del usuario
$sql = "SELECT nombre_P AS producto, fecha, precio FROM compras WHERE usuario_id = $usuario_id";
$compras = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usuario.css">
    <title>Página de Perfil</title>
</head>
<body>
    <div class="container">
        <!-- Sección de Perfil -->
        <div class="profile-section">
            <h1>Perfil de usuario</h1>
            <div class="profile-info">
                <!-- Foto de perfil -->
                <?php if ($foto_url): ?>
                    <img src="<?php echo htmlspecialchars($foto_url); ?>" alt="Foto de perfil" class="profile-photo">
                <?php else: ?>
                    <p>No tienes foto de perfil.</p>
                <?php endif; ?>
                <h2 id="username"><?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></h2>
            </div>
        </div>

        <div class="button-container">
            <button id="inicio-button" onclick="window.location.href='https://localhost/PHP-registro/inicio.php'">Inicio</button>
        </div>

        <!-- Sección de configuraciones y compras -->
        <div class="settings-and-purchases">
            <div class="settings-section">
                <section class="settings-item">
                    <h2>Editar Perfil</h2>
                    <form method="POST" action="usuario.php">
                        <input type="text" id="username-input" name="nombre_usuario" placeholder="Ingrese su nombre de usuario" value="<?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>" required>
                        <button type="submit">Actualizar</button>
                    </form>
                </section>

                <!-- Subir foto de perfil -->
                <section class="settings-item">
                    <h2>Subir Foto de Perfil</h2>
                    <form method="POST" action="usuario.php" enctype="multipart/form-data">
                        <input type="file" name="foto_perfil" required>
                        <button type="submit">Subir Foto</button>
                    </form>
                </section>

                <section class="settings-item">
                    <button id="logout-button">Cerrar Sesión</button>
                </section>
            </div>

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
                            <?php if ($compras->num_rows > 0): ?>
                                <?php while($compra = $compras->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($compra['producto']); ?></td>
                                        <td><?php echo htmlspecialchars($compra['fecha']); ?></td>
                                        <td><?php echo htmlspecialchars($compra['precio']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">No se encontraron compras.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <script src="JS/usuario.js"></script>
</body>
</html>
