<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Artículo</title>
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
        <h1>Añadir Nuevo Artículo</h1>
        <form action="procesar_articulo.php" method="post">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="resumen">Resumen</label>
                <textarea id="resumen" name="resumen" required></textarea>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea id="contenido" name="contenido" required></textarea>
            </div>
            <div class="form-group">
                <label for="url_imagen">URL de la Imagen</label>
                <input type="text" id="url_imagen" name="url_imagen">
            </div>
            <button type="submit" class="btn">Añadir Artículo</button>
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
