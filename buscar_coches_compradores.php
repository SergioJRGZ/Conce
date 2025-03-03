<?php
session_start();
if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo"] != "comprador") {
    header("Location: login.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM Coches WHERE alquilado = 0";  // Solo coches no alquilados
if (isset($_REQUEST["buscar"])) {
    $modelo = $_REQUEST["modelo"];
    $marca = $_REQUEST["marca"];
    $precio = $_REQUEST["precio"];
    $sql .= " AND modelo LIKE '%$modelo%' AND marca LIKE '%$marca%' AND precio <= $precio";
}

$resultado = $conexion->query($sql);
?>

<h2>Buscar Coches Disponibles</h2>
<form method="post">
    Modelo: <input type="text" name="modelo"><br>
    Marca: <input type="text" name="marca"><br>
    Precio máximo: <input type="number" name="precio" step="0.01"><br>
    <input type="submit" name="buscar" value="Buscar">
</form>

<h3>Resultados de la búsqueda:</h3>
<table border="1">
    <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $fila["modelo"] ?></td>
        <td><?= $fila["marca"] ?></td>
        <td><?= $fila["color"] ?></td>
        <td><?= $fila["precio"] ?> €</td>
        <td><img src="<?= $fila["foto"] ?>" width="100"></td>
        <td>
            <a href="ver_coche.php?id=<?= $fila['id_coche'] ?>">Ver</a>
        </td>
    </tr>
    <?php } ?>
</table>

<a href="logout.php">Cerrar sesión</a>
