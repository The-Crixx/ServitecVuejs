<?php
require 'conexion.php';
session_start();

if (!isset($_SESSION['nctrl'])) {
    echo "<script>alert('Error: Sesión no iniciada.'); window.location.href='login.html';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = json_decode(file_get_contents("php://input"), true);
    $departamento = $input['departamento'];
    $nctrl = $_SESSION['nctrl'];
    $return_url = $input['return_url'];

    if (!empty($departamento) && !empty($nctrl)) {
        $sql = "INSERT INTO interes (departamento, nctrl) VALUES (:departamento, :nctrl)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':nctrl', $nctrl);

        if ($stmt->execute()) {
            echo "Interés registrado con éxito.";
        } else {
            echo "Error al registrar el interés.";
        }
    } else {
        echo "Datos incompletos.";
    }
}
?>
