<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_REQUEST["dni"];
    $password = $_REQUEST["password"];

    $sql = "SELECT * FROM Usuarios WHERE dni = '$dni'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario["password"])) {
            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["tipo"] = $usuario["tipo"];

            if ($usuario["tipo"] == "comprador") {
                header("Location: buscar_coches.php");
            } else {
                header("Location: alta_coche.php");
            }
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<h2>Iniciar Sesión</h2>
<form method="post">
    DNI: <input type="text" name="dni" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Ingresar">
</form>
<a href="index.php">Volver al inicio</a>
