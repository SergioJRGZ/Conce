<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Seleccionar los coches que no están alquilados
$sql = "SELECT * FROM Coches WHERE alquilado = 0";  
$resultado = $conexion->query($sql);
?>

<h2>Consultar Coches Disponibles</h2>

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
          
            <a href="ver_coche.php?id=<?= $fila['id_coche'] ?>">Ver Detalles</a>
        </td>
    </tr>
    <?php } ?>
</table>

<a href="login.php">Iniciar sesión</a> | <a href="registro.php">Registrarse</a>
