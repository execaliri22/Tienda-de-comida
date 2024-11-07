<?php
include("conexion.php");
if (isset($_POST["register"])) {
    if (
        strlen($_POST["nombre"]) >= 1 &&
        strlen($_POST["apellido"]) >= 1 &&
        strlen($_POST["email"]) >= 1 &&
        strlen($_POST["password"]) >= 1
    ) {
        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $fecha = date("Y-m-d"); 
       
        $consulta = "INSERT INTO usuarios (nombre, apellido, email, password, fecha) 
                     VALUES ('$nombre', '$apellido', '$email', '$password', '$fecha')";
        
$resultado = mysqli_query($conexion, $consulta);
if ($resultado) {
  
    header("Location: login.php");
    exit();
} else {
    echo "<h3 class='error'>Ocurrió un error: " . mysqli_error($conexion) . "</h3>";
}
} else {
echo "<h3 class='error'>Llena todos los campos</h3>";
}
}
