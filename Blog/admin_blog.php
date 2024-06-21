<?php
require_once '../controlador/blog_controller.php';

$blogController = new BlogController();
$articulos = $blogController->obtenerTodosLosArticulos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Blog</title>
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
        <h1>Administración de Artículos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Resumen</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($articulos): ?>
                    <?php foreach ($articulos as $articulo): ?>
                        <tr>
                            <td><?php echo $articulo['id']; ?></td>
                            <td><?php echo $articulo['titulo']; ?></td>
                            <td><?php echo $articulo['resumen']; ?></td>
                            <td><?php echo $articulo['fecha_publicacion']; ?></td>
                            <td>
                                <a href="edit-article.php?id=<?php echo $articulo['id']; ?>">Editar</a>
                                <a href="eliminar_articulo.php?id=<?php echo $articulo['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este artículo?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No hay artículos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div><!-- //CONTAINER -->
</main><!-- //MAIN CONTENT -->

<footer>
    <div class="container">
        <p>&copy; 2024 Blog de Inspecciones de Gas. Todos los derechos reservados.</p>
    </div><!-- //CONTAINER -->
</footer><!-- //FOOTER -->

</body>
</html>
