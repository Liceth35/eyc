<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/servicios.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
  <title>E&C | Ingeniería S.A.S</title>
</head>

<body>

  <header>
    <div class="navbar navbar-expand-lg navbar-color fixed-top">
      <a href="index.php" class="navbar-brand">
        <img src="./images/New_Logo_EyC2024-removebg-preview.png" alt="Logo" class="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <nav class="collapse navbar-collapse servicios_nav" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><strong>INICIO</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nosotros.php"><strong>NOSOTROS</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactos.php"><strong>CONTACTOS</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="servicios.php"><strong>SERVICIOS</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agenda_tu_cita.php"><strong>AGENDA TU CITA</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="certificado.php"><strong>CERTIFICADO</strong></a>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">POLÍTICAS</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
              <li><a class="dropdown-item" href="politicas.php">Políticas de seguridad</a></li>
              <li><a class="dropdown-item" href="politicastratamiento.php">Política de tratamiento</a></li>
              <li><a class="dropdown-item" href="politicasetica.php">Política ética</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="trabaja-con-nosotros.php"><strong>TEAM</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><strong>CORPORATIVO</strong></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <section id="servicios" class="servicios">
    <div class="container_servicios">
      <h2 class="section-title">Servicios</h2>
      <p class="section-description">
        La inspección de gas es una evaluación integral diseñada para garantizar el correcto funcionamiento y la seguridad de los sistemas de gas en su hogar, negocio o fábrica. Nuestros inspectores realizan un examen detallado de cada componente del sistema para detectar posibles fugas, defectos u otros hallazgos para prevenir problemas graves, como explosiones o intoxicaciones. Este proceso actúa como una medida preventiva crucial para proteger tanto a usted como a su propiedad, proporcionando la tranquilidad de saber que se encuentra en un entorno seguro y confiable. Nuestro alcance incluye sistemas individuales y sistemas multiusuario con todos sus componentes.
      </p>
      <div class="service-cards">
        <div class="service-card">
          <img src="./images/residencial.png" alt="Icono Residencial" class="service-icon">
          <div class="service-content_residencial">
            <h3 class="service-title">RESIDENCIAL</h3>
            <p class="service-description">
              Su Hogar, Nuestra Prioridad. Elija nuestros servicios de inspección de gas para garantizar la seguridad y tranquilidad en su casa, apartamento, o la totalidad del conjunto residencial donde se encuentre.
            </p>
          </div>
        </div>
        <div class="service-card">
          <img src="./images/comercial.png" alt="Icono Comercial" class="service-icon">
          <div class="service-content">
            <h3 class="service-title">COMERCIAL</h3>
            <p class="service-description">
              Soluciones Comerciales de Inspección de Gas. Garantizamos la seguridad y cumplimiento normativo en las instalaciones de gas en su centro comercial, conjunto de oficinas, instituciones o negocios individuales donde usted tenga diferentes necesidades del uso seguro del gas por red.
            </p>
          </div>
        </div>
        <div class="service-card">
          <img src="./images/industrial.png" alt="Icono Industrial" class="service-icon">
          <div class="service-content">
            <h3 class="service-title">INDUSTRIAL</h3>
            <p class="service-description">
              Inspección de Gas para Entornos Industriales. Contamos con procedimientos de evaluación de conformidad idóneos para proteger sus instalaciones, facilitando la continuidad de sus procesos que se abastecen de una fuente de energía más limpia accesible como lo es el gas combustible por red.
            </p>
          </div>
        </div>
      </div>
      <div class="more-info">
        <h1>Más Información</h1>
        <div class="additional-buttons">
          <a href="./condiciones.php" class="btn btn-secondary">Condiciones para Adquirir el Servicio</a>
          <a href="./contactos.php" class="btn btn-secondary">Contáctate con Nosotros-PQRS</a>
          <a href="./agenda_tu_cita.php" class="btn btn-secondary">Agenda tu Cita</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <section id="footer">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Accesos Rápidos</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="./index.php"><i class="fa fa-angle-double-right"></i> Inicio</a></li>
            <li><a href="./nosotros.php"><i class="fa fa-angle-double-right"></i> Nosotros</a></li>
            <li><a href="./servicios.php"><i class="fa fa-angle-double-right"></i> Servicios</a></li>
            <li><a href="./agenda_tu_cita.php"><i class="fa fa-angle-double-right"></i> Agenda tu cita</a></li>
            <li><a href="./certificado.php"><i class="fa fa-angle-double-right"></i> Certificado</a></li>
            <li><a href="./corporativo.php"><i class="fa fa-angle-double-right"></i> Corporativo</a></li>
            <li><a href="./trabaja-con-nosotros.php"><i class="fa fa-angle-double-right"></i> Trabaja con nosotros</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Políticas</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="./politicas.php"><i class="fa fa-angle-double-right"></i>Políticas</a></li>
            <li><a href="./politicasetica.php"><i class="fa fa-angle-double-right"></i>Políticas etica</a></li>
            <li><a href="./politicastratamiento.php"><i class="fa fa-angle-double-right"></i>Políticas tratamiento</a></li>
            <li><a href="./condiciones.php"></li><i class="fa fa-angle-double-right"></i>Condiciones para el servicio</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
          <h5>Contactos</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="./contactos.php"><i class="fa fa-angle-double-right"></i>Contactos</a></li>
            <li>Teléfono: (604) 4480265</li>
            <li>Sede Principal Medellín (Antioquia)</li>
            <li>CALLE 10 SUR 48 - 62 Barrio Aguacatala 2</li>
          </ul>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <ul class="list-unstyled list-inline social text-center">
              <li class="list-inline-item"><a href="https://m.facebook.com/people/Eyc-Ingenieria-Sas/100089364634242/"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="https://www.instagram.com/eycingenieria/?igsh=MXVyYWZ4NHV1ZzJ1dA%3D%3D"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="mailto:pqr@eyc.com.co" target="_blank"><i class="fa fa-envelope"></i></a></li>
            </ul>
          </div>
          <div class="container text-center">
            <p>&copy; 2024 E&C Ingeniería S.A.S. Todos los derechos reservados.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ./Footer -->

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>