<?php
require_once '../controlador/conexion.php';

$blogController = new BlogController();
$articulos = $blogController->obtenerTodosLosArticulos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="../css/blog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1><center>Blog</center></h1>
    <div class="contenedor-articulos">
        <?php if (empty($articulos)): ?>
            <p>No hay artículos disponibles.</p>
        <?php else: ?>
            <?php foreach ($articulos as $articulo): ?>
                <div class="articulo">
                    <h2><?php echo $articulo['titulo']; ?></h2>
                    <p><?php echo substr($articulo['contenido'], 0, 100); ?>...</p>
                    <a href="ver_articulo.php?id=<?php echo $articulo['id']; ?>">Leer más</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
