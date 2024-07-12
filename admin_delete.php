<?php
include 'controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

// Eliminar artículo si se recibió el ID
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

// Consultar todos los artículos
$sql = "SELECT id, titulo, resumen, contenido, url_imagen, fecha_creacion, fecha_actualizacion FROM admin_blog";
$posts = $db->getData($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Artículo</title>
    <link rel="stylesheet" href="./css/admin_delete.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <h1>Eliminar Artículo</h1>
    <form action="admin_delete.php" method="get">
        <label for="id">ID del Artículo a Eliminar:</label>
        <input type="number" id="id" name="id" required><br>
        <button type="submit">Eliminar</button>
    </form>

    <h2>Lista de Artículos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Contenido</th>
                <th>URL Imagen</th>
                <th>Fecha Creación</th>
                <th>Fecha Actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($posts): ?>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($post['id']); ?></td>
                        <td><?php echo htmlspecialchars($post['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($post['resumen']); ?></td>
                        <td><?php echo htmlspecialchars($post['contenido']); ?></td>
                        <td><?php echo htmlspecialchars($post['url_imagen']); ?></td>
                        <td><?php echo htmlspecialchars($post['fecha_creacion']); ?></td>
                        <td><?php echo htmlspecialchars($post['fecha_actualizacion']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No hay artículos disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
