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
    <title>Administración de Citas</title>
    <link rel="stylesheet" href="./css/admin_gestion.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="./js/cargarDisponibilidad.js"></script>
    <script>
        function cancelar(id) {
            if (confirm('¿Está seguro de que desea cancelar esta cita?')) {
                fetch(`./controlador/cancelarCita.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Cita cancelada exitosamente.');
                            location.reload();
                        } else {
                            alert('Error al cancelar la cita.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al procesar la solicitud.');
                    });
            }
        }

        function reagendar(id) {
            $('#calendar-container').show();
            $('#calendar').fullCalendar('destroy'); // Destruir cualquier instancia anterior
            $('#calendar').fullCalendar({
                events: './controlador/cargarDisponibilidad.php', // URL de tu controlador que devuelve eventos en formato JSON
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    var nueva_fecha = moment(start).format('YYYY-MM-DD');

                    $.ajax({
                        url: './controlador/obtenerHoraDisponible.php',
                        type: 'GET',
                        data: { fecha: nueva_fecha },
                        dataType: 'json',
                        success: function(data) {
                            if (data.disponible) {
                                // Limpiar el contenido del dropdown
                                $('#hora_inicio').empty();
                                $('#hora_fin').empty();

                                // Crear las opciones del dropdown
                                data.horas.forEach(hora => {
                                    $('#hora_inicio').append(`<option value="${hora}">${hora}</option>`);
                                    $('#hora_fin').append(`<option value="${hora}">${hora}</option>`);
                                });

                                // Mostrar el formulario para seleccionar hora
                                $('#reagendar-form').show();

                                // Manejar el envío del formulario
                                $('#submit-reagendar').off('click').on('click', function() {
                                    var nueva_hora_inicio = $('#hora_inicio').val();
                                    var nueva_hora_fin = $('#hora_fin').val();
                                    var direccion = $('#direccion').val();
                                    var numero_contrato = $('#numero_contrato').val();

                                    if (nueva_hora_inicio && nueva_hora_fin && direccion && numero_contrato) {
                                        if (confirm(`¿Está seguro de que desea reagendar la cita para el ${nueva_fecha} de ${nueva_hora_inicio} a ${nueva_hora_fin}?`)) {
                                            $.ajax({
                                                url: './controlador/reagendarCita.php',
                                                type: 'POST',
                                                contentType: 'application/x-www-form-urlencoded',
                                                data: {
                                                    id: id,
                                                    fecha: nueva_fecha,
                                                    hora_inicio: nueva_hora_inicio,
                                                    hora_fin: nueva_hora_fin,
                                                    direccion: direccion,
                                                    numero_contrato: numero_contrato
                                                },
                                                dataType: 'json',
                                                success: function(data) {
                                                    if (data.status === 'success') {
                                                        alert('Cita reagendada exitosamente.');
                                                        location.reload();
                                                    } else {
                                                        alert(data.message || 'Error al reagendar la cita.');
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error('Error:', error);
                                                    alert('Hubo un error al procesar la solicitud.');
                                                }
                                            });
                                        }
                                    } else {
                                        alert('Hora de inicio, hora de fin, dirección y número de contrato son necesarios.');
                                    }
                                });
                            } else {
                                alert('No hay horas disponibles para la fecha seleccionada. Por favor elija otra.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Hubo un error al verificar la disponibilidad.');
                        }
                    });

                    $('#calendar').fullCalendar('unselect');
                }
            });
        }

        $(document).ready(function() {
            $('#calendar-container').hide(); // Esconder el calendario al cargar la página
            $('#close-calendar').click(function() {
                $('#calendar-container').hide();
            });
        });
    </script>
</head>
<body>
    <div class="header">
        <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
        <h1>Panel de Administración</h1>
    </div>
    <h2><center>Administración de Citas Agendadas</center></h2>

    <div class="menu">
        <a href="./cargarDisponibilidad.php">Cargar disponibilidad</a>
        <a href="./admin_disponibilidad.php">Gestión de Disponibilidad</a>
    </div>

    <div class="content">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Número de Documento</th>
                        <th>Tipo de Documento</th>
                        <th>Número de contrato</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="citas-table">
                    <?php
                    include_once './controlador/conexion.php';

                    $pdo = new PDODB();
                    $pdo->conectar();

                    $query = "SELECT * FROM citas";
                    $citas = $pdo->consulta($query);

                    if ($citas) {
                        foreach ($citas as $cita) {
                            echo "<tr>";
                            echo "<td>" . $cita['id'] . "</td>";
                            echo "<td>" . $cita['departamento'] . "</td>";
                            echo "<td>" . $cita['municipio'] . "</td>";
                            echo "<td>" . $cita['direccion'] . "</td>";
                            echo "<td>" . $cita['fecha'] . "</td>";
                            echo "<td>" . $cita['horario'] . "</td>";
                            echo "<td>" . $cita['numero_documento'] . "</td>";
                            echo "<td>" . $cita['tipo_documento'] . "</td>";
                            echo "<td>" . $cita['numero_contrato'] . "</td>";
                            echo "<td>" . $cita['nombre'] . "</td>";
                            echo "<td>" . $cita['correo'] . "</td>";
                            echo "<td>" . $cita['movil'] . "</td>";
                            echo "<td>";
                            echo "<a href='javascript:void(0);' onclick='reagendar(" . $cita['id'] . ")'>Reagendar</a> | ";
                            echo "<a href='javascript:void(0);' onclick='cancelar(" . $cita['id'] . ")'>Cancelar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>No hay citas agendadas.</td></tr>";
                    }

                    $pdo->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="reagendar-form" style="display: none;">
        <h3>Selecciona el horario para reagendar</h3>
        <label for="hora_inicio">Hora de inicio:</label>
        <select id="hora_inicio"></select>
        <label for="hora_fin">Hora de fin:</label>
        <select id="hora_fin"></select>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" />
        <label for="numero_contrato">Número de contrato:</label>
        <input type="text" id="numero_contrato" />
        <button id="submit-reagendar">Reagendar</button>
    </div>

    <div id="calendar-container">
        <span id="close-calendar">X</span>
        <div id="calendar"></div>
    </div>
</body>
</html>
