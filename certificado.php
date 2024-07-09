<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de Certificados</title>
    <link rel="stylesheet" href="./css/certificado.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="container">
                <!-- LOGO -->
                <div class="logo">
                    <a href="index.php"><span class="b1">E</span><span class="b2">&</span><span class="b3">C</span></a>
                </div>
                <!-- Menu -->
                <nav class="navmenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="index.php"><strong>INICIO</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.php"><strong>NOSOTROS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="contactos.php"><strong>CONTACTOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="servicios.php"><strong>SERVICIOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="agendar_cita.php"><strong>AGENDA TU CITA</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="certificado.php"><strong>CERTIFICADO</strong></a></li>
                        <li class="sub-menu">
                            <a href="javascript:void(0);"><strong>TEAM</strong></a>
                            <ul>
                                <li class="scroll_btn"><a href="index.php#team"style="color:white;"!important>TEAM</a></li>
                                <li class="scroll_btn"><a href="index.php#news"style="color:white;"!important>NEWS</a></li>
                                <li class="scroll_btn"><a href="#projects"style="color:white;"!important>PROYECTOS</a></li>
                                <li><a href="trabaja-con-nosotros.php"style="color:white;"!important>TRABAJA CON NOSOTROS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="login.php"><strong>CORPORATIVO</strong></a></li>
                        <li class="sub-menu">
                            <a href="javascript:void(0);"><strong>POLÍTICAS</strong></a>
                            <ul>
                                <li><a href="politicas.php"style="color:white;"!important>POLÍTICAS</a></li>
                                <li><a href="politicasetica.php"style="color:white;"!important>POLÍTICA ÉTICA</a></li>
                                <li><a href="politicastratamiento.php"style="color:white;"!important>POLÍTICA DE TRATAMIENTO</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
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
            <div class="row text-center text-xs-center text-sm-center text-md-center">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Accesos Rápidos</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="./index.php">Inicio</a></li>
                        <li><a href="./nosotros.php">Nosotros</a></li>
                        <li><a href="./servicios.php">Servicios</a></li>
                        <li><a href="./certificado.php">Certificado</a></li>
                        <li><a href="./login.php">Corporativo</a></li>
                        <li><a href="./index.php#team">Team</a></li>
                        <li><a href="./index.php#news">News</a></li>
                        <li><a href="./index.php#projects">Proyectos</a></li>
                        <li><a href="./trabaja-con-nosotros.php">Trabaja con nosotros</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Políticas</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="./politicas.php">Políticas</a></li>
                        <li><a href="./politicasetica.php">Políticas ética</a></li>
                        <li><a href="./politicastratamiento.php">Políticas tratamiento</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Contactos</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="./contactos.php">Contactos</a></li>
                        <li>Teléfono: (604) 4480265</li>
                        <li>Sede Principal Medellín (Antioquia)</li>
                        <li>CALLE 10 SUR 48 - 62 Barrio Aguacatala 2</li>
                    </ul>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <ul class="list-unstyled list-inline social">
                        <li class="list-inline-item"><a href="https://m.facebook.com/people/Eyc-Ingenieria-Sas/100089364634242/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/eycingenieria/?igsh=MXVyYWZ4NHV1ZzJ1dA%3D%3D" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="mailto:pqr@eyc.com.co" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <hr>
            </div>  
            <div class="row text-center">
                <div class="col-12 mt-2 mt-sm-2 text-center text-white">
                    <p class="derechos-reservados">© 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p>
                </div>
                <hr>
            </div>  
        </div>
    </section>
    <!-- ./Footer -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
