<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamiento de Citas</title>
    <link rel="stylesheet" href="css/citas.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>

<body>
    <header>
    <div class="navbar navbar-expand-lg navbar-color fixed-top">
            <a href="index.php" class="navbar-brand">
                <img src="./images/New_Logo_EyC2024-removebg-preview.png" alt="Logo" class="logo">
            </a>
        <h2>Agendamiento de Citas</h2>
    </header>

    <div class="contenedor">
        <div class="centrado">
            <select id="departamento">
                <option value="">Seleccione un departamento</option>
                <!-- Opciones de departamentos se llenarán aquí mediante la solicitud AJAX a la BD -->
            </select>
        </div>

        <div class="centrado">
            <select id="municipio">
            <option value="">Seleccione un municipio</option>
                <!-- Opciones de municipios se llenarán aquí mediante la solicitud AJAX a la BD -->
            </select>
        </div>
    </div>


    <h3>Disponibilidad</h3>
    <div id="calendario">
        <!-- Días del calendario se llenarán aquí mediante la solicitud ajax a mi bd -->
    </div>

    <!-- ventamna modal para franjas horarias -->
    <div id="modal-franjas" class="modal">
        <div class="modal-content">
            <span class="close" data-target="modal-franjas">&times;</span>
            <h2>Selecciona la hora de la Cita ⌚</h2>
            <div id="franjas-horarias">
                <!-- Franjas horarias se llenarán aquí mediante la solicitud ajax a mi bd-->
            </div>
        </div>
    </div>

    <div id="modal-confirmacion" class="modal">
        <div class="modal-content">
            <span class="close" data-target="modal-confirmacion">&times;</span>
            <h3>Reserva tu cita</h3>
            <form id="form-cita">
                <div class="form-row">
                    <div class="form-group">
                        <label for="tipo-documento">Tipo de Documento:</label>
                        <select id="tipo-documento" name="tipo-documento" required>
                            <option value=""></option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero-documento">Número de Documento:</label>
                        <input type="text" id="numero-documento" name="numero-documento" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="numero-contrato">Número de Contrato:</label>
                        <input type="text" id="numero-contrato" name="numero-contrato" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres y Apellidos:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="movil">Número de móvil:</label>
                        <input type="tel" id="movil" name="movil" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="politica" name="politica" required> Acepto la Política de Tratamiento de Datos
                        </label>
                    </div>
                </div>

                <!-- estos campos los requiero para enviarlos en la solicitud, para el insert -->
                <input type="hidden" id="franja-seleccionada" name="franja">
                <input type="hidden" id="dia-seleccionado" name="dia">
                <input type="hidden" id="mes-seleccionado" name="mes">
                <input type="hidden" id="municipio-seleccionado" name="municipio">

                <div class="content-btn-cita">
                    <button id="btn-cita" type="submit">Confirmar Cita</button>

                </div>
            </form>
        </div>
    </div>
    <footer>
        <p> 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/citas.js"></script>

</body>

</html>