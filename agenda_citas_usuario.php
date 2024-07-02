<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="./css/citas.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' />
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contáctenos</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="agendar-cita">
            <h1>Agendamiento de Citas</h1>
            <div class="steps">
                <div class="step active" data-step="1">1. Seleccione oficina</div>
                <div class="step" data-step="2">2. Seleccione día y hora</div>
                <div class="step" data-step="3">3. Diligencie datos</div>
            </div>
            <form id="appointment-form">
                <!-- Step 1 -->
                <div class="step-content active" data-step="1">
                    <h2>Seleccionar Oficina</h2>
                    <div class="form-container">
                        <form id="form-seleccion">
                            <div class="form-group">
                                <label for="departamento">Seleccionar departamento:</label>
                                <select id="departamento" name="departamento" onchange="cargarMunicipios(this.value)" required>
                                    <option value="">Selecciona un departamento</option>
                                    <!-- Lista de departamentos de Colombia -->
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
                            </div>
                            <div class="form-group">
                                <label for="municipio">Seleccionar municipio:</label>
                                <select id="municipio" name="municipio" onchange="cargarDisponibilidad(this.value)" required>
                                    <option value="">Selecciona un municipio</option>
                                    <!-- Opciones de municipios se cargarán aquí -->
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
                            </div>
                        </form>
                    </div>
                    <button type="button" class="next-btn" data-next-step="2">Siguiente</button>
                </div>

                <!-- Step 2 -->
                <div class="step-content" data-step="2">
                    <h2>Seleccionar Día y Hora</h2>
                    <div id="calendar"></div>
                    <button type="button" class="prev-btn" data-prev-step="1">Anterior</button>
                    <button type="button" class="next-btn" data-next-step="3">Siguiente</button>
                </div>

                <!-- Step 3 -->
                <div class="step-content" data-step="3">
                    <h2>Diligenciar Datos</h2>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>

                    <button type="button" class="prev-btn" data-prev-step="2">Anterior</button>
                    <button type="submit">Agendar Cita</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Gas Company</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
    <script src="./js/citas.js"></script>
</body>
</html>
