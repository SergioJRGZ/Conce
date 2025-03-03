<?php
$conexion = mysqli("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los alquileres con información de usuario y coche
$sql = "SELECT A.id_alquiler, U.nombre, U.apellidos, U.dni, 
               C.modelo, C.marca, C.color, A.prestado, A.devuelto 
        FROM Alquileres A
        JOIN Usuarios U ON A.id_usuario = U.id_usuario
        JOIN Coches C ON A.id_coche = C.id_coche";

$resultado = $conexion->query($sql);
?>

<h2>Lista de Alquileres</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>DNI</th>
        <th>Coche</th>
        <th>Color</th>
        <th>Fecha Prestado</th>
        <th>Fecha Devuelto</th>
        <th>Acciones</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
    <tr>
        <td><?= $fila["id_alquiler"] ?></td>
        <td><?= $fila["nombre"] . " " . $fila["apellidos"] ?></td>
        <td><?= $fila["dni"] ?></td>
        <td><?= $fila["modelo"] . " - " . $fila["marca"] ?></td>
        <td><?= $fila["color"] ?></td>
        <td><?= $fila["prestado"] ?></td>
        <td><?= $fila["devuelto"] ?></td>
        <td>
            <a href="eliminar_alquiler.php?id=<?= $fila['id_alquiler'] ?>" onclick="return confirm('¿Eliminar alquiler?')">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<a href="alquileres.php">Volver</a>
