<!-- admin_citas.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Citas Agendadas</title>
    <link rel="stylesheet" href="./css/admin_citas.css">
</head>
<body>
    <h1>Administración de Citas Agendadas</h1>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Obtener y mostrar las citas agendadas
            include_once './controlador/conexion.php';
            $db = new PDODB();
            $db->conectar();

            $sql = "SELECT * FROM citas_agendadas";
            $citas = $db->getData($sql);

            foreach ($citas as $cita) {
                echo "<tr>";
                echo "<td>" . $cita['fecha'] . "</td>";
                echo "<td>" . $cita['hora'] . "</td>";
                echo "<td>" . $cita['nombre_cliente'] . "</td>";
                echo "<td>" . $cita['contacto'] . "</td>";
                echo "<td>" . $cita['estado'] . "</td>";
                echo "<td><a href='reagendar.php?id=" . $cita['id'] . "'>Reagendar</a> | 
                          <a href='cancelar.php?id=" . $cita['id'] . "'>Cancelar</a></td>";
                echo "</tr>";
            }

            // Cerrar conexión
            $db->close();
            ?>
        </tbody>
    </table>
</body>
</html>
