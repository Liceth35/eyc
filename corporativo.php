<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Corporativa</title>
    <link rel="stylesheet" href="./css/corporativa.css">
</head>
<body>

<header class="navbar">
    <a href="index.php" class="logo">
        <img src="./images/Logo.png" alt="Logo">
    </a>
    <nav>
        <ul>
            <li><a href="https://epm-vwapp01/PerdiGas" target="_blank">PerdiGas</a></li>
            <li><a href="https://dynamics.microsoft.com/es-es/" target="_blank">Dynamics 365</a></li>
            <li><a href="https://epm-vwapp05.corp.epm.com.co/" target="_blank">Gaspar</a></li>
            <li><a href="https://eic.godoworks.com/es/base/Login/index" target="_blank">Go do works</a></li>
            <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
                <script>
                    function cerrarSesion() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                window.location.href = "./index.php";
                            }
                        };
                        xhttp.open("GET", "./controlador/logaout.php", true);
                        xhttp.send();
                    }
                </script>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Interfaz Corporativa</h1>
    <div class="link-container">
        <div class="link-box">
            <img src="./images/perdigas.jpeg" alt="PerdiGas Logo">
            <a href="https://epm-vwapp01/PerdiGas" target="_blank">PerdiGas</a>
        </div>
        <div class="link-box">
            <img src="./images/Dynamics Logo_365.jpg" alt="Dynamics 365 Logo">
            <a href="https://dynamics.microsoft.com/es-es/" target="_blank">Dynamics 365</a>
        </div>
        <div class="link-box">
            <img src="./images/gaspar.jpeg" alt="EPM Gaspar Logo">
            <a href="https://epm-vwapp05.corp.epm.com.co/" target="_blank">Gaspar</a>
        </div>
        <div class="link-box">
            <img src="./images/godoworks.png" alt="Go do works Logo">
            <a href="https://eic.godoworks.com/es/base/Login/index" target="_blank">Go do works</a>
        </div>
        <div class="link-box">
            <img src="./images/tuercas.png" alt="Blog">
            <a href="./login_blog.php" target="_blank">Blog</a>
        </div>
        <div class="link-box">
            <img src="./images/PQRS.png" alt="PQRS">
            <a href="./login_pqrs.php" target="_blank">PQRS</a>
        </div>
        <div class="link-box">
            <img src="./images/hoja-de-vida.webp" alt="Hojas de vida">
            <a href="./loginrh.php" target="_blank">Recursos humanos</a>
        </div>
        <div class="link-box">
            <img src="./images/certificados-ssl-de-un-año.png" alt="Certificados">
            <a href="./login_certificados.php" target="_blank">Cargar certificados</a>
        </div>
        <div class="link-box">
            <img src="./images/images.png" alt="Citas">
            <a href="./login_citas.php" target="_blank">Citas</a>
        </div>
    </div>
</div>
<footer>
        <p> 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
</footer>
</body>
</html>
