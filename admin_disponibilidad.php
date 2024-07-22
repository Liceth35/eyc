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
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
</head>
<body>
    <header>
        <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
        <h1>Administrar Disponibilidad de Citas</h1>
    </header>
    <div class="menu-botton">
        <a href="./cargarDisponibilidad.php">Cargar disponibilidad</a>
        <a href="./admin_gestion.php">Panel Administración</a>
        <form action="controlador/excel_citas.php" method="post">
            <button type="submit" class="btn btn-success">Descargar Disponibilidad en Excel</button>
        </form>
    </div>
    <div class="container">
        <div class="time-selection">
            <div class="time-header">Horarios Disponibles</div>
            <div id="calendar"></div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Verifica que FullCalendar está cargado
            console.log('DOM fully loaded and parsed');
            console.log('FullCalendar:', typeof FullCalendar);

            if (typeof FullCalendar === 'undefined') {
                console.error('FullCalendar is not defined');
                return;
            }

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch('controlador/cargarDisponibilidad.php')
                        .then(response => response.json())
                        .then(data => {
                            let events = data.map(disponibilidad => ({
                                title: disponibilidad.municipio,
                                start: disponibilidad.fecha + 'T' + disponibilidad.horario.split(' - ')[0],
                                end: disponibilidad.fecha + 'T' + disponibilidad.horario.split(' - ')[1]
                            }));
                            successCallback(events);
                        })
                        .catch(error => {
                            console.error('Error al cargar eventos:', error);
                            failureCallback(error);
                        });
                }
            });
            calendar.render();
        });

        function cerrarSesion() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        console.log("Sesión cerrada");
                        window.location.replace("index.php");
                    } else {
                        console.log("Error al cerrar sesión");
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
