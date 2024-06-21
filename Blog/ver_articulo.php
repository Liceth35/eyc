<?php
require_once './controlador/blog_controller.php';

$blogController = new BlogController();
$articulo = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $articulo = $blogController->obtenerArticuloPorId($id);
}

if (!$articulo) {
    echo "Artículo no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $articulo['titulo']; ?></title>
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
        <h1><?php echo $articulo['titulo']; ?></h1>
        <p><?php echo $articulo['contenido']; ?></p>
        <?php if ($articulo['url_imagen']): ?>
            <img src="<?php echo $articulo['url_imagen']; ?>" alt="<?php echo $articulo['titulo']; ?>">
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
