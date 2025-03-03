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
    $sql = "SELECT * FROM Coches WHERE id_coche = $id_coche";
    $resultado = $conexion->query($sql);
    $coche = $resultado->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_coche = $_REQUEST["id_coche"];
    $modelo = $_REQUEST["modelo"];
    $marca = $_REQUEST["marca"];
    $color = $_REQUEST["color"];
    $precio = $_REQUEST["precio"];
    $foto = $_REQUEST["foto"];

    $sql = "UPDATE Coches SET modelo='$modelo', marca='$marca', color='$color', precio='$precio', foto='$foto' 
            WHERE id_coche=$id_coche";

    if ($conexion->query($sql) === TRUE) {
        echo "Coche actualizado. <a href='mis_coches.php'>Volver</a>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<h2>Editar Coche</h2>
<form method="post">
    <input type="hidden" name="id_coche" value="<?= $coche['id_coche'] ?>">
    Modelo: <input type="text" name="modelo" value="<?= $coche['modelo'] ?>" required><br>
    Marca: <input type="text" name="marca" value="<?= $coche['marca'] ?>" required><br>
    Color: <input type="text" name="color" value="<?= $coche['color'] ?>" required><br>
    Precio: <input type="number" name="precio" step="0.01" value="<?= $coche['precio'] ?>" required><br>
    Foto (URL): <input type="text" name="foto" value="<?= $coche['foto'] ?>" required><br>
    <input type="submit" value="Actualizar Coche">
</form>
<a href="coches_vendedores.php">Cancelar</a>
