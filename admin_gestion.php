<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Citas</title>
    <link rel="stylesheet" href="css/admin_gestion.css">
</head>
<body>
    <div class="header">
        <h1>Panel de Administración</h1>
    </div>
    <h2><center>Administración de Citas Agendadas</center></h2>

    <div class="menu">
        <a href="admin_disponibilidad.php">Gestión de Disponibilidad</a>
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
                        <th>Móvil</th>
                        <th>Acepto Política</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="citas-table">
                    <!-- Contenido dinámico generado por PHP -->
                    <?php
                    // Incluir el archivo de conexión a la base de datos y gestionCitas.php
                    include_once './controlador/conexion.php';
                    include_once './controlador/gestionCitas.php';

                    // Cargar las citas desde la base de datos
                    $citas = cargarCitas();
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
                            echo "<td>" . ($cita['acepto_politica'] ? 'Sí' : 'No') . "</td>";
                            echo "<td>";
                            echo "<a href='./controlador/reagendarCita.php' onclick='reagendar(" . $cita['id'] . ")'>Reagendar</a> | ";
                            echo "<a href='./controlador/cancelarCita.php' onclick='cancelar(" . $cita['id'] . ")'>Cancelar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14'>No hay citas disponibles</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
