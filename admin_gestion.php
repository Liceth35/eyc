<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Citas</title>
    <link rel="stylesheet" href="./css/admin_gestion.css">
</head>
<body>
    <div class="container">
        <h1>Administración de Citas</h1>
        <form id="form-publicar-disponibilidad">
            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <select id="departamento-admin" name="departamento" onchange="cargarMunicipiosAdmin(this.value)">
                    <option value="">Selecciona un departamento</option>
                    <!-- Lista de departamentos cargados dinámicamente -->
                </select>
            </div>
            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <select id="municipio-admin" name="municipio">
                    <option value="">Selecciona un municipio</option>
                    <!-- Opciones de municipios se cargarán aquí -->
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="horario">Horario:</label>
                <select id="horario-admin" name="horario">
                    <option value="7:00-9:00">7:00am a 9:00am</option>
                    <option value="9:00-12:00">9:00am a 12:00pm</option>
                    <option value="13:00-15:00">1:00pm a 3:00pm</option>
                    <option value="15:00-17:00">3:00pm a 5:00pm</option>
                </select>
            </div>
            <div class="form-group">
                <label for="disponible">Disponible:</label>
                <select id="disponible" name="disponible">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="button" onclick="publicarDisponibilidad()">Publicar Disponibilidad</button>
        </form>
        <h2>Reagendar Cita</h2>
        <form id="form-reagendar-cita">
            <div class="form-group">
                <label for="cita-id">ID de la Cita:</label>
                <input type="text" id="cita-id" name="cita_id">
            </div>
            <div class="form-group">
                <label for="nueva-fecha">Nueva Fecha:</label>
                <input type="date" id="nueva-fecha" name="nueva_fecha">
            </div>
            <div class="form-group">
                <label for="nueva-hora">Nuevo Horario:</label>
                <select id="nueva-hora" name="nueva_hora">
                    <option value="7:00-9:00">7:00am a 9:00am</option>
                    <option value="9:00-12:00">9:00am a 12:00pm</option>
                    <option value="13:00-15:00">1:00pm a 3:00pm</option>
                    <option value="15:00-17:00">3:00pm a 5:00pm</option>
                </select>
            </div>
            <button type="button" onclick="reagendarCita()">Reagendar Cita</button>
        </form>
    </div>
    <script src="./js/admin_gestion.js"></script>
</body>
</html>
