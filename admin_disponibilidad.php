<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Disponibilidad</title>
    <link rel="stylesheet" href="css/admin_disponibilidad.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/calendario.js"></script>
</head>
<body>
    <header>
        <h1>Administrar Disponibilidad de Citas</h1>
    </header>
    <div class="menu-botton">
        <a href="./cargarDisponibilidad.php">Cargar disponibilidad</a>
        <a href="./admin_gestion.php">Panel Administración</a>
    </div>
    <div class="container">
        <div class="calendar-container">
            <div class="calendar-header">Calendario de disponibilidad</div>
            <div id="calendar">
                <div class="calendar-weekdays">
                    <div class="calendar-weekday">Dom</div>
                    <div class="calendar-weekday">Lun</div>
                    <div class="calendar-weekday">Mar</div>
                    <div class="calendar-weekday">Mié</div>
                    <div class="calendar-weekday">Jue</div>
                    <div class="calendar-weekday">Vie</div>
                    <div class="calendar-weekday">Sáb</div>
                </div>
                <div class="calendar-days">
                    <!-- Contenido dinámico cargado desde JavaScript -->
                </div>
            </div>
        </div>
        <div class="time-selection">
            <div class="time-header">Horarios Disponibles</div>
            <div class="time-slots">
                <table>
                    <thead>
                        <tr>
                            <th>Municipio</th>
                            <th>Fecha</th>
                            <th>Horario</th>
                            <th>Disponible</th>
                        </tr>
                    </thead>
                    <tbody id="time-table">
                        <!-- Contenido dinámico cargado desde JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            cargarDisponibilidadInicial();
        });

        function cargarDisponibilidadInicial() {
            fetch('controlador/cargarDisponibilidad.php')
                .then(response => response.json())
                .then(data => {
                    mostrarDisponibilidad(data);
                });
        }

        function mostrarDisponibilidad(data) {
            const tableBody = document.getElementById('time-table');
            tableBody.innerHTML = '';

            data.forEach(disponibilidad => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${disponibilidad.municipio}</td>
                    <td>${disponibilidad.fecha}</td>
                    <td>${disponibilidad.horario}</td>
                    <td><input type="checkbox" ${disponibilidad.disponible ? 'checked' : ''}></td>
                `;
                tableBody.appendChild(row);
            });
        }
    </script>
</body>
</html>
