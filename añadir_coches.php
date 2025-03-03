<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_REQUEST["modelo"];
    $marca = $_REQUEST["marca"];
    $color = $_REQUEST["color"];
    $precio = $_REQUEST["precio"];
    $foto = $_REQUEST["foto"]; 

    $sql = "INSERT INTO Coches (modelo, marca, color, precio, alquilado, foto) VALUES ('$modelo', '$marca', '$color', '$precio', 0, '$foto')";
    $conexion->query($sql);

    header("Location: listar_coches.php");
}
?>

<h2>Agregar Coche</h2>
<form method="post">
    Modelo: <input type="text" name="modelo" required><br>
    Marca: <input type="text" name="marca" required><br>
    Color: <input type="text" name="color" required><br>
    Precio: <input type="number" step="0.01" name="precio" required><br>
    Foto (URL): <input type="text" name="foto"><br>
    <button type="submit">Agregar</button>
</form>

<a href="coches.php">Volver</a>
