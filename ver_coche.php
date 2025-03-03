<?php
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

?>

<h2>Detalles del Coche</h2>
<?php if ($coche) { ?>
    <p>Modelo: <?= $coche["modelo"] ?></p>
    <p>Marca: <?= $coche["marca"] ?></p>
    <p>Color: <?= $coche["color"] ?></p>
    <p>Precio: <?= $coche["precio"] ?> €</p>
    <img src="<?= $coche["foto"] ?>" width="200">
    
    <p>Este coche está disponible para alquiler, pero necesitas estar logueado para alquilarlo.</p>
<?php } else { ?>
    <p>Coche no encontrado.</p>
<?php } ?>

<a href="consultar_coches.php">Volver a la lista de coches</a> | <a href="login.php">Iniciar sesión</a>
