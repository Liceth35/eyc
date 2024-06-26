<?php
include './controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $resumen = $_POST['resumen'];
    $contenido = $_POST['contenido'];
    $url_imagen = $_POST['url_imagen'];

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
    <title>Crear Artículo</title>
</head>
<body>
    <h1>Crear Artículo</h1>
    <form action="admin_create.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="resumen">Resumen:</label>
        <textarea id="resumen" name="resumen" required></textarea><br>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required></textarea><br>

        <label for="url_imagen">URL de la Imagen:</label>
        <input type="text" id="url_imagen" name="url_imagen" required><br>

        <button type="submit">Crear</button>
    </form>
</body>
</html>
