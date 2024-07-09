<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamiento de Citas</title>
    <link rel="stylesheet" href="css/citas.css">
    <link rel="stylesheet" href="css/calendario.css">
</head>
<body>
    <header>
        <h1>Agendamiento de Citas</h1>
    </header>
    <div class="container">
        <div class="stepper">
            <div class="step step1 active" onclick="nextStep(1)">1</div>
            <div class="step step2" onclick="nextStep(2)">2</div>
            <div class="step step3" onclick="nextStep(3)">3</div>
        </div>
        <form id="data-form" action="./controlador/guardar_cita.php" method="post">
            <div id="step1" class="step-content active">
                <h2>Seleccionar Oficina</h2>
                <label for="departamento">Departamento:</label>
                <select id="departamento" name="departamento">
                    <option value="">Seleccionar departamento</option>
                    <!-- Lista de departamentos -->
                    <option value="Amazonas">Amazonas</option>
                    <option value="Antioquia">Antioquia</option>
                    <option value="Arauca">Arauca</option>
                </select>
                <label for="municipio">Municipio:</label>
                <select id="municipio" name="municipio">
                    <option value="">Seleccionar municipio</option>
                    <!-- Lista de municipios -->
                    <option value="leticia">Leticia</option>
                    <option value="medellin">Medellín</option>
                    <option value="bello">Bello</option>
                    <option value="itagui">Itagüí</option>
                    <option value="envigado">Envigado</option>
                    <option value="rionegro">Rionegro</option>
                    <option value="arauca">Arauca</option>
                </select>
                <button type="button" onclick="nextStep(2)">Continuar</button>
            </div>
            <div id="step2" class="step-content">
                <div class="calendar-container">
                    <div class="calendar-header">Calendario de citas</div>
                    <div id="calendar"></div>
                </div>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha">
                <div class="time-selection">
                    <div class="time-header">Seleccionar Horario de Atención</div>
                    <div class="time-slots">
                        <label><input type="radio" name="horario" value="7:00-9:00"> 7:00 am - 9:00 am</label>
                        <label><input type="radio" name="horario" value="9:00-12:00"> 9:00 am - 12:00 pm</label>
                        <label><input type="radio" name="horario" value="13:00-15:00"> 1:00 pm - 3:00 pm</label>
                        <label><input type="radio" name="horario" value="15:00-17:00"> 3:00 pm - 5:00 pm</label>
                    </div>
                </div>
                <button type="button" onclick="nextStep(3)">Continuar</button>
            </div>
            <div id="step3" class="step-content">
                <h2>Diligenciar Datos</h2>
                <label for="tipo-documento">Tipo de Documento:</label>
                <select id="tipo-documento" name="tipo-documento">
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                </select>
                <label for="numero-documento">Número de Documento:</label>
                <input type="text" id="numero-documento" name="numero-documento">
                <label for="numero-contrato">Número de Contrato:</label> <!-- Nueva etiqueta -->
                <input type="text" id="numero-contrato" name="numero-contrato">
                <label for="nombre">Nombres y Apellidos:</label>
                <input type="text" id="nombre" name="nombre">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo">
                <label for="movil">Número de móvil:</label>
                <input type="tel" id="movil" name="movil">
                <label for="direccion">Dirección:</label> <!-- Nueva etiqueta -->
                <input type="text" id="direccion" name="direccion">
                <label>
                    <input type="checkbox" id="politica" name="politica" required> Acepto la Política de Tratamiento de Datos
                </label>
                <button type="submit">Finalizar</button>
            </div>
        </form>
    </div>
     <footer>
        <p> 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/calendario.js" defer></script>
    <script>
        function nextStep(step) {
            document.querySelectorAll('.step-content').forEach(function(content) {
                content.classList.remove('active');
            });
            document.querySelector(`#step${step}`).classList.add('active');
            document.querySelectorAll('.step').forEach(function(stepElement, index) {
                if (index + 1 < step) {
                    stepElement.classList.add('completed');
                } else {
                    stepElement.classList.remove('completed');
                }
                if (index + 1 === step) {
                    stepElement.classList.add('active');
                } else {
                    stepElement.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>
