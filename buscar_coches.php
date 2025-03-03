<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$busqueda = "";
$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $busqueda = $_POST["busqueda"];
    $sql = "SELECT * FROM Coches WHERE modelo LIKE '%$busqueda%' OR marca LIKE '%$busqueda%'";
    $resultado = $conexion->query($sql);
}
?>

<h2>Buscar Coche</h2>
<form method="post">
    <input type="text" name="busqueda" placeholder="Modelo o Marca" value="<?= $busqueda ?>">
    <button type="submit">Buscar</button>
</form>

<?php if ($resultado && $resultado->num_rows > 0) { ?>
    <h3>Resultados:</h3>
    <ul>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <li><?= $fila["modelo"] ?> (Marca: <?= $fila["marca"] ?>) - <a href="editar_coche.php?id=<?= $fila['id_coche'] ?>">Editar</a></li>
        <?php } ?>
    </ul>
<?php } elseif ($busqueda) { ?>
    <p>No se encontraron resultados.</p>
<?php } ?>

<a href="coches.php">Volver</a>
