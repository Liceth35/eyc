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
									<a href="javascript:void(0);" >Team</a>
									<ul>
										<li class="scroll_btn"><a href="index.php#team">Team</a></li>
										<li class="scroll_btn"><a href="index.php#news">News</a></li>
										<li class="scroll_btn"><a href="#projects" >Proyectos</a></li>
										<li><a href="trabaja-con-nosotros.php" >trabaja con nosotros</a></li>
									</ul>
									<li class="nav-item">
										<a class="nav-link" href="login.php"><strong>Corporativo</strong></a>
									</li>								
									<li class="sub-menu">
									<a href="javascript:void(0);" >Politicas</a>
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
		
		
		<!-- BREADCRUMBS -->
		<section class="breadcrumbs_block clearfix parallax">
			<div class="container center">
				<h2><b>El</b> Blog</h2>
				<p>Publicación de las últimas noticias, artículos y vacantes.</p>
			</div>
		</section><!-- //BREADCRUMBS -->
		
		
		<!-- BLOG -->
		<section id="blog">
			
			<!-- CONTAINER -->
			<div class="container">
				
				<!-- ROW -->
				<div class="row">
				
					<!-- BLOG BLOCK -->
					<div class="blog_block col-lg-9 col-md-9 padbot50">
						
						<!-- SINGLE BLOG POST -->
						<div class="single_blog_post clearfix" data-animated="fadeInUp">
							<div class="single_blog_post_descr">
								<div class="single_blog_post_date">Mayo 13 | 21:30</div>
								<div class="single_blog_post_title">Explosión por no hacer inspección</div>
								<ul class="single_blog_post_info">
									<li><a href="javascript:void(0);" >Admin</a></li>
									<li><a href="javascript:void(0);" >Creative</a></li>
								</ul>
							</div>
							<div class="single_blog_post_img"><img src="images/blog/1.jpg" alt="" /></div>
							
							<div class="single_blog_post_content">
								<p class="margbot50">Cartagena, D.T y C; 23 de diciembre de 2023. El Cuerpo de Bomberos de Cartagena, en compañía de la Oficina Asesora para la Gestión del Riesgo de Desastres (OAGRD), atendió una emergencia ocasionada por una explosión de gas natural en el piso 14 del edificio Monte Sinaí, apartamento 1402.</p>
								<p class="margbot30">En el evento resultó lesionado el ciudadano Juan Carlos Polanco Ortiz, quien fue trasladado a un centro hospitalario y es atendido a esta hora por el personal médico.</p>
								<p class="margbot40">De acuerdo al reporte de Bomberos y OAGRD, se registraron daños importantes en el apartamento 1402, en ventanas, puertas, muebles, televisor, camas, paredes y aires acondicionados.</p>
							</div>
							
						</div><!-- //SINGLE BLOG POST -->
						
						<!-- COMMENTS -->
						<div id="comments" class="margbot30" data-animated="fadeInUp">
							<h3><b>Comments </b><span class="comments_count">(152)</span></h3>
							
							<ul>
								<li class="clearfix" data-animated="fadeInUp">
									<div class="pull-left avatar">
										<a href="javascript:void(0);" ><img src="images/avatar1.jpg" alt="" /></a>
									</div>
									<div class="comment_right">
										<div class="comment_info clearfix">
											<div class="pull-left comment_author">Stanislav Kerimov</div>
											<div class="pull-left comment_inf_sep">|</div>
											<div class="pull-left comment_date">13 January 2014</div>
										</div>
										<p>Thank you so much for putting this together Jeremy. Most of these seem like common sense but it is amazing how many times I see new employees having the worst days of their life because managers/leaders don’t want to be “bothered” with the new guy.</p>
									</div>
								</li>
								<li class="clearfix" data-animated="fadeInUp">
									<div class="pull-left avatar">
										<a href="javascript:void(0);" ><img src="images/avatar2.jpg" alt="" /></a>
									</div>
									<div class="comment_right">
										<div class="comment_info clearfix">
											<div class="pull-left comment_author">Anna Balashova</div>
											<div class="pull-left comment_inf_sep">|</div>
											<div class="pull-left comment_date">10 January 2014</div>
										</div>
										<p>I would add under “keep the busy” to make sure that every team member is aware of the new team member starting, and even thought the first 1-2 days may be meet and greats, to have them up with access to everything they need to preform their tasks.</p>
									</div>
								</li>
							</ul>
						</div>
						<!-- //COMMENTS -->
						
						<hr class="margbot80">
						
						<!-- LEAVE A COMMENT -->
						<div class="leave_comment" data-animated="fadeInUp">
							<h3><b>Leave a</b> Comment</h3>
							
							<form id="comment_form" class="row" action="#" method="post">
								<div class="col-lg-4 col-md-4">
									<input type="text" name="name" value="Your Name *" onFocus="if (this.value == 'Your Name *') this.value = '';" onBlur="if (this.value == '') this.value = 'Your Name *';" />
									<input type="text" name="phone" value="E-mail *" onFocus="if (this.value == 'E-mail *') this.value = '';" onBlur="if (this.value == '') this.value = 'E-mail *';" />
									<input type="text" name="phone" value="Web site" onFocus="if (this.value == 'Web site') this.value = '';" onBlur="if (this.value == '') this.value = 'Web site';" />
									<div class="comment_note">All fields marked with an asterisk (*) are required</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<textarea name="message" onFocus="if (this.value == 'Your message *') this.value = '';" onBlur="if (this.value == '') this.value = 'Your message *';">Your message *</textarea>
									<input class="contact_btn pull-right" type="submit" value="Send message" />
								</div>
							</form>
						</div><!-- //LEAVE A COMMENT -->
					</div><!-- //BLOG BLOCK -->
					
					
					<!-- SIDEBAR -->
					<div class="sidebar col-lg-3 col-md-3 padbot50">
						
						<!-- META WIDGET -->
						<div class="sidepanel widget_meta">
							<ul>
								<li><a href="javascript:void(0);" >Advertising</a></li>
								<li><a href="javascript:void(0);" >Fashion & Trends</a></li>
								<li><a href="javascript:void(0);" >Media Projects</a></li>
								<li><a href="javascript:void(0);" >Small Business</a></li>
								<li><a href="javascript:void(0);" >Creative</a></li>
							</ul>
						</div><!-- //META WIDGET -->
						
						
						<!-- POPULAR POSTS WIDGET -->
						<div class="sidepanel widget_popular_posts">
							<h3><b>Popular</b> Posts</h3>
							
							<div class="recent_posts_widget clearfix">
								<div class="post_item_img_widget">
									<img src="images/blog/1.jpg" alt="" />
								</div>
								<div class="post_item_content_widget">
									<a class="title" href="blog.php" >How the Denver Broncos Cheerleaders Get in Shape for the Super Bowl</a>
									<ul class="post_item_inf_widget">
										<li>JANUARY 30  |  21:30</li>
									</ul>
								</div>
							</div>
							<div class="recent_posts_widget clearfix">
								<div class="post_item_img_widget">
									<img src="images/blog/2.jpg" alt="" />
								</div>
								<div class="post_item_content_widget">
									<a class="title" href="blog.php" >Barneys Spring Campaign Stars 17 Transgender Models</a>
									<ul class="post_item_inf_widget">
										<li>JANUARY 25  |  9:30</li>
									</ul>
								</div>
							</div>
							<div class="recent_posts_widget clearfix">
								<div class="post_item_img_widget">
									<img src="images/blog/3.jpg" alt="" />
								</div>
								<div class="post_item_content_widget">
									<a class="title" href="blog.php" >Dominic Cooper: I'm Nothing Like the Real James Bond</a>
									<ul class="post_item_inf_widget">
										<li>JANUARY 21  |  13:30</li>
									</ul>
								</div>
							</div>
						</div><!-- //POPULAR POSTS WIDGET -->
						
						<hr>
						
						<!-- POPULAR TAGS WIDGET -->
						<div class="sidepanel widget_tags">
							<h3><b>Popular</b> Tags</h3>
							<ul>
								<li><a href="javascript:void(0);" >Fashion</a></li>
								<li><a href="javascript:void(0);" >Shop</a></li>
								<li><a href="javascript:void(0);" >Color</a></li>
								<li><a href="javascript:void(0);" >Creative Agency</a></li>
								<li><a href="javascript:void(0);" >Theme</a></li>
								<li><a href="javascript:void(0);" >Dress</a></li>
								<li><a href="javascript:void(0);" >Wordpress</a></li>
							</ul>
						</div><!-- POPULAR TAGS WIDGET -->
						
						<hr>
						
						<!-- TEXT WIDGET -->
						<div class="sidepanel widget_text">
							<h3><b>About</b> Blog</h3>
							<p>I must admit this particular defense set me on edge a little bit, for two reasons. The first is that she’s being held to a completely different standard than male politicians are held to.</p>
						</div><!-- //TEXT WIDGET -->
					</div><!-- //SIDEBAR -->
				</div><!-- //ROW -->
			</div><!-- //CONTAINER -->
		</section><!-- //BLOG -->
	</div><!-- //PAGE -->

	
	<!-- CONTACTS -->
	<section id="contacts">
	</section><!-- //CONTACTS -->
	<!-- MAP -->
	<div id="map">
		<a class="map_hide" href="javascript:void(0);"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></a>
		<iframe src="http://maps.google.com/maps?f=q&amp;give%20a%20hand=s_q&amp;hl=en&amp;geocode=&amp;q=london&amp;sll=37.0625,-95.677068&amp;sspn=42.631141,90.263672&amp;ie=UTF8&amp;hq=&amp;hnear=London,+United+Kingdom&amp;ll=51.500141,-0.126257&amp;spn=0.026448,0.039396&amp;z=14&amp;output=embed" ></iframe>
	</div><!-- //MAP -->

</div>
</body>
</html>