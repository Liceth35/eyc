<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css"> <!-- Enlace a tu hoja de estilos CSS -->
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php
        session_start();
        if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == "si") {
            echo "<p class='error-message'>Correo o contraseña incorrectos. Inténtalo de nuevo.</p>";
            unset($_SESSION['error_login']);
        }
        ?>
        <form action="./controlador/login_blog.php" method="POST">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>
            <label for="contrasenna">Contraseña:</label>
            <input type="password" id="contrasenna" name="contrasenna" required>
            <button type="submit" name="btn_login">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
