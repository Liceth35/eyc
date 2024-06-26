<?php
include './controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM admin_blog WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];
    $url_imagen = $_POST['url_imagen'];

    $sql = "UPDATE admin_blog SET titulo = :titulo, resumen = :resumen, contenido = :contenido, url_imagen = :url_imagen, fecha_actualizacion = NOW() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':url_imagen', $url_imagen);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Artículo actualizado exitosamente.";
    } else {
        echo "Error al actualizar el artículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
</head>
<body>
    <h1>Editar Artículo</h1>
    <form action="admin_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $article['id']; ?>">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $article['titulo']; ?>" required><br>

        <label for="resumen">Resumen:</label>
        <textarea id="resumen" name="resumen" required><?php echo $article['resumen']; ?></textarea><br>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required><?php echo $article['contenido']; ?></textarea><br>

        <label for="url_imagen">URL de la Imagen:</label>
        <input type="text" id="url_imagen" name="url_imagen" value="<?php echo $article['url_imagen']; ?>" required><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
