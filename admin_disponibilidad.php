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
        <a href="./admin_gestion.php">Gestión de Disponibilidad</a>
    </div>
    <div class="container">
        <div class="calendar-container">
            <div class="calendar-header">Calendario de disponibilidad</div>
            <div id="calendar"></div>
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
        <button class="continue-button" onclick="guardarCambios()">Guardar Cambios</button>
    </div>

    <div class="container">
        <div class="form-header">Agregar Disponibilidad</div>
        <form id="disponibilidad-form">
            <label for="municipio">Municipio:</label>
            <input type="text" id="municipio" name="municipio" required><br>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br>

            <label for="rango_horario">Rango Horario:</label>
            <select id="rango_horario" name="rango_horario" required>
                <option value="7-9">7:00AM - 9:00AM</option>
                <option value="9-12">9:00AM - 12:00PM</option>
                <option value="13-15">1:00PM - 3:00PM</option>
                <option value="15-17">3:00PM - 5:00PM</option>
            </select><br>

            <button type="button" onclick="agregarDisponibilidad()">Agregar Disponibilidad</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            cargarDisponibilidadInicial();
        });

        function cargarDisponibilidadInicial() {
            fetch('controlador/cargarDisponibilidad.php')
                .then(response => response.json())
                .then(data => {
                    // Limpiar tabla antes de actualizar
                    const tableBody = document.getElementById('time-table');
                    tableBody.innerHTML = '';

                    // Iterar sobre los datos recibidos y construir filas de la tabla
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.municipio}</td>
                            <td>${item.fecha}</td>
                            <td>${item.horario}</td>
                            <td>${item.disponible}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error al cargar disponibilidad:', error));
        }

        function agregarDisponibilidad() {
            const municipio = document.getElementById('municipio').value;
            const fecha = document.getElementById('fecha').value;
            const rango_horario = document.getElementById('rango_horario').value;

            fetch('controlador/guardarDisponibilidad.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ municipio, fecha, rango_horario })
            }).then(response => response.json())
              .then(data => {
                alert('Disponibilidad agregada.');
                cargarDisponibilidadInicial(); // Actualizar la disponibilidad en la interfaz
            }).catch(error => {
                console.error('Error al agregar disponibilidad:', error);
            });
        }

        function guardarCambios() {
            // Esta función puede ser implementada según necesidades adicionales
            alert('Guardar cambios no está implementado completamente en este ejemplo.');
        }
    </script>
</body>
</html>
