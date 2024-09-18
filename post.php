<?php
include './controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

// Verificar si se recibió el ID del artículo
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el artículo específico por su ID
    $sql = "SELECT * FROM admin_blog WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el artículo
    if ($article) {
        // Mostrar el contenido del artículo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['titulo']); ?> - Blog de Inspección de Gas</title>
    <link rel="stylesheet" href="./css/post.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <header>
        <a href="./blog.php" class="logo">
            <img src="./images/New_Logo_EyC2024__verde__Slogan-removebg-preview.png" alt="Logo">
        </a>
        <div class="header-container">
            <nav>
                <ul>
                    <li><a href="./blog.php">Artículos</a></li>
                    <li><a href="./contactos.php">Contacto</a></li>
                    <li><a href="./trabaja-con-nosotros.php">Team</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <article class="post">
            <h2><?php echo htmlspecialchars($article['titulo']); ?></h2>
            <!-- Mostrar imagen o video, no ambos -->
            <?php if (!empty($article['url_imagen'])): ?>
                <?php $imagenes = explode(',', $article['url_imagen']); ?>
                <?php foreach ($imagenes as $imagen): ?>
                    <?php if (!empty($imagen)): ?>
                        <img src="<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($article['titulo']); ?>">
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif (!empty($article['url_videos'])): ?>
                <?php $videos = explode(',', $article['url_videos']); ?>
                <?php foreach ($videos as $video): ?>
                    <?php if (!empty($video)): ?>
                        <video controls style="max-width: 100%; height: auto; margin: 10px 0;">
                            <source src="<?php echo htmlspecialchars($video); ?>" type="video/mp4">
                            Tu navegador no soporta la etiqueta de video.
                        </video>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <p><?php echo htmlspecialchars($article['contenido']); ?></p>
        </article>
    </main>
    <footer>
        <p>&copy; 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
<?php
    } else {
        // Si no se encontró el artículo, mostrar un mensaje de error
        echo "<p>Artículo no encontrado.</p>";
    }
} else {
    // Si no se proporcionó el ID del artículo, mostrar un mensaje de error
    echo "<p>ID de artículo no especificado.</p>";
}
?>
