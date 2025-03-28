<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include("conexion.php");

// Decodifica los datos JSON enviados en la solicitud
$data = json_decode(file_get_contents('php://input'), true);
$nctrl = $data['nctrl'];

$response = [];

try {
    // Prepara la consulta
    $query = "DELETE FROM usuarios WHERE nctrl = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nctrl); // Vincula el parámetro (tipo "s" para string)
    $stmt->execute();

    // Verifica si se eliminó alguna fila
    if ($stmt->affected_rows > 0) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = 'No se encontró el usuario con el número de control proporcionado.';
    }

    $stmt->close(); // Cierra el statement
} catch (Exception $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close(); // Cierra la conexión
?>