<?php
session_start();
if (!isset($_SESSION['correo_usuario'])) {
    header("Location: login.php");
    exit();
}

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Corporativa</title>
    <link rel="stylesheet" href="./css/corporativa.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
<header class="navbar">
    <a href="index.php" class="logo">
        <img src="./images/New_Logo_EyC2024__verde__Slogan-removebg-preview.png" alt="Logo">
    </a>
    <nav>
        <ul>
            <li>
                <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
            </li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Interfaz Corporativa</h1>
    <div class="link-container">
        <div class="link-box">
            <a href="https://epm-vwapp01/PerdiGas" target="_blank">
                <img src="./images/perdigas.jpeg" alt="PerdiGas Logo">
                <span>PerdiGas</span>
            </a>
        </div>
        <div class="link-box">
            <a href="https://dynamics.microsoft.com/es-es/" target="_blank">
                <img src="./images/Dynamics Logo_365.jpg" alt="Dynamics 365 Logo">
                <span>Dynamics 365</span>
            </a>
        </div>
        <div class="link-box">
            <a href="https://epm-vwapp05.corp.epm.com.co/" target="_blank">
                <img src="./images/EPM.png" alt="EPM Gaspar Logo">
                <span>Gaspar</span>
            </a>
        </div>
        <div class="link-box">
            <a href="https://eic.godoworks.com/es/base/Login/index" target="_blank">
                <img src="./images/godoworks.png" alt="Go do works Logo">
                <span>Go do works</span>
            </a>
        </div>
        <div class="link-box">
            <a href="./login_blog.php" target="_blank">
                <img src="./images/tuercas.png" alt="Blog">
                <span>Blog</span>
            </a>
        </div>
        <div class="link-box">
            <a href="./login_pqrs.php" target="_blank">
                <img src="./images/PQRS.png" alt="PQRS">
                <span>PQRS</span>
            </a>
        </div>
        <div class="link-box">
            <a href="./loginrh.php" target="_blank">
                <img src="./images/hoja-de-vida.webp" alt="Hojas de vida">
                <span>Recursos humanos</span>
            </a>
        </div>
        <div class="link-box">
            <a href="./login_certificados.php" target="_blank">
                <img src="./images/certificados-ssl-de-un-año.png" alt="Certificados">
                <span>Cargar certificados</span>
            </a>
        </div>
        <div class="link-box">
            <a href="./login_citas.php" target="_blank">
                <img src="./images/images.png" alt="Citas">
                <span>Citas</span>
            </a>
        </div>
    </div>
</div>

<footer>
    <p>2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
</footer>

<script>
    function cerrarSesion() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    console.log("Sesión cerrada"); // Para depurar
                    window.location.replace("index.php");
                } else {
                    console.log("Error al cerrar sesión"); // Para depurar
                }
            }
        };
        xhttp.open("GET", "./controlador/logaout.php", true);
        xhttp.send();
    }

    window.onload = function() {
        if (window.history.length > 1) {
            window.history.forward();
        }
    }
</script>
</body>
</html>
