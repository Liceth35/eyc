<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login_rh.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php
        session_start();
        if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == "si") {
            echo "<p class='error-message'>Cédula o contraseña incorrectos. Inténtalo de nuevo.</p>";
            unset($_SESSION['error_login']);
        }
        ?>
        <form action="./controlador/login_citas.php" method="POST">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
            <label for="contrasenna">Contraseña:</label>
            <input type="password" id="contrasenna" name="contrasenna" required>
            <button type="submit" name="btn_login">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
