<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Disponibilidad</title>
    <link rel="stylesheet" href="css/admin_disponibilidad.css">
</head>
<body>
    <header>
        <h1>Administrar Disponibilidad de Citas</h1>
    </header>
    <div class="container">
        <div class="calendar-container">
            <div class="calendar-header">Calendario de disponibilidad</div>
            <div id="calendar">
                <div class="calendar-day available">Lunes</div>
                <div class="calendar-day available">Martes</div>
                <div class="calendar-day unavailable">Miércoles</div>
                <div class="calendar-day available">Jueves</div>
                <div class="calendar-day available">Viernes</div>
                <div class="calendar-day available">Sábado</div>
                <div class="calendar-day unavailable">Domingo</div>
            </div>
        </div>
        <div class="time-selection">
            <div class="time-header">Horarios Disponibles</div>
            <div class="time-slots">
                <table>
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Mañana</th>
                            <th>Tarde</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lunes</td>
                            <td>Disponible</td>
                            <td>Disponible</td>
                        </tr>
                        <tr>
                            <td>Martes</td>
                            <td>Disponible</td>
                            <td>No Disponible</td>
                        </tr>
                        <!-- Agrega más filas según sea necesario -->
                    </tbody>
                </table>
            </div>
        </div>
        <button class="continue-button">Guardar Cambios</button>
    </div>
</body>
</html>
