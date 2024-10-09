<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$user = "root";
$password = "12345"; 
$db = "registro_usuarios";

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_errno) {
    die("Conexión fallida: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
}

// Verifica que se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
    exit;
}

// Obtiene el cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Verifica que se recibieron los datos
if (isset($data['direccion']) && isset($data['opcionEnvio']) && isset($data['carritoItems'])) {
    $direccion = $data['direccion'];
    $opcionEnvio = $data['opcionEnvio'];
    $carritoItems = $data['carritoItems'];

    foreach ($carritoItems as $item) {
        $nombreProducto = $item['nombre'];
        $precioProducto = $item['precio'];

        // Inserta la compra en la base de datos
        $sql = "INSERT INTO compras (nombre_P, direccion, opcion_envio, fecha, precio) VALUES ('$nombreProducto', '$direccion', '$opcionEnvio', NOW(), '$precioProducto')";

        if (!$conexion->query($sql)) {
            echo json_encode(['success' => false, 'error' => $conexion->error]);
            exit;
        }
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
}

$conexion->close();
?>
