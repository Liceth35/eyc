<?php
include './controlador/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);

    $sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$image')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "El archivo ". basename($image). " ha sido subido.";
        } else {
            echo "Error al subir el archivo.";
        }
        echo "Nuevo artículo creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Blog de Inspección de Gas</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Panel de Administración</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Contenido:</label>
        <textarea id="content" name="content" rows="10" required></textarea>

        <label for="image">Imagen:</label>
        <input type="file" id="image" name="image" required>

        <button type="submit">Crear Artículo</button>
    </form>
</body>
</html>