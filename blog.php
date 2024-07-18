<?php
include './controlador/conexion.php';

// Conectamos a la base de datos
$db = new PDODB();
$db->conectar();

// Consultamos los artículos
$sql = "SELECT id, titulo, resumen, contenido, url_imagen, fecha_creacion, fecha_actualizacion FROM admin_blog";
$posts = $db->getData($sql);
?>

<!DOCTYPE html>
<html lang="es">Cargar Certificado
Número de Cédula:



Código de Verificación:

wboaQ5qsSy


Certificado PDF:

Sin archivos seleccionados


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Inspección de Gas</title>
    <link rel="stylesheet" href="./css/blog.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>

<header class="navbar">
    <a href="index.php" class="logo">
        <img src="./images/New_Logo_EyC2024__verde__Slogan-removebg-preview.png" alt="Logo">
    </a>
    <nav>
        <ul>
            <li><a href="./index.php" target="_blank">Inicio</a></li>
            <li><a href="./contactos.php" target="_blank">Contactos</a></li>
            <li><a href="./trabaja-con-nosotros.php" target="_blank">Team</a></li>
                </ul>
            </nav>
    </header>
    <main>
        <section class="blog-posts">
            <?php if ($posts): ?>
                <?php foreach ($posts as $post): ?>
                    <article>
                        <img src="<?php echo htmlspecialchars($post['url_imagen']); ?>" alt="<?php echo htmlspecialchars($post['titulo']); ?>">
                        <h2><?php echo htmlspecialchars($post['titulo']); ?></h2>
                        <p><?php echo htmlspecialchars(substr($post['resumen'], 0, 150)); ?>...</p>
                        <a href="post.php?id=<?php echo $post['id']; ?>">Leer más</a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay artículos disponibles.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p> 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
