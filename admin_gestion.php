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
    <style>
        #calendar-container {
            display: none;
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, 0);
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        #close-calendar {
            float: right;
            cursor: pointer;
            color: red;
        }
    </style>
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

                    fetch(`./controlador/obtenerHoraDisponible.php?fecha=${nueva_fecha}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.disponible) {
                                var nueva_hora_inicio = data.hora_inicio;
                                var nueva_hora_fin = data.hora_fin;

                                if (confirm(`¿Está seguro de que desea reagendar la cita para el ${nueva_fecha} de ${nueva_hora_inicio} a ${nueva_hora_fin}?`)) {
                                    fetch('./controlador/reagendarCita.php', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json' },
                                        body: JSON.stringify({ id: id, fecha: nueva_fecha, hora_inicio: nueva_hora_inicio, hora_fin: nueva_hora_fin })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === 'success') {
                                            alert('Cita reagendada exitosamente.');
                                            location.reload();
                                        } else {
                                            alert(data.message || 'Error al reagendar la cita.');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('Hubo un error al procesar la solicitud.');
                                    });
                                }
                            } else {
                                alert('No hay horas disponibles para la fecha seleccionada. Por favor elija otra.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Hubo un error al verificar la disponibilidad.');
                        });

                    $('#calendar').fullCalendar('unselect');
                    $('#calendar-container').hide();
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
        <h1>Panel de Administración</h1>
    </div>
    <h2><center>Administración de Citas Agendadas</center></h2>

    <div class="menu">
        <a href="admin_disponibilidad.php">Cargar disponibilidad</a>
        <a href="./cargarDisponibilidad.php">Gestión de Disponibilidad</a>
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
                    <!-- Contenido dinámico generado por PHP -->
                    <?php
                    // Incluir el archivo de conexión a la base de datos
                    include_once './controlador/conexion.php';

                    // Instanciar la conexión
                    $pdo = new PDODB();
                    $pdo->conectar();

                    // Consulta para obtener las citas
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

                    // Cerrar la conexión
                    $pdo->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="calendar-container">
        <span id="close-calendar">[Cerrar]</span>
        <div id="calendar"></div>
    </div>
    <script src="./js/cargarDisponibilidad.js"></script>
</body>
</html>
