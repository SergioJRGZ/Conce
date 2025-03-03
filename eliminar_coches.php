<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conexion->query("DELETE FROM Coches WHERE id_coche = $id");
}

header("Location: listar_coches.php");
?>
