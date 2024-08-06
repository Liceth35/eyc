<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamiento de Citas</title>
    <link rel="stylesheet" href="css/citas.css">
    <link rel="stylesheet" href="css/calendario.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
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
                <select id="departamento" name="departamento" onchange="cargarMunicipios()">
                    <option value="">Seleccionar departamento</option>
                    <!-- Lista de departamentos -->
                    <option value="Amazonas">Amazonas</option>
                    <option value="Antioquia">Antioquia</option>
                    <option value="Arauca">Arauca</option>
                    <option value="Atlántico">Atlántico</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Boyacá">Boyacá</option>
                    <option value="Caldas">Caldas</option>
                    <option value="Caquetá">Caquetá</option>
                    <option value="Casanare">Casanare</option>
                    <option value="Cauca">Cauca</option>
                    <option value="Cesar">Cesar</option>
                    <option value="Chocó">Chocó</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Cundinamarca">Cundinamarca</option>
                    <option value="Guainía">Guainía</option>
                    <option value="Guaviare">Guaviare</option>
                    <option value="Huila">Huila</option>
                    <option value="La Guajira">La Guajira</option>
                    <option value="Magdalena">Magdalena</option>
                    <option value="Meta">Meta</option>
                    <option value="Nariño">Nariño</option>
                    <option value="Norte de Santander">Norte de Santander</option>
                    <option value="Putumayo">Putumayo</option>
                    <option value="Quindío">Quindío</option>
                    <option value="Risaralda">Risaralda</option>
                    <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                    <option value="Santander">Santander</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Tolima">Tolima</option>
                    <option value="Valle del Cauca">Valle del Cauca</option>
                    <option value="Vaupés">Vaupés</option>
                    <option value="Vichada">Vichada</option>
                </select>
                <label for="municipio">Municipio:</label>
                <select id="municipio" name="municipio">
                    <option value="">Seleccionar municipio</option>
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
                <label for="numero-contrato">Número de Contrato:</label>
                <input type="text" id="numero-contrato" name="numero-contrato">
                <label for="nombre">Nombres y Apellidos:</label>
                <input type="text" id="nombre" name="nombre">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo">
                <label for="movil">Número de móvil:</label>
                <input type="tel" id="movil" name="movil">
                <label for="direccion">Dirección:</label>
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
        const municipiosPorDepartamento = {
            "Amazonas": ["Leticia"],
            "Antioquia": ["Medellín", "Bello", "Itagüí", "Envigado", "Rionegro"],
            "Arauca": ["Arauca"],
            "Atlántico": ["Barranquilla", "Soledad"],
            "Bolívar": ["Cartagena", "Magangué"],
            "Boyacá": ["Tunja", "Sogamoso", "Duitama"],
            "Caldas": ["Manizales", "Villamaría"],
            "Caquetá": ["Florencia"],
            "Casanare": ["Yopal"],
            "Cauca": ["Popayán", "Santander de Quilichao"],
            "Cesar": ["Valledupar"],
            "Chocó": ["Quibdó"],
            "Córdoba": ["Montería", "Lorica"],
            "Cundinamarca": ["Bogotá", "Soacha", "Chía"],
            "Guainía": ["Inírida"],
            "Guaviare": ["San José del Guaviare"],
            "Huila": ["Neiva", "Garzón"],
            "La Guajira": ["Riohacha", "Maicao"],
            "Magdalena": ["Santa Marta", "Ciénaga"],
            "Meta": ["Villavicencio"],
            "Nariño": ["Pasto", "Tumaco"],
            "Norte de Santander": ["Cúcuta", "Ocaña"],
            "Putumayo": ["Mocoa"],
            "Quindío": ["Armenia"],
            "Risaralda": ["Pereira", "Dosquebradas"],
            "San Andrés y Providencia": ["San Andrés"],
            "Santander": ["Bucaramanga", "Floridablanca", "Girón"],
            "Sucre": ["Sincelejo"],
            "Tolima": ["Ibagué"],
            "Valle del Cauca": ["Cali", "Palmira", "Buenaventura"],
            "Vaupés": ["Mitú"],
            "Vichada": ["Puerto Carreño"]

        };

        function cargarMunicipios() {
            const departamento = document.getElementById("departamento").value;
            const municipiosSelect = document.getElementById("municipio");

            // Limpiar los municipios anteriores
            municipiosSelect.innerHTML = '<option value="">Seleccionar municipio</option>';

            if (municipiosPorDepartamento[departamento]) {
                municipiosPorDepartamento[departamento].forEach(municipio => {
                    const option = document.createElement("option");
                    option.value = municipio;
                    option.textContent = municipio;
                    municipiosSelect.appendChild(option);
                });
            }
        }

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
