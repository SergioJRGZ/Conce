<?php
session_start();
if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo"] != "vendedor") {
    header("Location: login.php"); // Redirige si no es vendedor
    exit();
}

$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_REQUEST["modelo"];
    $marca = $_REQUEST["marca"];
    $color = $_REQUEST["color"];
    $precio = $_REQUEST["precio"];
    $foto = $_REQUEST["foto"]; // Se podría mejorar para subir archivos
    $id_vendedor = $_SESSION["id_usuario"];

    $sql = "INSERT INTO Coches (modelo, marca, color, precio, alquilado, foto) 
            VALUES ('$modelo', '$marca', '$color', '$precio', 0, '$foto')";

    if ($conexion->query($sql) === TRUE) {
        echo "Coche registrado correctamente. <a href='mis_coches.php'>Ver mis coches</a>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<h2>Registrar Coche</h2>
<form method="post">
    Modelo: <input type="text" name="modelo" required><br>
    Marca: <input type="text" name="marca" required><br>
    Color: <input type="text" name="color" required><br>
    Precio: <input type="number" name="precio" step="0.01" required><br>
    Foto (URL): <input type="text" name="foto" required><br>
    <input type="submit" value="Registrar Coche">
</form>
<a href="coches_vendedores.php">Ver mis coches</a> | <a href="logout.php">Cerrar sesión</a>
