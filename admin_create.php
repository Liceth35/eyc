<?php
include './controlador/conexion.php';
session_start();

if (!isset($_SESSION['correo_usuarios_blog'])) {
    header("Location: login_blog.php");
    exit();
}

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

// Manejo del formulario de creación de artículo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];

    // Inicializar variables para almacenar URLs
    $urls_imagenes = [];
    $urls_videos = [];

    // Manejo de las imágenes subidas
    if (isset($_FILES['url_imagenes']) && $_FILES['url_imagenes']['error'][0] === UPLOAD_ERR_OK) {
        $upload_directory = './images/';
        foreach ($_FILES['url_imagenes']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['url_imagenes']['name'][$key]);
            $upload_file = $upload_directory . $file_name;
            if (move_uploaded_file($tmp_name, $upload_file)) {
                $urls_imagenes[] = $upload_file;
            } else {
                echo "Error al subir la imagen: $file_name.";
            }
        }
    }

    // Manejo de los videos subidos
    if (isset($_FILES['url_videos']) && $_FILES['url_videos']['error'][0] === UPLOAD_ERR_OK) {
        $upload_directory = './videos/';
        foreach ($_FILES['url_videos']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['url_videos']['name'][$key]);
            $upload_file = $upload_directory . $file_name;
            if (move_uploaded_file($tmp_name, $upload_file)) {
                $urls_videos[] = $upload_file;
            } else {
                echo "Error al subir el video: $file_name.";
            }
        }
    }

    // Convertir URLs a cadenas separadas por comas
    $urls_imagenes_str = implode(',', $urls_imagenes);
    $urls_videos_str = implode(',', $urls_videos);

    // Insertar el artículo en la base de datos
    $sql = "INSERT INTO admin_blog (titulo, resumen, contenido, url_imagen, url_videos) VALUES (:titulo, :resumen, :contenido, :url_imagen, :url_videos)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':url_imagen', $urls_imagenes_str);
    $stmt->bindParam(':url_videos', $urls_videos_str);

    if ($stmt->execute()) {
        echo "Artículo creado exitosamente.";
    } else {
        echo "Error al crear el artículo.";
    }
}

// Mostrar el contenido del artículo
$id_articulo = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_articulo > 0) {
    $sql = "SELECT * FROM admin_blog WHERE id = :id_articulo";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_articulo', $id_articulo);
    $stmt->execute();
    $articulo = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
<button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
<div class="button-container">
    <a href="./admin_edit.php" class="button">Editar</a>
    <a href="./admin_delete.php" class="button button-delete">Eliminar</a>
    <a href="./blog.php" class="button-blog">Blog</a>
</div>
<h1>Panel de Administración</h1>

<!-- Formulario para crear un nuevo artículo -->
<form action="admin_create.php" method="post" enctype="multipart/form-data">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="resumen">Resumen:</label>
    <textarea id="resumen" name="resumen" required></textarea><br>

    <label for="contenido">Contenido:</label>
    <textarea id="contenido" name="contenido" required></textarea><br>

    <label for="image">Imágenes:</label>
    <input type="file" id="image" name="url_imagenes[]" multiple><br>

    <label for="videos">Videos:</label>
    <input type="file" id="videos" name="url_videos[]" multiple><br>

    <button type="submit">Crear</button>
</form>

<!-- Mostrar el contenido del artículo si se ha cargado -->
<?php if (isset($articulo)): ?>
    <h2><?php echo htmlspecialchars($articulo['titulo']); ?></h2>
    <p><?php echo htmlspecialchars($articulo['resumen']); ?></p>
    <div><?php echo nl2br(htmlspecialchars($articulo['contenido'])); ?></div>

    <div>
        <?php
        // Mostrar imágenes
        $imagenes = explode(',', $articulo['url_imagen']);
        foreach ($imagenes as $imagen) {
            if (!empty($imagen)) {
                echo '<img src="' . htmlspecialchars($imagen) . '" alt="Imagen" style="max-width: 100%; height: auto; margin: 10px 0;">';
            }
        }

        // Mostrar videos
        $videos = explode(',', $articulo['url_videos']);
        foreach ($videos as $video) {
            if (!empty($video)) {
                echo '<video controls style="max-width: 100%; height: auto; margin: 10px 0;">';
                echo '<source src="' . htmlspecialchars($video) . '" type="video/mp4">';
                echo 'Tu navegador no soporta la etiqueta de video.';
                echo '</video>';
            }
        }
        ?>
    </div>
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
