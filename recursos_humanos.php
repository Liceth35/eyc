<?php
require_once './controlador/conexion.php';
session_start();

if (!isset($_SESSION['cedula_usuarios'])) {
    header("Location: loginrh.php");
    exit();
}

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

$db = new PDODB();
$db->conectar();

// Consultar la base de datos
$sql = "SELECT * FROM hoja_de_vida";
$result = $db->getData($sql);

$db->close(); // Cerrar la conexión después de obtener los datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&C | Ingeniería S.A.S</title>
    <link rel="stylesheet" href="./css/recursos_humanos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <button type="button" class="btn btn-warning cerrar btn-cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
    <div class="contenedor_padre">
        <button type="button" class="btn btn-success" onclick="mostrarModalFechas()">Descargar Hoja de Vida en Excel</button>

        <h1>Subir Archivos</h1>
        <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
            <!-- Campos del formulario -->
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>
                    <th>Profesión</th>
                    <th>Tipo de Moto</th>
                    <th>Modelo de Moto</th>
                    <th>Estado de Propiedad</th>
                    <th>Mensaje</th>
                    <th>Archivo Adjunto</th>
                    <th>Acciones</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)) { ?>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['correo']); ?></td>
                            <td><?php echo htmlspecialchars($row['celular']); ?></td>
                            <td><?php echo htmlspecialchars($row['tipo_documento']); ?></td>
                            <td><?php echo htmlspecialchars($row['numero_documento']); ?></td>
                            <td><?php echo htmlspecialchars($row['departamento']); ?></td>
                            <td><?php echo htmlspecialchars($row['ciudad']); ?></td>
                            <td><?php echo htmlspecialchars($row['profesion']); ?></td>
                            <td><?php echo htmlspecialchars($row['tipo_moto']); ?></td>
                            <td><?php echo htmlspecialchars($row['modelo_moto']); ?></td>
                            <td><?php echo htmlspecialchars($row['estado_propiedad']); ?></td>
                            <td><?php echo htmlspecialchars($row['mensaje']); ?></td>
                            <td><a href='controlador/<?php echo htmlspecialchars($row['archivo_adjunto']); ?>'>Ver Archivo</a></td>
                            <td>
                                <button class="btn btn-primary" onclick="openModal('<?php echo htmlspecialchars($row['archivo_adjunto']); ?>')">Ver Archivo Modal</button>
                            </td>
                            <td><?php echo htmlspecialchars($row['created_ate']); ?></td> <!-- Fecha de creación -->
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="15" class="text-center">No se encontraron registros.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para mostrar el archivo adjunto -->
    <div class="modal fade" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="archivoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="archivoModalLabel">Archivo Adjunto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="archivoIframe" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
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
                    <form action="controlador/ExportController.php" method="post">
                        <div class="form-group">
                            <label for="start_date">Fecha de Inicio:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Fecha de Fin:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Descargar Hoja de Vida en Excel</button>
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
        function openModal(url) {
            $('#archivoIframe').attr('src', 'controlador/' + url);
            $('#archivoModal').modal('show');
        }

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

        function mostrarModalFechas() {
            $('#fechaModal').modal('show');
        }
    </script>
</body>
</html>
