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
    <title>Cargar Disponibilidad</title>
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    <!-- css de boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- iconos de boostrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/cargar_disponibilidad.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <header>
        <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
        <h1>Cargar Disponibilidad de Citas</h1>
    </header>
    <div class="menu">
        <a href="./admin_gestion.php">Citas Agendadas <i class="bi bi-calendar-event"></i></a>
    </div>
    <div class="container">
        <div class="form-header">Agregar Disponibilidad <i class="bi bi-cloud-arrow-up"></i>
        <!-- Botón para descargar la plantilla -->
    <a href="files/plantilla disponibilidad EYC.xlsx" download class="mb-2 btn btn-primary btn-xs me-auto">
        Descargar plantilla<i class="bi bi-filetype-xlsx"></i>
    </a></div>
        <span class="mb-2 ms-auto me-auto">Estimado usuario, descargue la plantilla y diligencie los campos.</span>

        <form id="cargarDisponibilidadform" method="post" enctype="multipart/form-data">
            <input type="file" name="plantilla" id="plantilla" required>
            <div class="d-flex justify-content-center ">
                <button class="btn btn-success" id="subirArchivo" type="button">Enviar</button>
            </div>
        </form>


    </div>

    <script src="js/cargarDisponibilidad.js"></script>
    <!-- js de boostrap5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>