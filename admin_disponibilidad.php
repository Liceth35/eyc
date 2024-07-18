<?php
session_start();
if (!isset($_SESSION['cedula_usuarios'])) {
    header("Location: login_citas.php");
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
    <title>Administrar Disponibilidad</title>
    <link rel="stylesheet" href="css/admin_disponibilidad.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
        <h1>Administrar Disponibilidad de Citas</h1>
    </header>
    <div class="menu-botton">
        <a href="./cargarDisponibilidad.php">Cargar disponibilidad</a>
        <a href="./admin_gestion.php">Panel Administración</a>
        <form action="controlador/ExportController.php" method="post">
            <button type="submit" class="btn btn-success">Descargar Disponibilidad en Excel</button>
        </form>
    </div>
    <div class="container">
        <div class="time-selection">
            <div class="time-header">Horarios Disponibles</div>
            <div class="time-slots">
                <table>
                    <thead>
                        <tr>
                            <th>Municipio</th>
                            <th>Fecha</th>
                            <th>Horario</th>
                        </tr>
                    </thead>
                    <tbody id="time-table">
                        <!-- Contenido dinámico cargado desde JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            cargarDisponibilidadInicial();
        });

        function cargarDisponibilidadInicial() {
            fetch('controlador/cargarDisponibilidad.php')
                .then(response => response.json())
                .then(data => {
                    mostrarDisponibilidad(data);
                });
        }

        function mostrarDisponibilidad(data) {
            const tableBody = document.getElementById('time-table');
            tableBody.innerHTML = '';

            data.forEach(disponibilidad => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${disponibilidad.municipio}</td>
                    <td>${disponibilidad.fecha}</td>
                    <td>${disponibilidad.horario}</td>
                `;
                tableBody.appendChild(row);
            });
        }

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

        function descargarExcel() {
            window.location.href = './controlador/excel_citas.php';
        }

        window.onload = function() {
            if (window.history.length > 1) {
                window.history.forward();
            }
        }
    </script>
</body>
</html>
