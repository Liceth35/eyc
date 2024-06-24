<?php
require_once '../controlador/conexion.php';

$articleController = new ArticleController();
$articulos = $articleController->getArticles();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Blog</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Administrar Blog</h1>
    <a href="add-article.php">Agregar Nuevo Artículo</a>
    <?php if (empty($articulos)): ?>
        <p>No hay artículos disponibles.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Resumen</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Fecha de Creación</th>
                    <th>Última Actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $articulo): ?>
                    <tr>
                        <td><?php echo $articulo['id']; ?></td>
                        <td><?php echo $articulo['titulo']; ?></td>
                        <td><?php echo $articulo['resumen']; ?></td>
                        <td><?php echo $articulo['contenido']; ?></td>
                        <td>
                            <?php if (!empty($articulo['url_imagen'])): ?>
                                <img src="<?php echo $articulo['url_imagen']; ?>" alt="Imagen" width="100">
                            <?php else: ?>
                                <p>No hay imagen disponible</p>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $articulo['fecha_creacion']; ?></td>
                        <td><?php echo $articulo['fecha_actualizacion']; ?></td>
                        <td>
                            <a href="edit-article.php?id=<?php echo $articulo['id']; ?>">Editar</a>
                            <a href="delete-article.php?id=<?php echo $articulo['id']; ?>" onclick="return confirm('¿Está seguro de eliminar este artículo?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
