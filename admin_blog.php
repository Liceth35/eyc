<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h1>Administrar Blog</h1>
    <a href="add_article.php">Agregar Nuevo Artículo</a>
    <div class="articulos">
        <?php foreach ($articulos as $articulo): ?>
            <div class="articulo">
                <h2><?php echo $articulo['titulo']; ?></h2>
                <a href="edit_article.php?id=<?php echo $articulo['id']; ?>">Editar</a>
                <a href="delete_article.php?id=<?php echo $articulo['id']; ?>">Eliminar</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
