<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// filepath: c:\xampp\htdocs\vue\php\conexion.php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "servitec";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>