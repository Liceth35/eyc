<?php
require_once '../controlador/blog_controller.php';

$blogController = new BlogController();
$articulos = $blogController->obtenerArticulos();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>
    <h1>Blog</h1>
    <div class="articulos">
        <?php foreach ($articulos as $articulo): ?>
            <div class="articulo">
                <h2><?php echo $articulo['titulo']; ?></h2>
                <p><?php echo $articulo['contenido']; ?></p>
                <p><em>Autor: <?php echo $articulo['autor']; ?></em></p>
                <p><em>Fecha: <?php echo $articulo['fecha_publicacion']; ?></em></p>
                <p><em>Categoría: <?php echo $articulo['categoria']; ?></em></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
