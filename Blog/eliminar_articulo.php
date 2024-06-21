<?php
require_once 'controlador/blog_controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $blogController = new BlogController();
    if ($blogController->eliminarArticulo($id)) {
        echo "Artículo eliminado exitosamente.";
    } else {
        echo "Error al eliminar el artículo.";
    }
}
?>
