<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['cedula'])) {
    header("Location: ../login_certificados.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Certificado</title>
    <link rel="stylesheet" href="../css/cargar_certificado.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>

    <div class="contenedor_padre">
        <!-- Botón para abrir el modal de fechas -->
        <button type="button" class="btn btn-success" onclick="mostrarModalFechas()">Descargar Certificados en Excel</button>

        <h2>Cargar Certificado</h2>
        <form action="procesar_carga.php" method="POST" enctype="multipart/form-data">
            <label for="numero_cedula">Número de Cédula:</label><br>
            <input type="text" id="numero_cedula" name="numero_cedula" required><br><br>

            <label for="correo">Ingresa tu correo</label><br>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="certificado">Certificado PDF:</label><br>
            <input type="file" id="certificado" name="certificado" accept=".pdf" required><br><br>

            <button type="submit">Subir Certificado</button>
        </form>
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
                    <form action="../controlador/certificados_excel.php" method="post">
                        <div class="form-group">
                            <label for="start_date">Fecha de Inicio:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Fecha de Fin:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Descargar Certificados en Excel</button>
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

    <script>
        function cerrarSesion() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.replace("../login_certificados.php");
                }
            };
            xhttp.open("GET", "../controlador/logaout.php", true);
            xhttp.send();
        }

        function mostrarModalFechas() {
            $('#fechaModal').modal('show');
        }
    </script>
</body>
</html>
