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
<html lang = "es">
<head>
    <meta charset="utf-8">
    <title>Bienvenido al Concesionario</title>
</head>
<body>
    <h1>Bienvenido al Concesionario</h1>
    <h2>Elija una opción</h2>
    <p>Si ya tiene una cuenta, inicie sesión en <a href="Login1.php">Login</a>.</p>
    <p>Si no tiene una cuenta, registrese en <a href="registro.php">Registro</a>.</p>
    <ul>
        <li><a href="coches.php">Coches</a></li>
        <li><a href="usuarios.php">Usuarios</a></li>
        <li><a href="alquiler.php">Alquileres</a></li>
    </ul>
</body>
</html>
