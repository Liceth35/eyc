<?php
require_once '../controlador/agregar_articulo.php'; // Cambia la ruta para incluir el controlador de agregar artículo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];
    $url_imagen = $_POST['url_imagen'];

    // Fecha de creación y actualización
    $fecha_creacion = date('Y-m-d H:i:s');
    $fecha_actualizacion = $fecha_creacion; // Inicialmente la misma que la de creación

    $agregarArticuloController = new AgregarArticuloController();
    $agregarArticuloController->agregarArticulo($titulo, $resumen, $contenido, $url_imagen, $fecha_creacion, $fecha_actualizacion);

    header("Location: admin_blog.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Artículo</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Agregar Nuevo Artículo</h1>
    <form method="POST" action="add-article.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        
        <!-- Añadido el campo para el resumen -->
        <label for="resumen">Resumen:</label>
        <textarea id="resumen" name="resumen" required></textarea>
        
        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required></textarea>
        
        <!-- Añadido el campo para la URL de la imagen -->
        <label for="url_imagen">URL de la Imagen:</label>
        <input type="text" id="url_imagen" name="url_imagen">
        
        <!-- No se muestran los campos fecha_creacion y fecha_actualizacion, ya que son generados automáticamente -->

        <button type="submit">Agregar Artículo</button>
    </form>
</body>
</html>
