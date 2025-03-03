<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM Coches");
?>

<h2>Lista de Coches</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $fila["id_coche"] ?></td>
        <td><?= $fila["modelo"] ?></td>
        <td><?= $fila["marca"] ?></td>
        <td><?= $fila["color"] ?></td>
        <td><?= $fila["precio"] ?></td>
        <td>
            <a href="editar_coche.php?id=<?= $fila['id_coche'] ?>">Editar</a>
            <a href="eliminar_coche.php?id=<?= $fila['id_coche'] ?>" onclick="return confirm('¿Eliminar coche?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<a href="coches.php">Volver</a>
