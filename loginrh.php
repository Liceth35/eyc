<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login_rh.css">
</head>
<body>
    <div class="login-container">
        <form id="loginForm">
            <h2>Login</h2>
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div id="error-message"></div>
    </div>
    <script src="login.js"></script>
</body>
</html>
