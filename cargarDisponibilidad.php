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
        <a href="admin_disponibilidad.php">Cargar disponibilidad</a>
        <a href="./admin_gestion.php">Panel Administración</a>
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

        function guardarCambios() {
            const disponibilidad = [];
            document.querySelectorAll('#time-table tr').forEach(row => {
                const municipio = row.cells[0].textContent;
                const fecha = row.cells[1].textContent;
                const horario = row.cells[2].textContent;
                const disponible = row.cells[3].querySelector('input').checked;
                disponibilidad.push({ municipio, fecha, horario, disponible });
            });

            fetch('controlador/guardarDisponibilidad.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(disponibilidad)
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    alert('Cambios guardados correctamente.');
                } else {
                    alert('Error al guardar los cambios.');
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Error al guardar los cambios.');
            });
        }
    </script>
</body>
</html>
