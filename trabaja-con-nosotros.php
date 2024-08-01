<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&C | Ingeniería S.A.S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/trabajanosotros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
  <!-- Navbar -->
  <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-color">
            <div class="container">
                <!-- LOGO -->
                <a class="" href="index.php"><img class="logo" src="./images/New_Logo_EyC2024-removebg-preview.png" alt=""></a>
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php"><strong>INICIO</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.php"><strong>NOSOTROS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="contactos.php"><strong>CONTACTOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="servicios.php"><strong>SERVICIOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="agendar_cita.php"><strong>AGENDA TU CITA</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="certificado.php"><strong>CERTIFICADO</strong></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"><strong>TEAM</strong></a>
                            <ul class="dropdown-menu dropdown-team-politicas" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php#team">TEAM</a></li>
                                <li><a class="dropdown-item" href="index.php#news">NEWS</a></li>
                                <li><a class="dropdown-item" href="index.php#projects">PROYECTOS</a></li>
                                <li><a class="dropdown-item" href="trabaja-con-nosotros.php">TRABAJA CON NOSOTROS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="./login.php"><strong>CORPORATIVO</strong></a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPoliticas" role="button"data-bs-toggle="dropdown" aria-expanded="false">POLÍTICAS</a>
                        <ul class="dropdown-menu dropdown-team-politicas" aria-labelledby="navbarDropdownPoliticas">
                            <li><a class="dropdown-item" href="./politicas.php">POLÍTICAS</a></li>
                            <li><a class="dropdown-item" href="./politicasetica.php">POLÍTICAS ÉTICA</a></li>
                            <li><a class="dropdown-item" href="./politicastratamiento.php">POLÍTICAS TRATAMIENTO</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
            <div class="form-container">
        <h2 class="form-title">Se parte del Team</h2>
        <p>Diligencia el siguiente formulario para ponernos en contacto contigo</p>
        <form action="./controlador/envioformulariotcn.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre y apellidos *</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo">
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular">
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento *</label>
                <select id="tipo_documento" name="tipo_documento" required>
                    <option value="">Seleccionar</option>
                    <option value="cedula">Cédula de ciudadanía</option>
                    <option value="cedula_extranjeria">Cédula de extranjería</option>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_documento">Número del documento *</label>
                <input type="text" id="numero_documento" name="numero_documento" required>
            </div>
            <div class="form-group">
                <label for="departamento">¿En qué departamento te encuentras? *</label>
                <input type="text" id="departamento" name="departamento" required>
            </div>
            <div class="form-group">
                <label for="ciudad">¿En qué ciudad vives? *</label>
                <input type="text" id="ciudad" name="ciudad" required>
            </div>
            <div class="form-group">
            <label for="profesion">Cargo</label>
            <select id="profesion" name="profesion">
                <option value="">Seleccionar</option>
                    <option value="agente_servicio_cliente">Agente de Servicio al Cliente</option>
                    <option value="analista_registros">Analista de Registros</option>
                    <option value="aprendiz_sena">Aprendiz SENA</option>
                    <option value="asegurador_metrologico">Asegurador Metrológico</option>
                    <option value="asistente_gerencia">Asistente de Gerencia</option>
                    <option value="auxiliar_administrativa">Auxiliar Administrativa</option>
                    <option value="auxiliar_archivo">Auxiliar de Archivo</option>
                    <option value="auxiliar_calidad">Auxiliar de Calidad</option>
                    <option value="auxiliar_contable">Auxiliar Contable</option>
                    <option value="auxiliar_coordinacion">Auxiliar de Coordinación</option>
                    <option value="auxiliar_metrologico">Auxiliar Metrológico</option>
                    <option value="auxiliar_programacion">Auxiliar de Programación</option>
                    <option value="auxiliar_programacion_enrutamiento">Auxiliar de Programación (Enrutamiento)</option>
                    <option value="auxiliar_pqr">Auxiliar PQR</option>
                    <option value="auxiliar_registro_fotografico">Auxiliar de Registro Fotográfico</option>
                    <option value="auxiliar_sistemas">Auxiliar de Sistemas</option>
                    <option value="auxiliar_sst">Auxiliar SST</option>
                    <option value="auxiliar_talento_humano">Auxiliar de Talento Humano</option>
                    <option value="contador">Contador</option>
                    <option value="coordinador_desarrollo_personas">Coordinador Gestión de Desarrollo de Personas</option>
                    <option value="coordinador_hseq_sst">Coordinador HSEQ-SST</option>
                    <option value="coordinador_nomina">Coordinador de Nómina</option>
                    <option value="coordinador_operacion">Coordinador de Operación</option>
                    <option value="coordinador_proceso">Coordinador de Proceso</option>
                    <option value="coordinador_seleccion_vinculacion">Coordinador de Selección y Vinculación</option>
                    <option value="coordinador_tecnico">Coordinador Técnico</option>
                    <option value="coordinador_tecnico_industrias">Coordinador Técnico en Industrias</option>
                    <option value="digitador">Digitador</option>
                    <option value="director_administrativo">Director Administrativo</option>
                    <option value="director_calidad">Director de Calidad</option>
                    <option value="director_informatica">Director de Informática</option>
                    <option value="director_operaciones">Director de Operaciones</option>
                    <option value="director_proyecto">Director de Proyecto</option>
                    <option value="gestor_informacion">Gestor de Información</option>
                    <option value="gestor_pqrs">Gestor PQRS</option>
                    <option value="gestor_social">Gestor Social</option>
                    <option value="ingeniero_residente">Ingeniero Residente</option>
                    <option value="inspector">Inspector</option>
                    <option value="inspector_aprendiz">Inspector Aprendiz</option>
                    <option value="inspector_industria">Inspector de Industria</option>
                    <option value="mensajero">Mensajero</option>
                    <option value="oficios_generales">Oficios Generales</option>
                    <option value="profesional_sst">Profesional SST</option>
                    <option value="programador_enrutamiento">Programador (Enrutamiento)</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="supervisor_call_center">Supervisor del Call Center</option>
                    <option value="supervisor_inspeccion">Supervisor de Inspección</option>

            </select>
            </div>
        <div id="preguntas-inspector" style="display: none;">
            <div class="form-group">
                <label for="tiene_moto">¿Tienes moto?</label>
                <select id="tiene_moto" name="tiene_moto">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_moto">Tipo de moto</label>
                <input type="text" id="tipo_moto" name="tipo_moto">
            </div>
            <div class="form-group">
                <label for="modelo_moto">Modelo de moto</label>
                <input type="text" id="modelo_moto" name="modelo_moto">
            </div>
            <div class="form-group">
                <label for="estado_propiedad">A nombre de quién está la moto</label>
                <input type="text" id="estado_propiedad" name="estado_propiedad">
            </div>
        </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje"></textarea>
            </div>
            <div class="form-group">
                <label for="hoja_vida">Sube tu hoja de vida *</label>
                <input type="file" id="hoja_vida" name="hoja_vida" required>
                <small>Haz clic o arrastra un archivo PDF a esta área para subirlo.</small>
            </div>
            <div class="form-group">
                <input type="checkbox" id="autorizacion" name="autorizacion" required>
                <label for="autorizacion">Autorizo a E&C Ingeniería, empresa de inspección de gas, a contactarme a través de cualquier medio con el propósito de brindar información relacionada con sus servicios, promociones, programas y actividades, utilizando los datos de contacto aquí suministrados.</label>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
            <!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Accesos Rápidos</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="./index.php"><i class="fa fa-angle-double-right"></i>Inicio</a></li>
						<li><a href="./nosotros.php"><i class="fa fa-angle-double-right"></i>Nosotros</a></li>
						<li><a href="./servicios.php"><i class="fa fa-angle-double-right"></i>Servicios</a></li>
						<li><a href="./certificado.php"><i class="fa fa-angle-double-right"></i>Certificado</a></li>
						<li><a href="./corporativo.php"><i class="fa fa-angle-double-right"></i>Corporativo</a></li>
                        <li><a href="./index.php#team"><i class="fa fa-angle-double-right"></i>Team</a></li>
                        <li><a href="./index.php#news"><i class="fa fa-angle-double-right"></i>News</a></li>
                        <li><a href="./index.php#projects"><i class="fa fa-angle-double-right"></i>Proyectos</a></li>
                        <li><a href="./trabaja-con-nosotros.php"><i class="fa fa-angle-double-right"></i>Trabaja con nosotros</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Políticas</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="./politicas.php"><i class="fa fa-angle-double-right"></i>Políticas</a></li>
						<li><a href="./politicasetica.php"><i class="fa fa-angle-double-right"></i>Políticas etica</a></li>
						<li><a href="./politicastratamiento.php"><i class="fa fa-angle-double-right"></i>Políticas tratamiento</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Contactos</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="./contactos.php"><i class="fa fa-angle-double-right"></i>Contactos</a></li>
                        <li><a href="./contactos.php">Contactos</a></li>
                        <li>Teléfono: (604) 4480265</li>
                        <li>Sede Principal Medellín (Antioquia)</li>
                        <li>CALLE 10 SUR 48 - 62 Barrio Aguacatala 2</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://m.facebook.com/people/Eyc-Ingenieria-Sas/100089364634242/"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/eycingenieria/?igsh=MXVyYWZ4NHV1ZzJ1dA%3D%3D"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="mailto:pqr@eyc.com.co" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>		
			</div>	
            <hr class="hr-border">
                <div class="container text-center">
                    <p>&copy; 2024 E&C Ingeniería S.A.S. Todos los derechos reservados.</p>
                </div>
				<hr class="hr-border">
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
     <script>
    document.addEventListener('DOMContentLoaded', function() {
    const profesionSelect = document.getElementById('profesion');
    const preguntasInspector = document.getElementById('preguntas-inspector');

    function toggleInspectorFields() {
        if (profesionSelect.value === 'inspector' || profesionSelect.value === 'inspector_aprendiz') {
            preguntasInspector.style.display = 'block';
        } else {
            preguntasInspector.style.display = 'none';
        }
    }

    // Ejecutar al cargar la página para ajustar el estado inicial
    toggleInspectorFields();

    // Ejecutar al cambiar la selección del tipo de puesto
    profesionSelect.addEventListener('change', toggleInspectorFields);
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
