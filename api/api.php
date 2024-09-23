<?php 
include_once 'conexion.php';

$pdo = new PDODB();
$pdo->conectar();

// Consulta para obtener las citas
$query = "SELECT * from Bonos_cali";
$admin = $pdo->consulta($query);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&C | Ingeniería S.A.S</title>
    <link rel="stylesheet" href="../css/corporativa.css">
    <link rel="stylesheet" href="./plugins/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
</head>

<body>
    <header class="navbar">
        <a href="index.php" class="logo">
            <img src="../images/New_Logo_EyC2024__verde__Slogan-removebg-preview.png" alt="Logo">
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
        <table class="table" id="calificarEmpleados">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                    <th>Preguntaid</th>
                    <th>Respuesta texto</th>
                    <th>Respuesta escala</th>
                    <th>Opcion pregunta</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($query)) { ?>
                    <?php foreach ($admin as $row) { ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['icono'] ?></td>
                            <td><?php echo $row['nombre_principal'] ?></td>

                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="14" class="text-center">No se encontraron registros.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

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
    <footer>
        <p>2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
    </footer>

    
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
        //iniciar datatables//
        let table = new DataTable('#calificarEmpleados');
    </script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script></script>
</body>

</html>