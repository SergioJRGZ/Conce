<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Eliminar el alquiler de la base de datos
    $conexion->query("DELETE FROM Alquileres WHERE id_alquiler = $id");
}

header("Location: alquiler_listar.php");
?>
