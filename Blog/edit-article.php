<?php
require_once './controlador/controlador.php';

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
    <title>Editar Artículo</title>
    <link rel="stylesheet" href="css/admin.css">
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
                <li><a href="add-article.php">Añadir Artículo</a></li>
            </ul>
        </nav>
    </div><!-- //CONTAINER -->
</header><!-- //HEADER -->

<main>
    <div class="container">
        <h1>Editar Artículo</h1>
        <form action="procesar_edicion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $articulo['id']; ?>">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $articulo['titulo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="resumen">Resumen</label>
                <textarea id="resumen" name="resumen" required><?php echo $articulo['resumen']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea id="contenido" name="contenido" required><?php echo $articulo['contenido']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="url_imagen">URL de la Imagen</label>
                <input type="text" id="url_imagen" name="url_imagen" value="<?php echo $articulo['url_imagen']; ?>">
            </div>
            <button type="submit" class="btn">Guardar Cambios</button>
        </form>
    </div><!-- //CONTAINER -->
</main><!-- //MAIN CONTENT -->

<footer>
    <div class="container">
        <p>&copy; 2024 Blog de Inspecciones de Gas. Todos los derechos reservados.</p>
    </div><!-- //CONTAINER -->
</footer><!-- //FOOTER -->

</body>
</html>
