<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include("conexion.php");

// Decodifica los datos JSON enviados en la solicitud
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$response = [];

try {
    $query = "DELETE FROM comentarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = 'No se encontró el comentario con el ID proporcionado.';
    }
} catch (PDOException $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);

$conn = null;
?>