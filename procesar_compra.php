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
    http_response_code(500); // Error del servidor
    echo json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos']);
    exit;
}

// Verifica que se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método no permitido
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
    exit;
}

// Obtiene el cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Verifica que se recibieron los datos
if (!isset($data['direccion']) || !isset($data['opcionEnvio']) || !isset($data['opcionPago']) || !isset($data['carritoItems'])) {
    http_response_code(400); // Solicitud incorrecta
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
    exit;
}

// Asignar y sanitizar datos
$direccion = $conexion->real_escape_string($data['direccion']);
$opcionEnvio = $conexion->real_escape_string($data['opcionEnvio']);
$opcionPago = $conexion->real_escape_string($data['opcionPago']);
$carritoItems = $data['carritoItems'];

// Preparar la consulta SQL para incluir la opción de pago
$sql = $conexion->prepare("INSERT INTO compras (nombre_P, direccion, opcion_envio, opcion_pago, fecha, precio) VALUES (?, ?, ?, ?, NOW(), ?)");

if ($sql === false) {
    http_response_code(500); // Error en la preparación de la consulta
    echo json_encode(['success' => false, 'error' => 'Error al preparar la consulta SQL']);
    exit;
}

// Insertar cada producto del carrito con el método de pago seleccionado
foreach ($carritoItems as $item) {
    $nombreProducto = $conexion->real_escape_string($item['nombre']);
    $precioProducto = floatval(str_replace('$', '', $item['precio'])); 

    // Vincular los parámetros
    $sql->bind_param('ssssd', $nombreProducto, $direccion, $opcionEnvio, $opcionPago, $precioProducto);

    // Ejecutar la consulta
    if (!$sql->execute()) {
        http_response_code(500); // Error del servidor
        echo json_encode(['success' => false, 'error' => $sql->error]);
        exit;
    }
}

// Cerrar la consulta y la conexión
$sql->close();
$conexion->close();

// Respuesta exitosa
http_response_code(200); // Éxito
echo json_encode(['success' => true]);
?>
