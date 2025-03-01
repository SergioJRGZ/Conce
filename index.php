<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "rootroot";
$db = "concesionario";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="utf-8">
    <title>Página Concesionarios</title>
</head>
<body>
    <h1>Página Principal</h1>
    <ul>
        <li><a href="coches.php">Coches</a></li>
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="alquiler.php">Alquileres</a></li>
    </ul>
</body>
</html>