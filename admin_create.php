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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];

    // Manejo de la imagen subida
    $url_imagen = ''; // Variable para almacenar la URL de la imagen después de subirse

    // Verificar si se subió una imagen válida
    if (isset($_FILES['url_imagen']) && $_FILES['url_imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardará la imagen en el servidor
        $upload_directory = './images/';

        // Nombre del archivo en el servidor
        $file_name = basename($_FILES['url_imagen']['name']);
        $upload_file = $upload_directory . $file_name;

        // Mover el archivo desde la ubicación temporal al directorio deseado
        if (move_uploaded_file($_FILES['url_imagen']['tmp_name'], $upload_file)) {
            $url_imagen = $upload_file; // Asignar la URL de la imagen al campo de la base de datos
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado ninguna imagen o hubo un error al subirla.";
    }

    // Insertar el artículo en la base de datos
    $sql = "INSERT INTO admin_blog (titulo, resumen, contenido, url_imagen) VALUES (:titulo, :resumen, :contenido, :url_imagen)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':resumen', $resumen);
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':url_imagen', $url_imagen);

    if ($stmt->execute()) {
        echo "Artículo creado exitosamente.";
    } else {
        echo "Error al crear el artículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
<button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
<div class="button-container">
    <a href="./admin_edit.php" class="button">Editar</a>
    <a href="./admin_delete.php" class="button button-delete">Eliminar</a>
    <a href="./blog.php" class="button-blog">Blog</a>
</div>
    <h1>Panel de Administración</h1>
    <form action="admin_create.php" method="post" enctype="multipart/form-data"> <!-- Añadir enctype para manejar archivos -->
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="resumen">Resumen:</label>
        <textarea id="resumen" name="resumen" required></textarea><br>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required></textarea><br>

        <label for="image">Imagen:</label>
        <input type="file" id="image" name="url_imagen" required> <!-- Cambiar name a "url_imagen" -->

        <button type="submit">Crear</button>
    </form>
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
