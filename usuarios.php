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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="usuarios_añadir.php">Añadir</a></li>
        <li><a href="usuarios_listar.php">Listar</a></li>
        <li><a href="usuarios_buscar.php">Buscar</a></li>
        <li><a href="usuarios_modificar.php">Modificar</a></li>
        <li><a href="usuarios_borrar.php">Borrar</a></li>
    </ul>
</body>
</html>