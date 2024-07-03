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

    <div class="container">
        <div class="menu">
            <a href="admin_gestion.php">Gestión Principal</a>
            <a href="admin_disponibilidad.php">Gestión de Disponibilidad</a>
            <a href="admin_citas.php">Gestión de Citas</a>
        </div>

        <div class="content">
            <!-- Contenido dinámico de acuerdo a la opción seleccionada -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de cita</th>
                            <th>Hora de cita</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Filas de datos de citas -->
                        <tr>
                            <td>Maria Perez</td>
                            <td>2024-07-15</td>
                            <td>10:00 am</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#">Reagendar</a>
                                    <a href="#">Cancelar</a>
                                </div>
                            </td>
                        </tr>
                        <!-- Más filas según la información de la base de datos -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
