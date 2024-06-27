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
    <link rel="stylesheet" href="./css/post.css"> <!-- Incluye tu CSS para la página de post -->
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Blog de Inspección de Gas</h1>
            <nav>
                <ul>
                    <li><a href="./index.php">Inicio</a></li>
                    <li><a href="./blog.php">Artículos</a></li>
                    <li><a href="./">Contacto</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <article class="post">
            <h2><?php echo htmlspecialchars($article['titulo']); ?></h2>
            <img src="<?php echo htmlspecialchars($article['url_imagen']); ?>" alt="<?php echo htmlspecialchars($article['titulo']); ?>">
            <p><?php echo htmlspecialchars($article['contenido']); ?></p>
        </article>
    </main>
    <footer>
        <p>&copy; 2024 Inspección de Gas S.A.S. Todos los derechos reservados.</p>
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
