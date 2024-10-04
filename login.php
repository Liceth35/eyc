<?php
session_start();
if (isset($_SESSION['correo_usuarios'])) {
    session_unset();
    session_destroy();
    session_start(); // Reiniciar la sesión después de destruirla
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>

<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php
        if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == "si") {
            echo "<p class='error-message'>Correo o contraseña incorrectos. Inténtalo de nuevo.</p>";
            unset($_SESSION['error_login']);
        }
        ?>
        <form id="loginForm" action="./controlador/controlador_login.php" method="POST">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>
            <label for="contrasenna">Contraseña:</label>
            <input type="password" id="contrasenna" name="contrasenna" required>
            <button type="submit" name="btn_login">Iniciar Sesión</button>
        </form>

    </div>
    <script>
        document.getElementById('loginForm').addEventListener('click', function(event) {
            let valid = true;
            const inputs = this.querySelectorAll('input[required]');

            inputs.forEach(input => {
                if (!input.value) {
                    input.classList.add('error'); // Agrega clase de error
                    valid = false;
                } else {
                    input.classList.remove('error'); // Remueve clase de error
                }
            });

            if (!valid) {
                event.preventDefault(); // Evita el envío del formulario
            }
        });
    </script>
</body>

</html>