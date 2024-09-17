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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
    <div class="container">
        <button type="button" class="btn btn-success" onclick="mostrarModalFechas()">Descargar PQRS en Excel</button>
        <h1>Lista de Contactos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="contactTableBody">
                <!-- Aquí se insertarán los datos -->
            </tbody>
        </table>
    </div>

    <!-- Modal para seleccionar el rango de fechas antes de descargar Excel -->
    <div class="modal fade" id="fechaModal" tabindex="-1" role="dialog" aria-labelledby="fechaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fechaModalLabel">Seleccionar Rango de Fechas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="controlador/exportar_excel.php" method="post">
    <div class="form-group">
        <label for="start_date">Fecha de Inicio:</label>
        <input type="date" id="start_date" name="start_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="end_date">Fecha de Fin:</label>
        <input type="date" id="end_date" name="end_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Descargar PQRS en Excel</button>
</form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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

        function mostrarModalFechas() {
            $('#fechaModal').modal('show');
        }

        window.onload = function() {
            if (window.history.length > 1) {
                window.history.forward();
            }
        }
    </script>
</body>
</html>
