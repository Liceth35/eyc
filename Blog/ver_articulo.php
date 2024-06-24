<?php
require_once '../controlador/conexion.php';

$id = $_GET['id'];
$blogController = new BlogController();
$articulo = $blogController->obtenerArticuloPorId($id);

if (!$articulo) {
    echo "Artículo no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $articulo[0]['titulo']; ?></title>
    <link rel="stylesheet" href="../css/ver_articulo.css">
</head>
<body>
    <div class="container">
        <article class="articulo">
            <h1 class="titulo"><?php echo $articulo[0]['titulo']; ?></h1>
            <?php if (isset($articulo[0]['imagen']) && !empty($articulo[0]['imagen'])): ?>
                <img src="<?php echo $articulo[0]['imagen']; ?>" alt="Imagen del artículo" class="imagen-articulo">
            <?php else: ?>
                <p class="sin-imagen">No hay imagen disponible para este artículo.</p>
            <?php endif; ?>
            <div class="contenido-articulo">
                <?php echo nl2br($articulo[0]['contenido']); ?>
            </div>
        </article>
    </div>
</body>
</html>
