<?php
include 'controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM admin_blog WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Artículo eliminado exitosamente.";
    } else {
        echo "Error al eliminar el artículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Artículo</title>
</head>
<body>
    <h1>Eliminar Artículo</h1>
    <form action="admin_delete.php" method="get">
        <label for="id">ID del Artículo a Eliminar:</label>
        <input type="number" id="id" name="id" required><br>
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
