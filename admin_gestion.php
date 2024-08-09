<?php
session_start();
if (!isset($_SESSION['cedula_usuarios'])) {
    header("Location: login_citas.php");
    exit();
}

// Array para mapear los números de mes a sus nombres
$meses = [
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre'
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Citas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    <link rel="stylesheet" href="./css/admin_gestion.css">
    <!-- iconops de boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="m-5">
        <div class="align-items-center mb-4 header">
            <h2 class="text-center mb-4">Administración de Citas Agendadas</h2>
            <button type="button" class="btn btn-warning" onclick="cerrarSesion()">Cerrar Sesión</button>
        </div>

        <div class="mb-4 text-center">
            <a href="./cargarDisponibilidad.php" class="btn btn-primary me-2">Cargar Disponibilidad</a>
            <a href="./admin_disponibilidad.php" class="btn btn-secondary">Gestión de Disponibilidad</a>
        </div>

        <div class="table-responsive">
            <table id="citas-table" class="table table-striped table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tipo Doc.</th>
                        <th>N° Documento</th>
                        <th>N° Contrato</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Horario</th>
                        <th>Dia</th>
                        <th>Mes</th>
                        <th>Municipio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once './controlador/conexion.php';

                    $pdo = new PDODB();
                    $pdo->conectar();

                    // Consulta para obtener las citas
                    $query = "SELECT citas.*, municipios.nombre AS nombre_municipio
                                FROM citas
                                JOIN municipios ON citas.municipio_id = municipios.id";
                    $citas = $pdo->consulta($query);

                    // Verifica si hay citas
                    if ($citas) {
                        foreach ($citas as $cita) {
                            // Obtener el nombre del mes
                            $nombre_mes = $meses[$cita['mes']] ?? 'Mes desconocido';
                            // es mejor esta estructura para incrustar php con html, ya que evitamos el echo una y otra vez
                    ?>
                            <tr>
                                <td><?= $cita['id'] ?></td>
                                <td><?= $cita['tipo_documento'] ?></td>
                                <td><?= $cita['numero_documento'] ?></td>
                                <td><?= $cita['numero_contrato'] ?></td>
                                <td><?= $cita['nombre'] ?></td>
                                <td><?= $cita['email'] ?></td>
                                <td><?= $cita['telefono'] ?></td>
                                <td><?= $cita['direccion'] ?></td>
                                <td><?= $cita['franja'] ?></td>
                                <td><?= $cita['dia'] ?></td>
                                <td><?= $nombre_mes ?></td>
                                <td><?= $cita['nombre_municipio'] ?></td>
                                <td class='d-flex'>
                                    <a href="reagendar_cita.php?id=<?= $cita['id'] ?>&tipo_documento=<?= urlencode($cita['tipo_documento']) ?>&numero_documento=<?= urlencode($cita['numero_documento']) ?>&numero_contrato=<?= urlencode($cita['numero_contrato']) ?>&nombre=<?= urlencode($cita['nombre']) ?>&correo=<?= urlencode($cita['email']) ?>&celular=<?= urlencode($cita['telefono']) ?>&direccion=<?= urlencode($cita['direccion']) ?>&franja=<?= urlencode($cita['franja']) ?>&dia=<?= urlencode($cita['dia']) ?>&mes=<?= urlencode($cita['mes']) ?>&municipio=<?= urlencode($cita['nombre_municipio']) ?>" class='btn btn-warning btn-sm me-2'>
                                        <i class='bi bi-arrow-clockwise'></i>
                                    </a>
                                    <a href='javascript:void(0);' class='btn btn-danger btn-sm' onclick="cancelarCita(<?= $cita['id'] ?>)">
                                        <i class='bi bi-x'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan='13' class='text-center'>No hay citas agendadas.</td>
                        </tr>
                    <?php
                    }

                    $pdo->close();
                    ?>
                </tbody>


            </table>
        </div>
        <footer>
            <p> 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
        </footer>cancelarCita
        <!-- traduccion del datatables a españoñs -->
        <script src="js/admin_gestion.js"></script>
</body>

</html>