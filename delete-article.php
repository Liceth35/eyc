<?php
require_once '../controlador/eliminar_controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $eliminarController = new EliminarController();
    $eliminarController->eliminarArticulo($id);

    header('Location: admin_blog.php');
}
?>
