<?php
require_once '../controlador/eliminar_articulo.php'; // Cambia la ruta para incluir el controlador de eliminar artículo

$id = $_GET['id'];
$eliminarArticuloController = new EliminarArticuloController();
$eliminarArticuloController->eliminarArticulo($id);

header("Location: admin_blog.php");
exit;
?>
