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
    <link rel="stylesheet" href="./css/certificado.css">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,500,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">	
    
	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	
<!-- PRELOADER -->
<img id="preloader" src="images/preloader.gif" alt="" />
<!-- //PRELOADER -->
<div class="preloader_hide">

	<!-- PAGE -->
	<div id="page">
	
		<!-- HEADER -->
		<header>
			
			<!-- MENU BLOCK -->
			<div class="menu_block">
			
				<!-- CONTAINER -->
				<div class="container clearfix">
					
					<!-- LOGO -->
					<div class="logo pull-left">
						<a href="index.php" ><span class="b1">e</span><span class="b2">&</span><span class="b3">c</span><span class="b4"></span><span class="b5"></span></a>
					</div><!-- //LOGO -->
					
					<!-- SEARCH FORM -->
					<div id="search-form" class="pull-right">
						<form method="get" action="#">
							<input type="text" name="Search" value="Search" onFocus="if (this.value == 'Search') this.value = '';" onBlur="if (this.value == '') this.value = 'Search';" />
						</form>
					</div><!-- SEARCH FORM -->
					<!-- MENU -->
					<div class="pull-right">
						<nav class="navmenu center">
							<ul>
								<li class="nav-item">
									<a class="nav-link" href="index.php"><strong>Inicio</strong></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="nosotros.php"><strong>Nosotros</strong></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="contactos.php"><strong>Contactos</strong></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="servicios.php"><strong>Servicios</strong></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="certificado.php"><strong>Certficado</strong></a>
								</li>
								<li class="sub-menu">
                                    <a href="javascript:void(0);"  style="color:black;">Team</a>
                                    <ul>
                                        <li class="scroll_btn"><a href="index.php#team">Team</a></li>
                                        <li class="scroll_btn"><a href="index.php#news">News</a></li>
                                        <li class="scroll_btn"><a href="#projects" >Proyectos</a></li>
                                        <li><a href="trabaja-con-nosotros.php" >trabaja con nosotros</a></li>
                                    </ul>
                                </li>
									<li class="nav-item">
										<a class="nav-link" href="login.php"><strong>Corporativo</strong></a>
									</li>	
									<li class="sub-menu">
									<a href="javascript:void(0);"  style="color:black;">Politicas</a>
									<ul>
										<li><a href="politicas.php" >Politicas seguridad</a></li>
										<li><a href="politicastratamiento.php" >Politica tratamiento</a></li>
										<li><a href="politicasetica.php" >politica etica</a></li>
									</ul>							
								</li>
							</ul>
						</nav>
					</div><!-- //MENU -->
				</div><!-- //MENU BLOCK -->
			</div><!-- //CONTAINER -->
		</header><!-- //HEADER -->
			<div class="certificado">
				<br><center><h1>Verificación de Certificados</h1></center>
				<form action="verificar.php" method="POST">
					<div class="mb-3">
						<br><center><label for="identificacion" class="form-label">Número de Identificación:</label></center>
						<input type="text" class="form-control" id="identificacion" name="identificacion" required>
					</div>
					<div class="mb-3">
						<br><center><label for="codigo" class="form-label">Código del Certificado:</label></center>
						<input type="text" class="form-control" id="codigo" name="codigo" required>
					</div>
					<br><center><button type="submit" class="btn btn-primary" id="submit-btn">Verificar</button></center>
				</form>
			</div>
			<!-- Footer -->
	<br><section id="footer">
		<div class="container">
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
						<li><i class="fa-solid fa-phone"></i>Teléfono: (604) 4480265</li>
						<li><i class="fa-solid fa-map-location-dot"></i>Sede Principal Medellín(Antioquia)</li>
						<li><i class="fa-solid fa-map-location-dot"></i>CALLE 10 SUR 48 - 62 Barrio Aguacatala 2</li>
					</ul>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://m.facebook.com/people/Eyc-Ingenieria-Sas/100089364634242/"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/eycingenieria/?igsh=MXVyYWZ4NHV1ZzJ1dA%3D%3D"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="mailto:info@inspecta.com.co" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-black">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
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
</body>
</html>
