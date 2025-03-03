<?php
session_start();
if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo"] != "comprador") {
    header("Location: login.php");
    exit();
}

$conexion = mysqli("localhost", "root", "rootroot", "concesionario");

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
    // Verificar si el coche está disponible
    if ($coche["alquilado"] == 0) {
        $id_usuario = $_SESSION["id_usuario"];
        $fecha_prestado = date("Y-m-d H:i:s");

    // Registrar alquiler
        $sql_alquiler = "INSERT INTO Alquileres (id_usuario, id_coche, prestado) 
                         VALUES ($id_usuario, $id_coche, '$fecha_prestado')";
        if ($conexion->query($sql_alquiler) === TRUE) {
    // Marcar coche como alquilado
            $sql_actualizar_coche = "UPDATE Coches SET alquilado = 1 WHERE id_coche = $id_coche";
            $conexion->query($sql_actualizar_coche);
            echo "¡Coche alquilado con éxito!";
        } else {
            echo "Error al alquilar el coche.";
        }
    } else {
        echo "El coche ya está alquilado.";
    }
}
?>

<h2>Detalles del Coche</h2>
<?php if ($coche) { ?>
    <p>Modelo: <?= $coche["modelo"] ?></p>
    <p>Marca: <?= $coche["marca"] ?></p>
    <p>Color: <?= $coche["color"] ?></p>
    <p>Precio: <?= $coche["precio"] ?> €</p>
    <img src="<?= $coche["foto"] ?>" width="200">
    
    <?php if ($coche["alquilado"] == 0) { ?>
        <form method="post">
            <input type="submit" value="Alquilar Coche">
        </form>
    <?php } else { ?>
        <p>Este coche ya ha sido alquilado.</p>
    <?php } ?>
<?php } else { ?>
    <p>Coche no encontrado.</p>
<?php } ?>

<a href="buscar_coches_compradores.php">Volver a la búsqueda</a> | <a href="logout.php">Cerrar sesión</a>
