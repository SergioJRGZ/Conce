<?php
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $dni = $_REQUEST["dni"];
    $password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT); // Encriptar contraseña
    $tipo = $_REQUEST["tipo"]; // Comprador o Vendedor
    $saldo = 0; // Por defecto, saldo inicial 0

    $sql = "INSERT INTO Usuarios (nombre, apellidos, dni, password, tipo, saldo) 
            VALUES ('$nombre', '$apellidos', '$dni', '$password', '$tipo', '$saldo')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<h2>Registro de Usuario</h2>
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Apellidos: <input type="text" name="apellidos" required><br>
    DNI: <input type="text" name="dni" required><br>
    Contraseña: <input type="password" name="password" required><br>
    Tipo de usuario:
    <select name="tipo" required>
        <option value="comprador">Comprador</option>
        <option value="vendedor">Vendedor</option>
    </select><br>
    <input type="submit" value="Registrarse">
</form>
<a href="index.php">Volver al inicio</a>
