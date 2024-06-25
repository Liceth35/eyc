<?php
require_once '../controlador/editar_controller.php';

$editarController = new EditarController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $autor = $_POST['autor'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $categoria = $_POST['categoria'];

    $editarController->editarArticulo($id, $titulo, $contenido, $autor, $fecha_publicacion, $categoria);

    header('Location: admin_blog.php');
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $articulo = $editarController->obtenerArticuloPorId($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h2>Editar Artículo</h2>
    <form method="POST" action="edit_article.php">
        <input type="hidden" name="id" value="<?php echo $articulo[0]['id']; ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo $articulo[0]['titulo']; ?>" required><br>
        <label>Contenido:</label>
        <textarea name="contenido" required><?php echo $articulo[0]['contenido']; ?></textarea><br>
        <label>Autor:</label>
        <input type="text" name="autor" value="<?php echo $articulo[0]['autor']; ?>" required><br>
        <label>Fecha de Publicación:</label>
        <input type="date" name="fecha_publicacion" value="<?php echo $articulo[0]['fecha_publicacion']; ?>" required><br>
        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $articulo[0]['categoria']; ?>" required><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
