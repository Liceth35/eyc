<?php
include './controlador/conexion.php';
session_start();
if (!isset($_SESSION['correo_usuarios_blog'])) {
    header("Location: login_blog.php");
    exit();
}
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
    $url_imagen = !empty($_POST['url_imagen']) ? $_POST['url_imagen'] : NULL; // Campo opcional
    $url_videos = !empty($_POST['url_videos']) ? $_POST['url_videos'] : NULL; // Campo opcional

    // Actualizar el artículo en la base de datos
    $sql = "UPDATE admin_blog SET titulo = :titulo, resumen = :resumen, contenido = :contenido, url_imagen = :url_imagen, url_videos = :url_videos, fecha_actualizacion = NOW() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':url_imagen', $url_imagen, PDO::PARAM_NULL); // Permitir valores NULL
    $stmt->bindParam(':url_videos', $url_videos, PDO::PARAM_NULL); // Permitir valores NULL
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
<button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
<div class="button-container">
    <a href="./admin_create.php" class="button">Agregar</a>
    <a href="./admin_delete.php" class="button button-delete">Eliminar</a>
    <a href="./blog.php" class="button-blog">Blog</a>
</div>
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
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']); ?>">

        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($article['titulo']); ?>" required><br><br>

        <label for="resumen">Resumen:</label><br>
        <textarea id="resumen" name="resumen" rows="3" required><?php echo htmlspecialchars($article['resumen']); ?></textarea><br><br>

        <label for="contenido">Contenido:</label><br>
        <textarea id="contenido" name="contenido" rows="10" required><?php echo htmlspecialchars($article['contenido']); ?></textarea><br><br>

        <label for="url_imagen">URL de la Imagen:</label><br>
        <input type="text" id="url_imagen" name="url_imagen" value="<?php echo htmlspecialchars($article['url_imagen']); ?>"><br><br>

        <label for="url_videos">URL del Video:</label><br>
        <input type="text" id="url_videos" name="url_videos" value="<?php echo htmlspecialchars($article['url_videos']); ?>"><br><br>

        <button type="submit" class="btn-actualizar">Actualizar</button>
    </form>
<?php endif; ?>
<script>
function cerrarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                console.log("Sesión cerrada"); // Para depurar
                window.location.replace("index.php");
            } else {
                console.log("Error al cerrar sesión"); // Para depurar
            }
        }
    };
    xhttp.open("GET", "./controlador/logaout.php", true);
    xhttp.send();
}

window.onload = function() {
    if (window.history.length > 1) {
        window.history.forward();
    }
}
</script>
</body>
</html>
