<?php 
include 'core/init.php';
$general->logged_out_protect();
?>
<!DOCTYPE html>
<html lang="en" class="demo-2 no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Motobenefits | Te lleva al mundial Brasil 2014</title>
		<meta name="description" content="Hover Effects with animated SVG Shapes using Snap.svg" />
		<meta name="keywords" content="animated svg, hover effect, grid, svg shape html, " />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" href="../assets/css/reset.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/snap.svg-min.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
		<script language="javascript" src="tweet/jquery.tweet.js" type="text/javascript"></script>
		<script type='text/javascript'>
		    jQuery(function($){
		        $(".tweet").tweet({
		            username: "FifaWorldCup",
		            join_text: "auto",
		            avatar_size: 24,
		            count: 1,
		            auto_join_text_default: "we said,", 
		            auto_join_text_ed: "we",
		            auto_join_text_ing: "we were",
		            auto_join_text_reply: "we replied to",
		            auto_join_text_url: "we were checking out",
		            loading_text: "cargando tweets..."
		        });
		    });
		</script>
		<link href="tweet/jquery.tweet.css" media="all" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap CSS Files -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- Home Page Styles -->
		<link href="stylesheets/home05.css" rel="stylesheet">
		<!-- Main Template Styles -->
		<link href="stylesheets/main.css" rel="stylesheet">
		
		<style>
		p {
			font-family: Helvetica, Arial, sans-serif;
		}
		/* Color Top */
		#color_top{
			width: 100%;
			height: 4px;
			display: block;
			clear: both;
			left: 0;
			right: 0;
			top: 0;
			position: relative;
		}
		
		#color_top ul li{
			width: 10%;
			height: 4px;
			display: block;
			float: left;
		}
		
		#close{
			position: absolute;
			margin-top: -150px;
			right: 40px;
		}
		
		#close a{
			color: gray;
		}
		
		/* Asignaturas de Color */
		.c1{
			background: #fd5154;
		}
		.c2{
			background: #fc9026;
		}
		.c3{
			background: #fef135;
		}
		.c4{
			background: #b8f632;
		}
		.c5{
			background: #2af895;
		}
		.c6{
			background: #26e1e1;
		}
		.c7{
			background: #fd5154;
		}
		.c8{
			background: #fc9026;
		}
		.c9{
			background: #fef135;
		}
		.c10{
			background: #b8f632;
		}
		/* Asignaturas de Color */
		
		/* Logo */
		#logo{
			max-width: 241px;
			max-height: 143px;
			display: block;
			position: relative;
			margin: 15px auto;
		}
		
		/* Menu */
		#menu{
			width: 100%;
			height: 40px;
			display: block;
			position: relative;
			background-color: #095F12;">; /* layer fill content */
		}
		
		#menu h1{
			color: #fff !important; /* text color */
			font-family: "Titillium Web",Helvetica,Arial;
			text-shadow: 0 1px 1px rgba(0,0,0,.35); /* drop shadow */
			font-size: 20px;
			position: relative;
			margin: 0 auto;
			text-align: center;
			padding-top: 10px;
			display: block;
		}
		
		#menu h1 b{
			font-weight: bold;
			font-family: "Titillium Web",Helvetica,Arial;
		}
		</style>
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-41545798-1', 'moto-benefits.com.mx');
		  ga('send', 'pageview');
		
		</script>
		
		
	</head>
	<body>
	<!--contenidos privado-->
		<div class="container">
			<a href="../perfil.php">
				<div id="menu">
					<h1><b>Regresar</b></h1>
				</div>
			</a>
			<div id="color_top">
				<ul>
					<li class="c1"></li>
					<li class="c2"></li>
					<li class="c3"></li>
					<li class="c4"></li>
					<li class="c5"></li>
					<li class="c6"></li>
					<li class="c7"></li>
					<li class="c8"></li>
					<li class="c9"></li>
					<li class="c10"></li>
				</ul>
			</div>
			
			
			
			<div id="logo">
					<a href="http://moto-benefits.com.mx/"><img id="logo_h" src="logo_home.png" alt="" /></a>
			</div>
			
			<section id="promociones" class="page-section add-bottom-half">
			<div class="col-md-12 text-center add-bottom-half"><h1><b style="font-weight: bold; color: #095F12;">Promociones</b></h1></div>
				<section class="inner-section">
					<section class="container">
						<div class="row">
							<div class="col-md-12">
								<!--<div style="text-align: center;" class="col-md-6"><a class="scroll" data-toggle="modal" href="#modal1"><span class="image-wrap" style="background: url('images/ARTE1_s.jpg') no-repeat center center;"></span></a></div>-->
								<div style="text-align: center;" class="col-md-6"><a class="scroll" data-toggle="modal" href="#modal2"><span class="image-wrap" style="background: url('images/ARTE2_s.jpg') no-repeat center center;"></span></a></div>
								<div style="text-align: center;" class="col-md-6"><a class="scroll" data-toggle="modal" href="#modal3"><span class="image-wrap" style="background: url('images/ARTE3_s.jpg') no-repeat center center;"></span></a></div>
							</div>
						</div>
					</section>
				</section>
			</section>
			
			
			</section>
			
			  	
			  	
			 <!--login modal recuperar-->
			 <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			   <div class="modal-dialog">
			   <div class="modal-content">
			       <div class="modal-body">
			       <img width="100%" src="images/ARTE1.jpg" alt="" />
			       </div>	
			       </div>
			   </div>
			   </div>
			   
			  
			  <!--login modal recuperar-->
			  <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			    <div class="modal-dialog">
			    <div class="modal-content">
			        <div class="modal-body">
			        <img width="100%" src="images/ARTE2.jpg" alt="" />
			        </div>	
			        </div>
			    </div>
			    </div>
			    
			    <!--login modal recuperar-->
			    <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			      <div class="modal-dialog">
			      <div class="modal-content">
			          <div class="modal-body">
			          <img width="100%" src="images/ARTE3.jpg" alt="" />
			          </div>	
			          </div>
			      </div>
			      </div>
			
			
			<header class="codrops-header">
			<h1>Copa mundial de la FIFA Brasil 2014</h1>
			
			<h1 ><span><div id="twitter-feed">
			<p>Tweets recientes de la FIFA</p>
			<!--<div class="tweet"></div>-->
			<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/FifaWorldCup" data-widget-id="434009670546497536">Tweets by @FifaWorldCup</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			
			
			
			
			</div></span></h1>
				<div id="" style="width: 100%; max-height: 400px; margin: 0 auto;"><img src="img/back.png" alt="" width="70%" /></div>
				
				<h1 style="font-size: 15px; color:#48C92A;">*Acumula el mayor número de ventas de Noviembre 2013 a Abril 2014</h1>
				<h1 style="font-size: 15px; color:#48C92A;">**Viaje incluye: vuelo redondo, hospedaje 5 dias 4 noches en crucero de lujo
				y entrada a un partido de México y un partido regular.</h1>
				
				<h1 class="add-top-half" >MOTOBENEFITS TRAE PARA TÍ LAS <br /><b style="font-weight: bold; color: #095F12;">ÚLTIMAS NOTICIAS</b></h1>
			</header>
			<section id="grid" class="grid clearfix">
				<a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
					<figure>
						<img src="img/1.jpg" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2>Elijah King</h2>
							<p>Elijah King gana el concurso SuperSong</p>
							<button onclick="window.location.href='http://es.fifa.com/worldcup/news/newsid=2276996/index.html'">ver</button>
						</figcaption>
					</figure>
				</a>
				<a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
					<figure>
						<img src="img/2.jpg" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2>en México</h2>
							<p>El Trofeo deja huella en México</p>
							<button onclick="window.location.href='http://es.fifa.com/worldcup/organisation/trophy-tour/news/newsid=2276916/index.html'">ver</button>
						</figcaption>
					</figure>
				</a>
				<a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
					<figure>
						<img src="img/3.jpg" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2>Neuer:</h2>
							<p>"Estamos entre los favoritos"</p>
							<button onclick="window.location.href='http://es.fifa.com/world-match-centre/nationalleagues/nationalleague=germany-bundesliga-2000000019/news/newsid/227/597/0/index.html'">ver</button>
						</figcaption>
					</figure>
				</a>
				<a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
					<figure>
						<img src="img/4.jpg" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2>Hurst:</h2>
							<p>"Los jóvenes son el corazón del equipo"</p>
							<button onclick="window.location.href='http://es.fifa.com/worldcup/news/newsid=2276040/index.html'">ver</button>
						</figcaption>
					</figure>
				</a>
				
			</section>
			<section class="related">
				<p style="color: #095F12;">Si has disfrutado de estos datos de interés, puede que también te gusten los siguientes enlaces:</p>
				<div style="font-size: 15px;"><a href="http://www.fifa.com/worldcup/"><h4>FIFA WORLD CUP</h4></a></div>
				<div style="font-size: 15px;"><a href="https://twitter.com/FifaWorldCup"><h4>FIFA Twitter</h4></a></div>
				<p style="color: #095F12;">Todas las imágenes, marcas, abreviaturas, etc. pertenecen a su respectivos dueños y nosotros solamente hacemos uso de ellas en calidad de cita y/o como expresión de la actualidad, tal y como autorizan los art 32 y 33 LPI.</p>
			</section>
		</div>
		
				
		<!--login modal recuperar-->
		<!-- /container -->
		<script>
			(function() {
	
				function init() {
					var speed = 330,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
<!--//contenido privado-->	
<!-- Librerias JS -IMPORTANTE- -->
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" ></script> 
	</body>
</html>