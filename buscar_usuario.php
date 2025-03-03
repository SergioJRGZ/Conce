<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$busqueda = "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $busqueda = $_POST["busqueda"];
    $sql = "SELECT * FROM Usuarios WHERE nombre LIKE '%$busqueda%' OR dni LIKE '%$busqueda%'";
    $resultado = $conexion->query($sql);
}
?>

<h2>Buscar Usuario</h2>
<form method="post">
    <input type="text" name="busqueda" placeholder="Nombre o DNI" value="<?= $busqueda ?>">
    <button type="submit">Buscar</button>
</form>

<?php if ($resultado && $resultado->num_rows > 0) { ?>
    <h3>Resultados:</h3>
    <ul>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <li><?= $fila["nombre"] ?> (DNI: <?= $fila["dni"] ?>) - <a href="editar_usuario.php?id=<?= $fila['id_usuario'] ?>">Editar</a></li>
        <?php } ?>
    </ul>
<?php } elseif ($busqueda) { ?>
    <p>No se encontraron resultados.</p>
<?php } ?>

<a href="usuarios.php">Volver</a>
