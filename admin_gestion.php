<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Citas</title>
    <link rel="stylesheet" href="./css/admin_gestion.css">
    <script>
        // Función para cancelar una cita
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
    const nueva_fecha = prompt("Ingrese la nueva fecha (AÑO-MM-DD):");
    const nueva_hora_inicio = prompt("Ingrese la nueva hora de inicio (HH):");
    const nueva_hora_fin = prompt("Ingrese la nueva hora de fin (HH):");

    if (nueva_fecha && nueva_hora_inicio && nueva_hora_fin) {
        // Consultar disponibilidad antes de reagendar
        fetch(`./controlador/verificarDisponibilidad.php?fecha=${nueva_fecha}&hora_inicio=${nueva_hora_inicio}&hora_fin=${nueva_hora_fin}`)
            .then(response => response.json())
            .then(data => {
                if (data.disponible === true) {
                    // Si la disponibilidad es confirmada, proceder con el reagendamiento
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
                } else {
                    alert('La fecha y hora seleccionadas no están disponibles. Por favor elija otra.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al verificar la disponibilidad.');
            });
    }
}

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
                        echo "<tr><td colspan='14'>No hay citas disponibles</td></tr>";
                    }

                    $pdo->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
