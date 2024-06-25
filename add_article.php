<?php
require_once '../controlador/publicar_controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $autor = $_POST['autor'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $categoria = $_POST['categoria'];

    $publicarController = new PublicarController();
    $publicarController->publicarArticulo($titulo, $contenido, $autor, $fecha_publicacion, $categoria);

    header('Location: admin_blog.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h2>Agregar Nuevo Artículo</h2>
    <form method="POST" action="add_article.php">
        <label>Título:</label>
        <input type="text" name="titulo" required><br>
        <label>Contenido:</label>
        <textarea name="contenido" required></textarea><br>
        <label>Autor:</label>
        <input type="text" name="autor" required><br>
        <label>Fecha de Publicación:</label>
        <input type="date" name="fecha_publicacion" required><br>
        <label>Categoría:</label>
        <input type="text" name="categoria" required><br>
        <button type="submit">Publicar</button>
    </form>
</body>
</html>
