<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include("conexion.php");

$data = json_decode(file_get_contents('php://input'), true);

// Verifica que los datos se hayan recibido correctamente
if (!$data) {
    $response = [
        'success' => false,
        'error' => 'No se recibieron datos.'
    ];
    echo json_encode($response);
    exit;
}

$nctrl = $data['nctrl'] ?? '';
$nombre = $data['nombre'] ?? '';
$apellidos = $data['apellidos'] ?? '';
$carrera = $data['carrera'] ?? '';
$cred = $data['cred'] ?? '';
$contraseña = $data['contraseña'] ?? '';

// Validación de campos vacíos
if (empty($nctrl) || empty($nombre) || empty($apellidos) || empty($carrera) || empty($cred)) {
    $response = [
        'success' => false,
        'error' => 'Todos los campos son obligatorios.'
    ];
    echo json_encode($response);
    exit;
}

// Actualiza los datos en la base de datos
$query = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', carrera = '$carrera', cred = '$cred', contraseña = '$contraseña' WHERE nctrl = '$nctrl'";

$response = [];
if (mysqli_query($conn, $query)) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = mysqli_error($conn);
}

header('Content-Type: application/json');
echo json_encode($response);
?>