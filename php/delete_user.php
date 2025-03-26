<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// filepath: c:\xampp\htdocs\vue\backend\delete_user.php
include("conexion.php");

$data = json_decode(file_get_contents('php://input'), true);
$nctrl = $data['nctrl'];

$query = "DELETE FROM usuarios WHERE nctrl = '$nctrl'";

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