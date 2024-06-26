<?php
include './controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

// Consultamos los artículos
$sql = "SELECT id, title, content, image FROM posts";
$posts = $db->getData($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Inspección de Gas</title>
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Blog de Inspección de Gas</h1>
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Artículos</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="blog-posts">
            <?php if ($posts): ?>
                <?php foreach ($posts as $post): ?>
                    <article>
                        <img src="images/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                        <h2><?php echo $post['title']; ?></h2>
                        <p><?php echo substr($post['content'], 0, 150); ?>...</p>
                        <a href="post.php?id=<?php echo $post['id']; ?>">Leer más</a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay artículos disponibles.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Inspección de Gas S.A.S. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
