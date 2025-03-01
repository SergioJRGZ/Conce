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

if (isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM alquileres WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: alquileres_borrar.php");
    exit();
}

$query = "SELECT * FROM alquileres";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Alquileres</title>
</head>
<body>
    <h1>Borrar Alquiler</h1>
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
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="borrar" value="Borrar">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
