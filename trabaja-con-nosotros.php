<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>E&C | Ingeniería S.A.S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="images/favicon.ico">
    
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/trabajanosotros.css">
    
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,500,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">    
    
    <!-- SCRIPTS -->
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
    
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/myscript.js" type="text/javascript"></script>
</head>
<body>
    <!-- PRELOADER -->
    <img id="preloader" src="images/preloader.gif" alt="" />
    <!-- //PRELOADER -->
    <div class="preloader_hide">

        <!-- PAGE -->
        <div id="page">
        
            <!-- HEADER -->
            <header>
                
                <!-- MENU BLOCK -->
                <div class="menu_block" style="background-color:white; color:white;">
                
                    <!-- CONTAINER -->
                    <div class="container clearfix">
                        
                        <!-- LOGO -->
                        <div class="logo pull-left" style="color:white;">
                            <a href="index.php"><span class="b1">e</span><span class="b2">&</span><span class="b3">c</span><span class="b4"></span><span class="b5"></span></a>
                        </div><!-- //LOGO -->
                        
                        <!-- SEARCH FORM -->
                        <div id="search-form" class="pull-right"  style="color:white;">
                            <form method="get" action="searc.php">
                                <input type="text" name="Search" value="Search" onFocus="if (this.value == 'Search') this.value = '';" onBlur="if (this.value == '') this.value = 'Search';" />
                            </form>
                        </div><!-- SEARCH FORM -->
                        <!-- MENU -->
                        <div class="pull-right">
                            <nav class="navmenu center navteam">
                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php" style="color:black;"><strong>Inicio</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="nosotros.php" style="color:black;"><strong>Nosotros</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contactos.php" style="color:black;"><strong>Contactos</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="servicios.php" style="color:black;"><strong>Servicios</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="certificado.php" style="color:black;"><strong>Certificado</strong></a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="javascript:void(0);" style="color:black;">Team</a>
                                        <ul>
                                            <li class="scroll_btn"><a href="index.php#team" style="color:white!important;">Team</a></li>
                                            <li class="scroll_btn"><a href="index.php#news" style="color:white!important;">News</a></li>
                                            <li class="scroll_btn"><a href="index.php#projects" style="color:white!important;">Proyectos</a></li>
                                            <li><a href="trabaja-con-nosotros.php" style="color:white!important;">trabaja con nosotros</a></li>
                                        </ul>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login.php" style="color:black;"><strong>Corporativo</strong></a>
                                        </li>                                
                                        <li class="sub-menu">
                                        <a href="javascript:void(0);" style="color:black;">Politicas</a>
                                        <ul>
                                            <li><a href="politicas.php" style="color:white!important;">Politicas seguridad</a></li>
                                            <li><a href="politicastratamiento.php" style="color:white!important;">Politica tratamiento</a></li>
                                            <li><a href="politicasetica.php" style="color:white!important;">politica etica</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- //MENU -->
                    </div><!-- //MENU BLOCK -->
                </div><!-- //CONTAINER -->
            </header><!-- //HEADER -->
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
                <label for="profesion">Profesión</label>
                <input type="text" id="profesion" name="profesion">
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje"></textarea>
            </div>
            <div class="form-group">
                <label for="hoja_vida">Sube tu hoja de vida *</label>
                <input type="file" id="hoja_vida" name="hoja_vida" required>
                <small>Haz clic o arrastra un archivo a esta área para subirlo.</small>
            </div>
            <div class="form-group">
                <input type="checkbox" id="autorizacion" name="autorizacion" required>
                <label for="autorizacion">Autorizo a E&C Ingeniería, empresa de inspección de gas, a contactarme a través de cualquier medio con el propósito de brindar información relacionada con sus servicios, promociones, programas y actividades, utilizando los datos de contacto aquí suministrados.</label>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
            <!-- Footer -->
            <br><section id="footer">
                <div class="container colorformulario">
                    <div class="row text-center text-xs-center text-sm-left text-md-left">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <h5>Acessos Rápidos</h5>
                            <ul class="list-unstyled quick-links">
                                <li><a href="./index.php"><i class="fa fa-angle-double-right"></i>Inicio</a></li>
                                <li><a href="./nosotros.php"><i class="fa fa-angle-double-right"></i>Nosotros</a></li>
                                <li><a href="./servicios.php"><i class="fa fa-angle-double-right"></i>Servicios</a></li>
                                <li><a href="./certificado.php"><i class="fa fa-angle-double-right"></i>Certificado</a></li>
                                <li><a href="./login.php"><i class="fa fa-angle-double-right"></i>Corporativo</a></li>
                                <li><a href="./index.php#team"><i class="fa fa-angle-double-right"></i>Team</a></li>
                                <li><a href="./index.php#news"><i class="fa fa-angle-double-right"></i>News</a></li>
                                <li><a href="./index.php#projects"><i class="fa fa-angle-double-right"></i>Proyectos</a></li>
                                <li><a href="./trabaja-con-nosotros.php"><i class="fa fa-angle-double-right"></i>Trabaja con nosotros</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <h5>Politicas</h5>
                            <ul class="list-unstyled quick-links">
                                <li><a href="./politicas.php"><i class="fa fa-angle-double-right"></i>Politicas</a></li>
                                <li><a href="./politicasetica.php"><i class="fa fa-angle-double-right"></i>Politicas etica</a></li>
                                <li><a href="./politicastratamiento.php"><i class="fa fa-angle-double-right"></i>Politicas tratamiento</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <h5>Contactos</h5>
                            <ul class="list-unstyled quick-links">
                                <li><a href="./contactos.php"><i class="fa fa-angle-double-right"></i>Contactos</a></li>
                                <ul class="list-unstyled quick-links">
                                    <li style="color: white;"><i class="fa-solid fa-phone"></i>Teléfono: (604) 4480265</li>
                                    <li style="color: white;"><i class="fa-solid fa-map-location-dot"></i>Sede Principal Medellín(Antioquia)</li>
                                    <li style="color: white;"><i class="fa-solid fa-map-location-dot"></i>CALLE 10 SUR 48 - 62 Barrio Aguacatala 2</li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                            <ul class="list-unstyled list-inline social text-center">
                                <li class="list-inline-item"><a href="https://m.facebook.com/people/Eyc-Ingenieria-Sas/100089364634242/" style="color: white;"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/eycingenieria/?igsh=MXVyYWZ4NHV1ZzJ1dA%3D%3D" style="color: white;"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="mailto:info@pqr@eyc.com.co" target="_blank" style="color: white;"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                        <hr>
                    </div>    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-black">
                        <li style="color: white;"><p class="h6">© 2024 E&C INGENIERÍA S.A.S. Todos los derechos reservados.</p></li>
                        </div>
                        <hr>
                    </div>    
                </div>
            </section>
            <!-- ./Footer -->
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    // Controlador de eventos de clic en cualquier parte del documento
                    $(document).click(function(event) { 
                        // Verificar si el clic no se realizó en un elemento .sub-menu
                        if(!$(event.target).closest('.sub-menu').length) {
                            // Ocultar todas las listas secundarias
                            $('.sub-menu ul').hide();
                        }        
                    });
                    
                    // Controlador de eventos de clic en los elementos .sub-menu
                    $('.sub-menu').click(function(event){
                        // Detener la propagación del evento para evitar que el clic se propague al documento
                        event.stopPropagation();
                        // Ocultar todas las listas secundarias
                        $('.sub-menu ul').hide();
                        // Mostrar u ocultar la lista secundaria del elemento clicado
                        $(this).children('ul').toggle();
                    });
                });
            </script>                                                                                                                                                    
            <script src="./js/trabaja.js"></script>
            <script>
                document.getElementById('vacancyForm').addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission
                    // Simulate form submission (replace with your actual submission logic)
                    fetch('your_submission_url', { method: 'POST' })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('¡Su aplicación ha sido enviada exitosamente!'); // Show alert on success
                            } else {
                                alert('Hubo un error al enviar su aplicación. Intente nuevamente.'); // Show error alert
                            }
                        })
                        .catch(error => {
                            alert('Ocurrió un error inesperado. Intente nuevamente más tarde.'); // Show generic error alert
                        });
                });
            </script>
        </div>
    </div>
</body>
</html>
