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

$id_vendedor = $_SESSION["id_usuario"];
$sql = "SELECT * FROM Coches";
$resultado = $conexion->query($sql);
?>

<h2>Mis Coches</h2>
<table border="1">
    <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>
    <?php while ($coche = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $coche["modelo"] ?></td>
        <td><?= $coche["marca"] ?></td>
        <td><?= $coche["color"] ?></td>
        <td><?= $coche["precio"] ?> €</td>
        <td><img src="<?= $coche["foto"] ?>" width="100"></td>
        <td>
            <a href="editar_coche.php?id=<?= $coche['id_coche'] ?>">Editar</a> | 
            <a href="eliminar_coche.php?id=<?= $coche['id_coche'] ?>" onclick="return confirm('¿Eliminar coche?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="alta_coche.php">Registrar otro coche</a> | <a href="logout.php">Cerrar sesión</a>
