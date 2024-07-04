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
        <div id="step1" class="step-content active">
            <h2>Seleccionar Oficina</h2>
            <form id="data-form" action="./controlador/guardar_cita.php" method="post">
                <label for="departamento">Departamento:</label>
                <select id="departamento" name="departamento">
                    <option value="">Seleccionar departamento</option>
                    <!-- Lista de departamentos -->
                                    <option value="1">Amazonas</option>
                                    <option value="2">Antioquia</option>
                                    <option value="3">Arauca</option>
                                    <option value="4">Atlántico</option>
                                    <option value="5">Bolívar</option>
                                    <option value="6">Boyacá</option>
                                    <option value="7">Caldas</option>
                                    <option value="8">Caquetá</option>
                                    <option value="9">Casanare</option>
                                    <option value="10">Cauca</option>
                                    <option value="11">Cesar</option>
                                    <option value="12">Chocó</option>
                                    <option value="13">Córdoba</option>
                                    <option value="14">Cundinamarca</option>
                                    <option value="15">Guainía</option>
                                    <option value="16">Guaviare</option>
                                    <option value="17">Huila</option>
                                    <option value="18">La Guajira</option>
                                    <option value="19">Magdalena</option>
                                    <option value="20">Meta</option>
                                    <option value="21">Nariño</option>
                                    <option value="22">Norte de Santander</option>
                                    <option value="23">Putumayo</option>
                                    <option value="24">Quindío</option>
                                    <option value="25">Risaralda</option>
                                    <option value="26">San Andrés y Providencia</option>
                                    <option value="27">Santander</option>
                                    <option value="28">Sucre</option>
                                    <option value="29">Tolima</option>
                                    <option value="30">Valle del Cauca</option>
                                    <option value="31">Vaupés</option>
                                    <option value="32">Vichada</option>
                </select>
                <label for="municipio">Municipio:</label>
                <select id="municipio" name="municipio">
                    <option value="">Seleccionar municipio</option>
                    <!-- Lista de municipios -->
                                    <!-- Amazonas -->
                                    <option value="leticia">Leticia</option>
                                    <!-- Antioquia -->
                                    <option value="medellin">Medellín</option>
                                    <option value="bello">Bello</option>
                                    <option value="itagui">Itagüí</option>
                                    <option value="envigado">Envigado</option>
                                    <option value="rionegro">Rionegro</option>
                                    <!-- Arauca -->
                                    <option value="arauca">Arauca</option>
                                    <!-- Atlántico -->
                                    <option value="barranquilla">Barranquilla</option>
                                    <option value="soledad">Soledad</option>
                                    <!-- Bolívar -->
                                    <option value="cartagena">Cartagena</option>
                                    <option value="magangue">Magangué</option>
                                    <!-- Boyacá -->
                                    <option value="tunja">Tunja</option>
                                    <option value="sogamoso">Sogamoso</option>
                                    <option value="duitama">Duitama</option>
                                    <!-- Caldas -->
                                    <option value="manizales">Manizales</option>
                                    <option value="villamaria">Villamaría</option>
                                    <!-- Caquetá -->
                                    <option value="florencia">Florencia</option>
                                    <!-- Casanare -->
                                    <option value="yopal">Yopal</option>
                                    <!-- Cauca -->
                                    <option value="popayan">Popayán</option>
                                    <option value="santander_de_quilichao">Santander de Quilichao</option>
                                    <!-- Cesar -->
                                    <option value="valledupar">Valledupar</option>
                                    <!-- Chocó -->
                                    <option value="quibdo">Quibdó</option>
                                    <!-- Córdoba -->
                                    <option value="monteria">Montería</option>
                                    <option value="lorica">Lorica</option>
                                    <!-- Cundinamarca -->
                                    <option value="bogota">Bogotá</option>
                                    <option value="soacha">Soacha</option>
                                    <option value="chia">Chía</option>
                                    <!-- Guainía -->
                                    <option value="inirida">Inírida</option>
                                    <!-- Guaviare -->
                                    <option value="san_jose_del_guaviare">San José del Guaviare</option>
                                    <!-- Huila -->
                                    <option value="neiva">Neiva</option>
                                    <option value="garzon">Garzón</option>
                                    <!-- La Guajira -->
                                    <option value="riohacha">Riohacha</option>
                                    <option value="maicao">Maicao</option>
                                    <!-- Magdalena -->
                                    <option value="santa_marta">Santa Marta</option>
                                    <option value="cienaga">Ciénaga</option>
                                    <!-- Meta -->
                                    <option value="villavicencio">Villavicencio</option>
                                    <!-- Nariño -->
                                    <option value="pasto">Pasto</option>
                                    <option value="tumaco">Tumaco</option>
                                    <!-- Norte de Santander -->
                                    <option value="cucuta">Cúcuta</option>
                                    <option value="ocana">Ocaña</option>
                                    <!-- Putumayo -->
                                    <option value="mocoa">Mocoa</option>
                                    <!-- Quindío -->
                                    <option value="armenia">Armenia</option>
                                    <!-- Risaralda -->
                                    <option value="pereira">Pereira</option>
                                    <option value="dosquebradas">Dosquebradas</option>
                                    <!-- San Andrés y Providencia -->
                                    <option value="san_andres">San Andrés</option>
                                    <!-- Santander -->
                                    <option value="bucaramanga">Bucaramanga</option>
                                    <option value="floridablanca">Floridablanca</option>
                                    <option value="giron">Girón</option>
                                    <option value="piedecuesta">Piedecuesta</option>
                                    <!-- Sucre -->
                                    <option value="sincelejo">Sincelejo</option>
                                    <!-- Tolima -->
                                    <option value="ibague">Ibagué</option>
                                    <!-- Valle del Cauca -->
                                    <option value="cali">Cali</option>
                                    <option value="palmira">Palmira</option>
                                    <option value="buenaventura">Buenaventura</option>
                                    <!-- Vaupés -->
                                    <option value="mitu">Mitú</option>
                                    <!-- Vichada -->
                                    <option value="puerto_carreno">Puerto Carreño</option>
                </select>
                <button type="button" onclick="nextStep(2)">Continuar</button>
            </form>
        </div>
        <div id="step2" class="step-content">
            <div class="calendar-container">
                <div class="calendar-header">Calendario de citas</div>
                <div id="calendar"></div>
            </div>
            <div class="time-selection">
                <div class="time-header">Seleccionar Horario de Atención</div>
                <div class="time-slots">
                    <label><input type="radio" name="time" value="7:00-9:00"> 7:00 am - 9:00 am</label>
                    <label><input type="radio" name="time" value="9:00-12:00"> 9:00 am - 12:00 pm</label>
                    <label><input type="radio" name="time" value="13:00-15:00"> 1:00 pm - 3:00 pm</label>
                    <label><input type="radio" name="time" value="15:00-17:00"> 3:00 pm - 5:00 pm</label>
                </div>
            </div>
            <button class="continue-button" onclick="nextStep(3)">Continuar</button>
        </div>
        <div id="step3" class="step-content">
            <h2>Diligenciar Datos</h2>
            <form id="data-form" action="./controlador/guardar_cita.php" method="post">
                <label for="tipo-documento">Tipo de Documento:</label>
                <select id="tipo-documento" name="tipo-documento">
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <!-- Otras opciones -->
                </select>
                <label for="numero-documento">Número de Documento:</label>
                <input type="text" id="numero-documento" name="numero-documento">
                <label for="nombre">Nombres y Apellidos:</label>
                <input type="text" id="nombre" name="nombre">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo">
                <label for="movil">Número de móvil:</label>
                <input type="tel" id="movil" name="movil">
                <label>
                    <input type="checkbox" id="politica" name="politica" required>
                    Acepto la Política de Tratamiento de Datos
                </label>
                <button type="submit">Finalizar</button>
            </form>
        </div>
    </div>
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
