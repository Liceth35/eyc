<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<title>E&C | Ingeniería S.A.S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	
	<link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    
	<!-- CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="./css/home.css" href="style.css">
	<link href="css/flexslider.css" rel="stylesheet" type="text/css" />
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,500,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">	
    
	<!-- SCRIPTS -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="js/superfish.min.js" type="text/javascript"></script>
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/owl.carousel.js" type="text/javascript"></script>
	<script src="js/animate.js" type="text/javascript"></script>
	<script src="js/jquery.BlackAndWhite.js"></script>
	<script src="js/myscript.js" type="text/javascript"></script>
	<script>
		
		//PrettyPhoto
		jQuery(document).ready(function() {
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
		
		//BlackAndWhite
		$(window).load(function(){
			$('.client_img').BlackAndWhite({
				hoverEffect : true, // default true
				// set the path to BnWWorker.js for a superfast implementation
				webworkerPath : false,
				// for the images with a fluid width and height 
				responsive:true,
				// to invert the hover effect
				invertHoverEffect: false,
				// this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
				intensity:1,
				speed: { //this property could also be just speed: value for both fadeIn and fadeOut
					fadeIn: 300, // 200ms for fadeIn animations
					fadeOut: 300 // 800ms for fadeOut animations
				},
				onImageReady:function(img) {
					// this callback gets executed anytime an image is converted
				}
			});
		});
		
	</script>
	
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
					<a class="" href="index.php"><img class="logo_index" src="./images/New_Logo_EyC2024-removebg-preview.png" alt=""></a>
					</div><!-- //LOGO -->
					<!-- MENU -->
					<div class="pull-right menu_index">
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
									<a class="nav-link" href="servicios.php"style="color:black!important;"><strong>Servicios</strong></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="agendar_cita.php"><strong>Agenda tu cita</strong></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="certificado.php"style="color:black!important;"><strong>Certficado</strong></a>
								</li>
								<li class="sub-menu">
									<a href="javascript:void(0);" style="color:black!important;" >Team</a>
									<ul>
										<li class="scroll_btn"><a href="index.php#team"style="color:white!important;">Team</a></li>
										<li class="scroll_btn"><a href="index.php#news"style="color:white!important;">News</a></li>
										<li class="scroll_btn"><a href="#projects"style="color:white!important;">Proyectos</a></li>
										<li><a href="trabaja-con-nosotros.php"style="color:white!important;" >Trabaja con nosotros</a></li>
									</ul>
									<li class="nav-item">
										<a class="nav-link" href="login.php"><strong>Corporativo</strong></a>
									</li>								
									<li class="sub-menu">
									<a href="javascript:void(0);" style="color:black!important;" >Politicas</a>
									<ul>
										<li><a href="politicas.php" style="color:white!important;">Politicas seguridad</a></li>
										<li><a href="politicastratamiento.php" style="color:white!important;">Politica tratamiento</a></li>
										<li><a href="politicasetica.php"style="color:white!important;" >politica etica</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div><!-- //MENU -->
				</div><!-- //MENU BLOCK -->
			</div><!-- //CONTAINER -->
		</header><!-- //HEADER -->
		<!-- HOME -->
		<section id="home" class="padbot0">
				
			<!-- TOP SLIDER -->
			<div class="flexslider top_slider">
				<ul class="slides">
					<li class="slide1">
						<div class="flex_caption1">
							<p class="title1 captionDelay2 FromTop">E&C</p>
							<p class="title2 captionDelay4 FromTop">Ingeniería</p>
							<p class="title3 captionDelay6 FromTop">S.A.S</p>
							<p class="title4 captionDelay7 FromBottom">Personal Competente, Comprometido con la Calidad
							Nuestro equipo está formado por profesionales altamente competentes que han adoptado la calidad como su filosofía de vida. Cada inspección es realizada con meticulosidad y precisión para asegurar el cumplimiento de los más altos estándares.</p>
						</div>
						<a class="slide_btn FromRight" href="./Preguntas_Frecuentes.php" >Preguntas Frecuentes</a>
					<li class="slide2">
						<div class="flex_caption1">
							<p class="title1 captionDelay6 FromLeft">E&C Ingeniería </p>
							<p class="title2 captionDelay4 FromLeft">S.A.S</p>
							<p class="title3 captionDelay2 FromLeft"></p>
							<p class="title4 captionDelay7 FromLeft">Desde 2008, hemos formado un equipo de alto rendimiento. En septiembre de 2015, nos acreditamos como organismo de inspección tipo A. En noviembre de 2015, obtuvimos certificación en normas clave. Desde entonces, hemos realizado inspecciones en Antioquia, Valle del Cauca y el Eje Cafetero. Actualmente, nos capacitamos para acreditarnos en nuevas áreas y estamos preparando nuestra entrada a Bogotá y la Costa Caribe. E&C Ingeniería SAS se destaca por su dedicación a la excelencia en servicios.</p>
						</div>
						<a class="slide_btn FromRight" href="./Preguntas_Frecuentes.php" >Preguntas Frecuentes </a>
					</li>
					<li class="slide3">
						<div class="flex_caption1">
							<p class="title1 captionDelay1 FromBottom">Amazing</p>
							<p class="title2 captionDelay2 FromBottom">Video</p>
							<p class="title3 captionDelay3 FromBottom">Background</p>
							<p class="title4 captionDelay5 FromBottom">The template is suitable for any company and the direction that appreciates style, purity and quality of the web site.</p>
						</div>
						<a class="slide_btn FromRight" href="./Preguntas_Frecuentes.php" >Preguntas Frecuentes </a>
						<!-- VIDEO BACKGROUND -->
						<a id="P2" class="player" data-property="{videoURL:'tDvBwPzJ7dY',containment:'.top_slider .slide3',autoPlay:true, mute:true, startAt:0, opacity:1}" ></a>
						<!-- //VIDEO BACKGROUND -->
					</li>
				</ul>
			</div>
			<div id="carousel">
				<ul class="slides">
					<li><img src="images/slider/slide1_bg.jpg" alt="" /></li>
					<li><img src="images/slider/slide2_bg.jpg" alt="" /></li>
					<li><img src="images/slider/slide3_bg.jpg" alt="" /></li>
				</ul>
			</div><!-- //TOP SLIDER -->
		</section><!-- //HOME -->
		
		<!-- PROJECTS -->
		<section id="projects" class="padbot20">
		
			<!-- CONTAINER -->
			<div class="container">
				<h2><b>Nuestros</b> trabajos</h2>
			</div><!-- //CONTAINER -->
			
				
			<div class="projects-wrapper" data-appear-top-offset="-200" data-animated="fadeInUp">
				<!-- PROJECTS SLIDER -->
				<div class="owl-demo owl-carousel projects_slider">
					
					<!-- work1 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img work_botones">
								<img src="images/works/1.jpg" alt="" />
								<a class="zoom" href="images/works/1.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description ">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work1 -->
					
					<!-- work2 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img">
								<img src="images/works/2.jpg" alt="" />
								<a class="zoom" href="images/works/2.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work2 -->
					
					<!-- work3 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img">
								<img src="images/works/3.jpg" alt="" />
								<a class="zoom" href="images/works/3.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work3 -->
					
					<!-- work4 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img">
								<img src="images/works/4.jpg" alt="" />
								<a class="zoom" href="images/works/4.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work4 -->
					
					<!-- work5 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img">
								<img src="images/works/5.jpg" alt="" />
								<a class="zoom" href="images/works/5.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work5 -->
					
					<!-- work6 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img">
								<img src="images/works/6.jpg" alt="" />
								<a class="zoom" href="images/works/6.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work6 -->
					
					<!-- work7 -->
					<div class="item">
						<div class="work_item">
							<div class="work_img">
								<img src="images/works/7.jpg" alt="" />
								<a class="zoom" href="images/works/7.jpg" rel="prettyPhoto[portfolio1]" ></a>
							</div>
							<div class="work_description">
								<div class="work_descr_cont">
									<span><h1 style="color: white;">Beast</h1></span></a>
									<span>17 March, 2041</span>
								</div>
							</div>
						</div>
					</div><!-- //work7 -->
				</div><!-- //PROJECTS SLIDER -->
			</div>		
		
			<div class="papanosotros"><a href="./trabaja-con-nosotros.php" class="trabajaNoso"><button type="button" class="btn btn-info">trabaja con nosotros</button></a></div>
		</section><!-- //TEAM -->
		
		
		<!-- NEWS -->
		<section id="news">
		
			<!-- CONTAINER -->
			<div class="container">
				<h2><b>Slogan</b> E & C</h2>
				
				<!-- TESTIMONIALS -->
				<div class="testimonials" data-appear-top-offset="-200" data-animated="fadeInUp">
						
					<!-- TESTIMONIALS SLIDER -->
					<div class="owl-demo owl-carousel testim_slider">
						
						<!-- TESTIMONIAL1 -->
						<div class="item">
							<div class="testim_content">Certificamos seguridad,garantizamos confianza.</div>
						</div><!-- TESTIMONIAL1 -->
					</div><!-- TESTIMONIALS SLIDER -->
				</div><!-- //TESTIMONIALS -->
				
				<!-- RECENT POSTS -->
				<center><h1><b>Noticias</b></h1></center>
				<div class="row recent_posts" data-appear-top-offset="-200" data-animated="fadeInUp">
					<div class="col-lg-4 col-md-4 col-sm-4 padbot30 post_item_block">
						<div class="post_item">
							<div class="post_item_img">
								<img src="images/blog/1.jpg" alt="" />
								<a class="link" href="./blog.php" ></a>
							</div>
							<div class="post_item_content">
								<a class="title" href="./blog.php" ></a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 padbot30 post_item_block">
						<div class="post_item">
							<div class="post_item_img">
								<img src="images/blog/2.jpg" alt="" />
								<a class="link" href="./blog.php"></a>
							</div>
							<div class="post_item_content">
								<a class="title" href="./blog.php" >Nueva vacante</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 padbot30 post_item_block">
						<div class="post_item">
							<div class="post_item_img">
								<img src="images/blog/3.jpg" alt="" />
								<a class="link" href="./blog.php"></a>
							</div>
							<div class="post_item_content">
								<a class="title" href="./blog.php" >Por qué es importante la revisión de gas?</a>
							</div>
						</div>
					</div>
				</div><!-- RECENT POSTS -->
			</div><!-- //CONTAINER -->
		</section><!-- //NEWS -->
	</div><!-- //PAGE -->
	
	<!-- CONTACTS -->
	<section id="contacts">
	</section><!-- //CONTACTS -->
	<!-- Footer -->
	<br><section id="footer" class="slogan">
            <div class="container footercolor">
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
							<li class="list-inline-item"><a href="mailto:pqr@eyc.com.co" target="_blank" style="color: white;"><i class="fa fa-envelope"></i></a></li>
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
	
	
</body>
</html>
