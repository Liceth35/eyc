<?php
require_once '../controlador/editar_articulo.php'; // Cambia la ruta para incluir el controlador de editar artículo

$id = $_GET['id'];
$editarArticuloController = new EditarArticuloController();
$articulo = $editarArticuloController->obtenerArticuloPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $imagen = $_POST['imagen'];  // Asumiendo que aquí deberías usar $_POST['imagen'] en lugar de $_POST['imagen']

    $editarArticuloController->editarArticulo($id, $titulo, $contenido, $imagen);

    header("Location: admin_blog.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Artículo</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Editar Artículo</h1>
    <form method="POST" action="edit-article.php?id=<?php echo $id; ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo isset($articulo[0]['titulo']) ? $articulo[0]['titulo'] : ''; ?>" required>
        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required><?php echo isset($articulo[0]['contenido']) ? $articulo[0]['contenido'] : ''; ?></textarea>
        <label for="imagen">URL de la Imagen:</label>
        <input type="text" id="imagen" name="imagen" value="<?php echo isset($articulo[0]['imagen']) ? $articulo[0]['imagen'] : ''; ?>">
        <button type="submit">Actualizar Artículo</button>
    </form>
</body>
</html>
