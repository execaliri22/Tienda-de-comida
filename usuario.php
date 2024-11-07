<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/usuario.css">
    <title>Página de Perfil</title>
</head>
<body>
    <div class="container">
        <div class="profile-section">
            <h1>Perfil</h1>
            <div class="profile-info">
                <img id="profile-pic" src="default-profile.png" alt="Foto de perfil">
                <h2 id="username">Nombre de Usuario</h2>
            </div>
        </div>
        <div class="settings-section">
            <section class="settings-item">
                <h2>Editar Perfil</h2>
                <form action="guardar_usuario.php" method="POST" enctype="multipart/form-data">
                    <label for="username-input">Nombre de Usuario</label>
                    <input type="text" id="username-input" name="nombre_usuario" placeholder="Ingrese su nombre de usuario" required>

                    <label for="photo-input">Agregar Foto de Perfil</label>
                    <input type="file" id="photo-input" name="foto" accept="image/*">

                    <button type="submit" id="save-button">Guardar Cambios</button>
                </form>
            </section>
            <section class="settings-item">
                <button id="logout-button">Cerrar Sesión</button>
            </section>
        </div>
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
                
            </table>
        </section>
    </div>
    <script src="JS/usuario.js"></script>
</body>
</html>
