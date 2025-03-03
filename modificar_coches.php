<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $coche = $conexion->query("SELECT * FROM Coches WHERE id_coche = $id")->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST["id"];
    $modelo = $_REQUEST["modelo"];
    $marca = $_REQUEST["marca"];
    $color = $_REQUEST["color"];
    $precio = $_REQUEST["precio"];

    $conexion->query("UPDATE Coches SET modelo='$modelo', marca='$marca', color='$color', precio='$precio' WHERE id_coche=$id");
    header("Location: listar_coches.php");
}
?>

<h2>Editar Coche</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $coche["id_coche"] ?>">
    Modelo: <input type="text" name="modelo" value="<?= $coche["modelo"] ?>" required><br>
    Marca: <input type="text" name="marca" value="<?= $coche["marca"] ?>" required><br>
    Color: <input type="text" name="color" value="<?= $coche["color"] ?>" required><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?= $coche["precio"] ?>" required><br>
    <button type="submit">Modificar</button>
</form>

<a href="coches.php">Volver</a>
