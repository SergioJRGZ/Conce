<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "rootroot";
$db = "concesionario";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Alquileres</title>
</head>
<body>
    <h1>Gestión de Alquileres</h1>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="alquiler_listar.php">Listar</a></li>
        <li><a href="alquiler_borrar.php">Borrar</a></li>
    </ul>
</body>
</html>
