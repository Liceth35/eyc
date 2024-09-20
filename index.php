<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E&C | Ingeniería S.A.S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="shortcut icon" href="./images/New_Logo_EyC2024_vertical-removebg-preview.png">
    <link href="./css/home.css" rel="stylesheet">
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
            <nav class="collapse navbar-collapse" id="navbarNav">
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

    <!-- Carrusel personalizado -->
    <div id="carrusel-personalizado" class="carousel slide" data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/clean_code_bg.jpg" class="d-block w-100" alt="Imagen 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título de la Imagen 1</h5>
                    <p>Descripción breve de la imagen 1.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./images/slider/slide1_bg.jpg" class="d-block w-100" alt="Imagen 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título de la Imagen 2</h5>
                    <p>Descripción breve de la imagen 2.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./images/blog/1.jpg" class="d-block w-100" alt="Imagen 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Título de la Imagen 3</h5>
                    <p>Descripción breve de la imagen 3.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carrusel-personalizado" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrusel-personalizado" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="additional-buttons">
        <a href="./preguntas_frecuentes.php" class="btn btn-secondary" id="btn-preguntas-frecuentes">PREGUNTAS FRECUENTES</a>
    </div>
    <h1 class="Titulo_trabajos">Nuestros trabajos</h1>

    <!-- Cartas -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./images/team/1.jpg" class="card-img-top" alt="Trabajo 1">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo 1</h5>
                        <p class="card-text">Descripción breve del trabajo 1.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./images/team/2.jpg" class="card-img-top" alt="Trabajo 2">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo 2</h5>
                        <p class="card-text">Descripción breve del trabajo 2.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./images/team/3.jpg" class="card-img-top" alt="Trabajo 3">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo 3</h5>
                        <p class="card-text">Descripción breve del trabajo 3.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./images/team/4.jpg" class="card-img-top" alt="Trabajo 4">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo 4</h5>
                        <p class="card-text">Descripción breve del trabajo 4.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./images/team/5.jpg" class="card-img-top" alt="Trabajo 5">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo 5</h5>
                        <p class="card-text">Descripción breve del trabajo 5.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="./images/team/6.jpg" class="card-img-top" alt="Trabajo 6">
                    <div class="card-body">
                        <h5 class="card-title">Trabajo 6</h5>
                        <p class="card-text">Descripción breve del trabajo 6.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="additional-buttons">
        <a href="./trabaja-con-nosotros.php" class="btn btn-secondary" id="btn-trabaja-con-nosotros">UNETE AL TEAM</a>
    </div>
    <div class="ranking-container">
        <h1 class="ranking-title">Ranking de Trabajadores</h1>
        <div class="podium">
            <div class="position second">
                <div class="podium-box">
                    <span class="podium-number">2</span>
                    <img src="./images/img2.jfif" alt="Trabajador 2" class="worker-img">
                    <p class="worker-name">Nombre 2</p>
                    <p class="score">90 puntos</p>
                </div>
            </div>
            <div class="position first">
                <div class="podium-box">
                    <span class="podium-number">1</span>
                    <img src="./images/img1.jfif" alt="Trabajador 1" class="worker-img">
                    <p class="worker-name">Nombre 1</p>
                    <p class="score">95 puntos</p>
                </div>
            </div>
            <div class="position third">
                <div class="podium-box">
                    <span class="podium-number">3</span>
                    <img src="./images/img3.jfif" alt="Trabajador 3" class="worker-img">
                    <p class="worker-name">Nombre 3</p>
                    <p class="score">85 puntos</p>
                </div>
            </div>
        </div>

        <div class="other-workers">
            <h3 class="tittle_trabajadores">Otros Trabajadores</h3>
            <ul id="worker-list">
                <li>Trabajador 4 - 80 puntos</li>
                <li>Trabajador 5 - 75 puntos</li>
                <li>Trabajador 6 - 70 puntos</li>
            </ul>
            <button id="view-more-btn" class="btn btn-primary">Ver más</button>
        </div>
    </div>

    <section id="eslogan" class="eslogan">
        <div class="container">
            <h2>Slogan E & C</h2>
            <p>Certificamos seguridad, garantizamos confianza.</p>
        </div>
    </section>

    <section id="noticias" class="noticias">
        <div class="container">
            <h2>Últimas Noticias</h2>
            <div class="noticias-grid">
                <div class="noticia">
                    <a href="./blog.php">
                        <img src="./images/hoja-de-vida.webp" alt="Noticia 1">
                        <h3>Título de la Noticia 1</h3>
                        <p>Resumen de la noticia 1...</p>
                    </a>
                </div>
                <div class="noticia">
                    <a href="./blog.php">
                        <img src="./images/contactos.jpg" alt="Noticia 2">
                        <h3>Título de la Noticia 2</h3>
                        <p>Resumen de la noticia 2...</p>
                    </a>
                </div>
                <div class="noticia">
                    <a href="./blog.php">
                        <img src="./images/avatar1.jpg" alt="Noticia 3">
                        <h3>Título de la Noticia 3</h3>
                        <p>Resumen de la noticia 3...</p>
                    </a>
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
                        <li><a href="./index.php"><i class="fa fa-angle-double-right"></i>Inicio</a></li>
                        <li><a href="./nosotros.php"><i class="fa fa-angle-double-right"></i>Nosotros</a></li>
                        <li><a href="./servicios.php"><i class="fa fa-angle-double-right"></i>Servicios</a></li>
                        <li><a href="./agenda_tu_cita.php"><i class="fa fa-angle-double-right"></i>Agenda tu cita</a></li>
                        <li><a href="./certificado.php"><i class="fa fa-angle-double-right"></i>Certificado</a></li>
                        <li><a href="./corporativo.php"><i class="fa fa-angle-double-right"></i>Corporativo</a></li>
                        <li><a href="./trabaja-con-nosotros.php"><i class="fa fa-angle-double-right"></i>Trabaja con nosotros</a></li>
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
            <div class="container text-center">
                <p>&copy; 2024 E&C Ingeniería S.A.S. Todos los derechos reservados.</p>
            </div>
        </div>
        </div>
    </section>
    <!-- ./Footer -->

    <!-- Scripts de Bootstrap -->
    <script src="./js/ranking.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const toggler = document.querySelector(".navbar-toggler");
    const menu = document.querySelector(".navmenu ul");

    toggler.addEventListener("click", function() {
        menu.classList.toggle("active");
    });
});
</script>
</body>

</html>