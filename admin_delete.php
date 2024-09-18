<?php
include './controlador/conexion.php';
session_start();
if (!isset($_SESSION['correo_usuarios_blog'])) {
    header("Location: login_blog.php");
    exit();
}
date_default_timezone_set('America/Bogota'); // Ajusta según tu zona horaria
// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

// Eliminar un artículo si se recibe el ID a través de una solicitud GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM admin_blog WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                title: '¡Eliminado!',
                text: 'El artículo ha sido eliminado.',
                icon: 'success'
            }).then(() => {
                window.location.href = 'admin_delete.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'No se pudo eliminar el artículo.',
                icon: 'error'
            }).then(() => {
                window.location.href = 'admin_delete.php';
            });
        </script>";
    }
}

// Eliminar todos los artículos
if (isset($_GET['eliminar_todos'])) {
    $sql = "DELETE FROM admin_blog";
    $stmt = $db->prepare($sql);

    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                title: '¡Eliminado!',
                text: 'Todos los artículos han sido eliminados.',
                icon: 'success'
            }).then(() => {
                window.location.href = 'admin_delete.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'No se pudieron eliminar los artículos.',
                icon: 'error'
            }).then(() => {
                window.location.href = 'admin_delete.php';
            });
        </script>";
    }
}

// Consultar todos los artículos
$sql = "SELECT id, titulo, resumen, contenido, url_imagen, url_videos, fecha_creacion, fecha_actualizacion FROM admin_blog";
$posts = $db->getData($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Artículo</title>
    <link rel="stylesheet" href="./css/admin_delete.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
<div class="button-container">
    <a href="./admin_edit.php" class="button">Editar</a>
    <a href="./admin_create.php" class="button button-delete">Agregar</a>
    <a href="./blog.php" class="button-blog">Blog</a>
</div>

<h1>Eliminar Artículo</h1>

<h2>Lista de Artículos</h2>
<form id="deleteArticleForm" action="admin_delete.php" method="post">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Contenido</th>
                <th>URL Imagen</th>
                <th>URL Video</th>
                <th>Fecha Creación</th>
                <th>Fecha Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($posts): ?>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($post['id']); ?></td>
                        <td><?php echo htmlspecialchars($post['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($post['resumen']); ?></td>
                        <td><?php echo htmlspecialchars($post['contenido']); ?></td>
                        <td><?php echo htmlspecialchars($post['url_imagen']); ?></td>
                        <td><?php echo htmlspecialchars($post['url_videos']); ?></td>
                        <td><?php echo htmlspecialchars($post['fecha_creacion']); ?></td>
                        <td><?php echo htmlspecialchars($post['fecha_actualizacion']); ?></td>
                        <td>
                            <button type="button" class="btn btn-danger delete-button" data-id="<?php echo $post['id']; ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No hay artículos disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</form>

<form action="admin_delete.php" method="post">
    <button type="button" id="deleteAllButton" class="btn btn-danger">Eliminar Todos los Artículos</button>
</form>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const postId = this.getAttribute('data-id');

            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, elimínalo!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `admin_delete.php?id=${postId}`;
                }
            });
        });
    });

    document.getElementById('deleteAllButton').addEventListener('click', function(event) {
        event.preventDefault();

        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡Esto eliminará todos los artículos!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, elimínalos!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'admin_delete.php?eliminar_todos=true';
            }
        });
    });
});

function cerrarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                console.log("Sesión cerrada");
                window.location.replace("index.php");
            } else {
                console.log("Error al cerrar sesión");
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
