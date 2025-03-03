<?php
session_start();
if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo"] != "vendedor") {
    header("Location: login.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET["id"])) {
    $id_coche = $_GET["id"];
    $conexion->query("DELETE FROM Coches WHERE id_coche = $id_coche");
}

header("Location: coches_vendedores.php");
?>
