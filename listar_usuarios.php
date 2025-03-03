<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM Usuarios");
?>

<h2>Lista de Usuarios</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Saldo</th>
        <th>Acciones</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $fila["id_usuario"] ?></td>
        <td><?= $fila["nombre"] ?></td>
        <td><?= $fila["apellidos"] ?></td>
        <td><?= $fila["dni"] ?></td>
        <td><?= $fila["saldo"] ?></td>
        <td>
            <a href="modificar_usuario.php?id=<?= $fila['id_usuario'] ?>">Editar</a>
            <a href="eliminar_usuario.php?id=<?= $fila['id_usuario'] ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<a href="usuarios.php">Volver</a>
