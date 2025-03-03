<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $usuario = $conexion->query("SELECT * FROM Usuarios WHERE id_usuario = $id")->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST["id"];
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $dni = $_REQUEST["dni"];
    $saldo = $_REQUEST["saldo"];

    $conexion->query("UPDATE Usuarios SET nombre='$nombre', apellidos='$apellidos', dni='$dni', saldo='$saldo' WHERE id_usuario=$id");
    header("Location: listar_usuarios.php");
}
?>

<h2>Editar Usuario</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $usuario["id_usuario"] ?>">
    Nombre: <input type="text" name="nombre" value="<?= $usuario["nombre"] ?>" required><br>
    Apellidos: <input type="text" name="apellidos" value="<?= $usuario["apellidos"] ?>" required><br>
    DNI: <input type="text" name="dni" value="<?= $usuario["dni"] ?>" required><br>
    Saldo: <input type="number" step="0.01" name="saldo" value="<?= $usuario["saldo"] ?>" required><br>
    <button type="submit">Modificar</button>
</form>

<a href="usuarios.php">Volver</a>
