<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "rootroot";
$db = "concesionario";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Listar Alquileres
$sql = "SELECT * FROM alquileres";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Alquileres</title>
</head>
<body>
    <h1>Lista de Alquileres</h1>
    <table border='1'>
        <tr>
            <th>ID_Usuario</th>
            <th>ID_Coche</th>
            <th>Prestado</th>
            <th>Devuelto</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['id_coche']; ?></td>
                <td><?php echo $row['prestado']; ?></td>
                <td><?php echo $row['devuelto']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
