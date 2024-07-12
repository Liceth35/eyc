<?php
require_once './controlador/conexion.php';

$db = new PDODB();
$db->conectar();

// Obtener lista de artículos desde la base de datos
$sql = "SELECT id, titulo FROM admin_blog ORDER BY fecha_actualizacion DESC";
$articulos = $db->consulta($sql);

// Procesar el formulario de actualización del artículo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];
    $url_imagen = $_POST['url_imagen'];

    // Actualizar el artículo en la base de datos
    $sql = "UPDATE admin_blog SET titulo = :titulo, resumen = :resumen, contenido = :contenido, url_imagen = :url_imagen, fecha_actualizacion = NOW() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':url_imagen', $url_imagen);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Artículo actualizado exitosamente.";
    } else {
        echo "Error al actualizar el artículo.";
    }
}

// Función para mostrar la lista de artículos
function mostrarArticulos($articulos) {
    foreach ($articulos as $articulo) {
        echo '<li><a href="admin_edit.php?id=' . $articulo['id'] . '">' . htmlspecialchars($articulo['titulo']) . '</a></li>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Artículos</title>
    <link rel="stylesheet" href="./css/admin_edit.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <h1>Administrar Artículos</h1>

    <!-- Lista de artículos con enlaces directos a la edición -->
    <ul>
        <?php mostrarArticulos($articulos); ?>
    </ul>

    <!-- Formulario de edición de artículo -->
    <?php if (isset($_GET['id'])): ?>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM admin_blog WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$article) {
            die('Artículo no encontrado.');
        }
        ?>

        <h2>Editar Artículo</h2>
        <form action="admin_edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">

            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?php echo $article['titulo']; ?>" required><br><br>

            <label for="resumen">Resumen:</label><br>
            <textarea id="resumen" name="resumen" rows="3" required><?php echo $article['resumen']; ?></textarea><br><br>

            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido" rows="10" required><?php echo $article['contenido']; ?></textarea><br><br>

            <label for="url_imagen">URL de la Imagen:</label><br>
            <input type="text" id="url_imagen" name="url_imagen" value="<?php echo $article['url_imagen']; ?>" required><br><br>

            <button type="submit" class="btn-actualizar">Actualizar</button>

        </form>
    <?php endif; ?>
</body>
</html>
