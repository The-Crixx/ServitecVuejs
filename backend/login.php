<?php
header('Content-Type: application/json');
session_start();
include("conexion.php");

// Get data from POST request
$nctrl = $_POST['nctrl'] ?? '';
$password = $_POST['contraseña'] ?? '';

$response = ['status' => 'error', 'message' => 'Usuario no encontrado'];

try {
    $Query = "SELECT * FROM usuarios WHERE nctrl = ?";
    $stmt = $conn->prepare($Query);
    $stmt->execute([$nctrl]);
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verificar la contraseña
        if ($password == $row["contraseña"]) {
            // Preparar respuesta de éxito
            $response = [
                'status' => 'success',
                'message' => 'Inicio de sesión exitoso',
                'username' => $row['nombre'],
                'nctrl' => $nctrl
            ];
            
            // Establecer variables de sesión
            $_SESSION['username'] = $row['nombre'];
            $_SESSION['nctrl'] = $nctrl;
        } else {
            $response = [
                'status' => 'error', 
                'message' => 'Contraseña incorrecta'
            ];
        }
    }
} catch (PDOException $e) {
    $response = [
        'status' => 'error', 
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ];
}

// Devolver respuesta JSON
echo json_encode($response);
$conn = null;
?>