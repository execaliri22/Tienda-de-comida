<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['usuario_id'])) {
    $foto_perfil = isset($_SESSION['foto_perfil']) ? $_SESSION['foto_perfil'] : 'images/default_profile_picture.jpg'; // Foto por defecto si no hay foto en la sesión
    $nombre_usuario = $_SESSION['nombre_usuario']; // Nombre del usuario almacenado en la sesión
} else {
    // Si no ha iniciado sesión, redirige al login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<header>
<div class="menu container">
    <img class="logo-1" src="images/logo.svg" alt="" >
    <input type="checkbox" id="menu">
    <label for="menu"> 
    <img src="images/menu.png" class="menu-icono" alt="">
    </label>
    <nav class="navbar">
      <div class="profile-info">
        <!-- Foto de perfil con la imagen obtenida de la sesión -->
        <img id="profile-pic" src="<?php echo $foto_perfil; ?>" alt="Foto de perfil">
        <h2 id="username"><?php echo $_SESSION['nombre_usuario']; ?></h2> <!-- Muestra el nombre de usuario -->
    </div>
      <div class="menu-1">
          <ul>
              <li><a href="https://localhost/PHP-registro/productos.php">Menú</a></li>
          </ul>  
      </div>
      <img class="logo-2" src="images/logo.svg" alt="Logo">     
      <div class="menu-2">
          <div class="socials">
              <!-- Botón de usuario con submenú -->
              <a href="http://localhost/PHP-registro/usuario.php" class="unique-button" id="userButton">
                  <img src="images/usuario.png" alt="Icono de Usuario">
              </a>
          </div>
      </div>
  </nav>
</div>

<div class="header-content container">
  <div class="swiper mySwiper-1">
      <div class="swiper-wrapper">
          <div class="swiper-slide">
              <div class="slider">
                  <div class="slider-txt">
                      <h1>Hamburguesa</h1>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, eveniet mollitia saepe aut doloremque exercitationem modi recusandae qui, sapiente, odio nihil magnam tempora minima expedita a atque ea voluptatem suscipit.
                      </p>
                  </div>
                  <div class="slider-img">
                      <img src="images/slider1.png" alt="">
                  </div>
              </div>
          </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
  </div>
</div>
</header>

<main class="product">
  <div class="tabs container">
    <!-- Aquí tus pestañas de productos -->
    <!-- Repite las pestañas y productos según tu código original -->
  </div>
</main>

<section class="info container">
    <div class="info-img">
        <img src="images/info.png" alt="">
    </div>
    <div class="info-txt">
        <h2>Informacion</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At nulla animi voluptatem, temporibus minus cupiditate voluptates facere illum quaerat qui, nisi architecto optio laboriosam mollitia error ratione eveniet itaque quod.</p>
    </div>
</section>

<section class="horario">
  <div class="horario-info container">
    <h2>Horario</h2>
    <div class="horario-txt">
      <div class="txt">
        <h4>Direccion</h4>
        <p>Lorem ipsum dolor sit amet consectetur</p>
      </div>
      <div class="txt">
        <h4>Horario</h4>
        <p>Lunes a miercoles CERRADO</p>
        <p>Jueves a Domingos ABIERTO de 20:00 a 1:00</p>
      </div>
      <div class="txt">
        <h4>Telefono</h4>
        <p>2634876787</p>
      </div>
      <div class="txt">
        <h4>Redes sociales</h4>
        <div class="socials">
          <a href="#">
              <div class="social">
                  <img src="images/s1.svg" alt="">
              </div>
          </a>
          <a href="#">
              <div class="social">
                  <img src="images/s2.svg" alt="">
              </div>
          </a>
          <a href="#">
              <div class="social">
                  <img src="images/s3.svg" alt="">
              </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <iframe class="map" src="https://www.google.com/maps/embed?pb=..." width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="JS/script.js"></script>
</body>
</html>
