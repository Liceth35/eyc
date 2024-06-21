<?php
require_once './controlador/blog_controller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];
    $url_imagen = $_POST['url_imagen'];

    $blogController = new BlogController();
    if ($blogController->actualizarArticulo($id, $titulo, $resumen, $contenido, $url_imagen)) {
        echo "Artículo actualizado exitosamente.";
    } else {
        echo "Error al actualizar el artículo.";
    }
}
?>
