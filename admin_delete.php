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

// Eliminar un artículo si se recibe el ID a través de una solicitud POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM admin_blog WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Artículo eliminado exitosamente.";
    } else {
        echo "Error al eliminar el artículo.";
    }
}

// Eliminar todos los artículos
if (isset($_POST['eliminar_todos'])) {
    $sql = "DELETE FROM admin_blog";
    $stmt = $db->prepare($sql);

    if ($stmt->execute()) {
        echo "Todos los artículos fueron eliminados.";
    } else {
        echo "Error al eliminar los artículos.";
    }
}

// Consultar todos los artículos
$sql = "SELECT id, titulo, resumen, contenido, url_imagen, fecha_creacion, fecha_actualizacion FROM admin_blog";
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
<form action="admin_delete.php" method="post">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Contenido</th>
                <th>URL Imagen</th>
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
                        <td><?php echo htmlspecialchars($post['fecha_creacion']); ?></td>
                        <td><?php echo htmlspecialchars($post['fecha_actualizacion']); ?></td>
                        <td>
                            <button type="submit" name="id" value="<?php echo $post['id']; ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay artículos disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</form>

<form action="admin_delete.php" method="post">
    <button type="submit" name="eliminar_todos">Eliminar Todos los Artículos</button>
</form>

<script>
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
