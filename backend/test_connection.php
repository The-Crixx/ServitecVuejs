<?php
include("conexion.php");

try {
    $stmt = $conn->query("SELECT 1");
    echo "Conexión exitosa y consulta ejecutada correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>