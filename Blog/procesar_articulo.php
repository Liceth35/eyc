<?php
require_once './controlador/blog_controller.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];
    $url_imagen = $_POST['url_imagen'];

    $blogController = new BlogController();
    if ($blogController->agregarArticulo($titulo, $resumen, $contenido, $url_imagen)) {
        echo "Artículo agregado exitosamente.";
    } else {
        echo "Error al agregar el artículo.";
    }
}
?>
