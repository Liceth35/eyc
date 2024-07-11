<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&C | Ingeniería S.A.S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/certificado.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <li><a class="dropdown-item" href="./politicas.php">Políticas</a></li>
                            <li><a class="dropdown-item" href="./politicasetica.php">Política ética</a></li>
                            <li><a class="dropdown-item" href="./politicastratamiento.php">Políticas tratamiento</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h2 class="titulo-verificacion">Verificación de Certificados</h2>
    <form action="verificar_certificado.php" method="POST">
        <label for="identificacion">Número de Identificación:</label><br>
        <input type="text" id="identificacion" name="identificacion" required><br><br>

        <label for="codigo">Código del Certificado:</label><br>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <button type="submit">Verificar Certificado</button>
    </form>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

