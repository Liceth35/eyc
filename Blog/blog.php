<?php
require_once './controlador/blog_controller.php';

$blogController = new BlogController();
$articulos = $blogController->obtenerTodosLosArticulos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>

<header>
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contactos.php">Contactos</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="certificado.php">Certificado</a></li>
            </ul>
        </nav>
    </div><!-- //CONTAINER -->
</header><!-- //HEADER -->

<main>
    <div class="container">
        <h1>Blog</h1>
        <?php if ($articulos): ?>
            <?php foreach ($articulos as $articulo): ?>
                <article>
                    <h2><?php echo $articulo['titulo']; ?></h2>
                    <p><?php echo $articulo['resumen']; ?></p>
                    <a href="ver_articulo.php?id=<?php echo $articulo['id']; ?>">Leer más</a>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay artículos disponibles.</p>
        <?php endif; ?>
    </div><!-- //CONTAINER -->
</main><!-- //MAIN CONTENT -->

<footer>
    <div class="container">
        <p>&copy; 2024 Blog de Inspecciones de Gas. Todos los derechos reservados.</p>
    </div><!-- //CONTAINER -->
</footer><!-- //FOOTER -->

</body>
</html>
