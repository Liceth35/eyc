<?php
session_start();
if (!isset($_SESSION['cedula_usuarios'])) {
    header("Location: login_pqrs.php");
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
    <title>Contactos</title>
    <link rel="stylesheet" href="./css/contactos_pqrs.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
    <div class="container">
        <form action="controlador/exportar_excel.php" method="post">
            <button type="submit" class="btn btn-success">Descargar PQRS en Excel</button>
        </form>
        <h1>Lista de Contactos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody id="contactTableBody">
                <!-- Aquí se insertarán los datos -->
            </tbody>
        </table>
    </div>
    <script src="./js/contactos_pqrs.js"></script>
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
