<?php
$conexion = mysqli_close("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $dni = $_REQUEST["dni"];
    $password = ($_REQUEST["password"]);
    $saldo = $_REQUEST["saldo"];

    $sql = "INSERT INTO Usuarios (nombre, apellidos, dni, password, saldo) VALUES ('$nombre', '$apellidos', '$dni', '$password', '$saldo')";
    $conexion->query($sql);

    header("Location: listar_usuarios.php");
}
?>

<h2>Agregar Usuario</h2>
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Apellidos: <input type="text" name="apellidos" required><br>
    DNI: <input type="text" name="dni" required><br>
    Contraseña: <input type="password" name="password" required><br>
    Saldo: <input type="number" step="0.01" name="saldo" required><br>
    <button type="submit">Agregar</button>
</form>

<a href="usuarios.php">Volver</a>
