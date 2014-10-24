<?php 
include 'core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);
$tipo 	= htmlentities($user['tipo']);
$cvendedor 	= htmlentities($user['cvendedor']);
$image = $user['image_location'];
$reporte_meses=$users->perfil_ventas_mes($_SESSION['id'],6);
$tabla_modelos_vendidos=$users->perfil_ventas_modelo_mes($_SESSION['id'],7);

if($cvendedor === "1210592")
	{
	header('Location: alerta/index.html');
	}


$tipos_usuario=array('ALE' => TRUE,'GDM' => TRUE,'GNT' => TRUE,'ICA' => TRUE,'RED' => TRUE,'ROALCOM' => TRUE,'SIB' => TRUE,'CC' => TRUE,'DC' => TRUE );


if(!isset($tipos_usuario[$_SESSION['tipo']]))
{
		$ventas=$users->vendedor_pesos_modelo($_SESSION['id']);
		$porpagar=$users->pesos_por_pagar($_SESSION['id']);
		$pedidos=$users->genera_tabla_pagos($_SESSION['id']);
		$cobrar=$users->motivo_update($_SESSION['id']);	
}
else
{
		
		$pedidos=$users->genera_tabla_pagos($_SESSION['id']);
		$cobrar=$users->motivo_update($_SESSION['id']);	
		$porpagar=$users->pesos_por_pagar_distribuidor($_SESSION['id']);
		$ventas='
			<div class="col-md-12">
			           <div class="reportes2 text-center white">
			           	<table width="100% style=" auto;"="" margin:20px="">
			           		<thead>
			           			<tr>
			           				<th>TOTAL</th>
			           			</tr>
			           		</thead>
			           		<tbody>
					           <tr>
					           <td>Por pagar: $ '.number_format($porpagar,2,'.',',').'</td>
					           </tr>
			          
			          		 </tbody>
			           	</table>
			           </div>
			</div>
		';


}







?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Motobenefits - BIENVENIDO</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Motobenefits premia tu esfuerzo">

<!-- Standard Favicon--> 
<link rel="shortcut icon" href="images/favicon/favicon.ico">

<!-- Standard iPhone Touch Icon--> 
<link rel="apple-touch-icon" sizes="57x57" href="images/touchicons/apple-touch-icon-57-precomposed.html" />
<!-- Retina iPhone Touch Icon--> 
<link rel="apple-touch-icon" sizes="114x114" href="assets/touchicons/apple-touch-icon-114-precomposed.html" />
<!-- Standard iPad Touch Icon--> 
<link rel="apple-touch-icon" sizes="72x72" href="assets/touchicons/apple-touch-icon-72-precomposed.html" />
<!-- Retina iPad Touch Icon--> 
<link rel="apple-touch-icon" sizes="144x144" href="assets/touchicons/apple-touch-icon-144-precomposed.html" />

<!-- Bootstrap CSS Files -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link href="fonts/fonts.css" rel="stylesheet">
<!-- CSS files for plugins -->
<link href="stylesheets/pace.preloader.css" rel="stylesheet">
<link href="stylesheets/slidingmenu.css" rel="stylesheet">
<link href="stylesheets/simpletextrotator.css" rel="stylesheet" >
<link href="stylesheets/animated-buttons.css" rel="stylesheet" >
<link href="stylesheets/owl.carousel.css" rel="stylesheet">
<link href="stylesheets/owl.theme.css" rel="stylesheet">
<link href="stylesheets/prettyPhoto.css" rel="stylesheet">
<link href="stylesheets/magnific-popup.css" rel="stylesheet" > 
<link href="stylesheets/jquery.tweet.css" rel="stylesheet"/>
<!-- Animated Elements -->
<link href="stylesheets/animate.css" rel="stylesheet">
<link href="stylesheets/effects.css" rel="stylesheet">
<!-- Home Page Styles -->
<link href="stylesheets/home05.css" rel="stylesheet">
<!-- Main Template Styles -->
<link href="stylesheets/main.css" rel="stylesheet">
<!-- Main Template Responsive Styles -->
<link href="stylesheets/main-responsive.css" rel="stylesheet">
<!-- Main Template Retina Optimizaton Rules -->
<link href="stylesheets/main-retina.css" rel="stylesheet">
<!-- LESS stylesheet for managing color presets -->
<link rel="stylesheet/less" type="text/css" href="less/demo-color-blue.less">

<!-- tabla-->
<link rel="stylesheet" href="css/table.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/reporte.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/reporte_final.css" media="screen" type="text/css" />

<link href="styles/glDatePicker.default.css" rel="stylesheet" type="text/css">


<!-- LESS JS engine-->
<script src="less/less-1.5.0.min.js"></script>

 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
      <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->

<!-- Modernizr Library-->
<script src="javascripts/modernizr.custom.js"></script>

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
<!-- MENÚ MÓVIL : INICIO -->
<nav class="menu visible-xs visible-sm visible-md" id="sm">
	<div class="sm-wrap">
		<h1 class="sm-logo"><img src="images/logo_home.png" alt=""  width="90%"/></h1>
		<i class="icon-remove menu-close"></i>
		<a class="scroll" href="#perfil">PERFIL</a>
		<a class="scroll" href="#puntos">TU DINERO</a>
		<!--<a href="noticias.php">NOTICIAS</a>-->
		<!--<a href="trivia">TRIVIAS</a>-->
		<?php
			if(!isset($tipos_usuario[$_SESSION['tipo']]))
			{
				?>
					<a class="scroll" data-toggle="modal" href="#modal4">PROMOCIONES</a>
					<a class="scroll" data-toggle="modal" href="#modal3">TRIVIAS</a>
				<?php
			}


		?>
		
		<a class="scroll" data-toggle="modal" href="#modal2">Preguntas Frecuentes</a>
		<a href="logout.php">SALIR</a>
	</div>
	<div id="sm-trigger"></div>
</nav>
<!-- MENÚ MÓVIL : FIN -->

<!-- CONTENEDOR MAESTRO : INICIO -->
<section id="mastwrap" class="sliding">

<!-- MENÚ : INICIO -->
<header id="masthead" class="clearfix">

	<h1 class="logo standard-spacing">Motobenefits - BIENVENIDO<br /><span class="spmarketing"><a href="mailto:motobenefits@sp-marketing.com">motobenefits@sp-marketing.com</a></span></h1>
	<ul class="standard-nav visible-lg">
		<li><a id="intro-linker" class="scroll" href="#perfil">PERFIL</a></li>
		<li><a id="about-linker" class="scroll" href="#puntos">TU DINERO</a></li>
		<!--<li><a id="team-linker" href="noticias.php">NOTICIAS</a></li>-->
		<!--<li><a id="contact-linker" href="trivia">TRIVIAS</a></li>-->
		<?php
			if(!isset($tipos_usuario[$_SESSION['tipo']]))
			{
				?>
					<li><a id="contact-linker" class="scroll" data-toggle="modal" href="#modal3">TRIVIAS</a></li>
					<!--<li><a id="team-linker" href="promociones.php">PROMOCIONES</a></li>-->
					<li><a id="contact-linker" class="scroll" data-toggle="modal" href="#modal4">PROMOCIONES</a></li>
				<?php
			}


		?>
		<li><a id="contact-linker" class="scroll" data-toggle="modal" href="#modal2">Preguntas Frecuentes</a></li>
		<li><a id="contact-linker" href="logout.php">SALIR</a></li>
	</ul>
</header>
<!-- MENÚ : FIN -->

<!-- TEXTO SLIDER : INICIO -->
<div id="intro" class="top-banner-caption-v3">
	<div class="vertical-center top-caps3">
		<h3><img src="images/logo_home.png" alt="" /></h3>
		<!--<h3><span>ESTAS SON LAS ÚLTIMAS NOTICIAS QUE MOTOBENEFITS TIENE PARA TI</span></h3>-->
		<h1 ><span >VENDE, ACUMULA, GANA</span></h1>
		<section class="text-center">
	    	<nav class="cl-effect-10 btn-dignity-animated">
				<a data-hover="INICIA LA EXPERIENCIA" class="scroll" href="#perfil"><span>INICIA LA EXPERIENCIA</span></a>
			</nav>
		</section>
	</div>
</div>
<!-- TEXTO SLIDER : FIN -->

<!-- PERFIL : INICIO -->
<section id="perfil" class="about page-section add-top add-bottom-half">
	
	<section class="inner-section about-welcome">
		<section class="container">
			<div class="row">
				<article class="col-md-12 text-center">
					<div class="about-emblem">
					<span class="image-wrap" style="background: url('<?=$image?>') no-repeat center center;"></span>
					</div>
					<h1 class="super-heading animated" data-fx="flipInX"><?php echo $username; ?></h1>
					<h2 class="promo-heading animated" data-fx="pulse">TU SESIÓN ESTA ACTIVA</h2>
					<p class="promo-text">Estamos inmensamente agradecidos de que formes parte del programa Motobenefits.</p>
					<p class="promo-text">Recuerda que Motobenefits premia tu esfuerzo.</p>
				</article>
			</div>
		</section>
	</section>
	
	<section class="inner-section text-center add-top-half add-bottom-half">
    	<nav class="cl-effect-10 btn-dignity-animated">
			<a data-hover="Cambiar Contraseña" data-toggle="modal" href="#cambiar"><span>Cambiar Contraseña</span></a>
			<a data-hover="Editar Perfil" href="settings.php"><span>Editar Perfil</span></a>
		</nav>
	</section>
	
</section>
<!-- PERFIL : FIN -->

<!-- TUS PUNTOS : INICIO -->
<section id="puntos" class="services page-section" data-stellar-background-ratio="1.7">
	<section class="inner-section add-top-half">
		<section class="container">
			<div class="row">
				<article class="col-md-12 text-center animated" data-fx="flipInX">
					<h1 class="main-heading">TUS MOTOPESOS</h1>
				</article>

					<div class="col-md-12">
					  <?=$ventas?>
					</div>
					
					<div class="row">
									<div class="col-md-12 text-center">
											<div style="top: 20px !important;">
												<?=$reporte_meses?>
											</div>
									</div>
										
					</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 text-center">
						<table style="margin: 0 auto;" class="rwd-table midway-horizontal">
						  <tr>
						    <th>Fecha</th>
						    <th>Monto</th>
						    <th>Status</th>
						    <th>Motivo</th>
						  </tr>
						  <?=$pedidos?>
						</table>


				</div>
					
			</div>
		
		<?php
		
			if($porpagar!=0)
			{
				?>
					<div id="verificando">
						<a style="display: block; margin: 6px auto; max-width: 300px;" class="btn btn-rounded btn-rounded-color2" href="javascript:ir('verificacion_datos.php','verificando');" style="float: right;">Cobrar tus pesos</a>
					</div>
				<?php
			}
		?>
		<?php
			if($cobrar!=0)
			{
				?>
					<div id="verificando2">
						<a style="display: block; margin: 6px auto; max-width: 300px;" class="btn btn-rounded btn-rounded-color2" href="cobranza.php" style="float: right;">Editar datos de cobranza</a>
					</div>
				<?php
			}
		?>

		<p style="text-align: center; color: white; font-size: .8em;">*Tus Motopesos reflejados en la página están sujetos a cambios que solicite Nextel<br />Todo beneficio otorgado por Motobenefits perderá su valor cuando el ejecutivo deje de pertenecer a Comunicaciones Nextel S.A. de C.V.</p>	
		</section>
	</section>
</section>
<!-- TUS PUNTOS : FIN -->



<!-- CONTACTO : INICIO -->
<section id="contacto" class="contact page-section add-top add-bottom">

	<!-- inner-section : starts -->
	<section class="inner-section">
	
	<!-- container : starts -->
	<section class="container">

		<div class="row">
			<article class="col-md-12 text-center">
				<h1 class="main-heading main-heading">Contáctanos</h1>
				<!--<div class="liner"><span></span></div>-->
				<p class="promo-text light-text">motobenefits@sp-marketing.com</p>				
				<p class="promo-text light-text">Celular: +52 1 55 6299-8494</p>
				<p class="promo-text light-text">Nextel ID: 92*657750*12</p>
				
				<!--<p class="promo-text light-text">Nextel Número: +52 55 6299-7998</p>-->
				<p class="promo-text light-text">Estaremos felices de resolver tus dudas.</p>
			</article>
		</div>

		<div class="row">
			<article class="col-md-12 liner-division-light">
			</article>
		</div>



	</section>
	<!-- container : ends -->



	</section>
	<!-- inner-section : ends -->




</section>
<!-- CONTACTO : FIN -->


<!-- FOOTER : INICIO -->
<footer id="mastfoot" class="mastfoot">
	<section class="inner-section footer-bottom">
		<section class="container">
			<div class="row">
				<article class="col-md10 text-center">
				<?
				if($tipo == 'Vendedor Canal Alterno'){
				?>
					<ul class="footer-social"></ul>
				<?
				}else{
				?>
				<ul class="footer-social">
					<li><a href="https://www.facebook.com/programa.motobenefits" target="_blank"><img alt="" title="" src="images/footer/03.png"/></a></li>
				</ul>
				<?
				}
				?>
					<div class="credits">
						<p>Motobenefits. <br/>Copyright &copy; 2014<br /><a href="#" data-toggle="modal" data-target="#terms-txt" style="color: white;">Terminos y condiciones</a><br /><a href="http://www.motorola.com.mx/consumers/about-motorola-MX/About_Motorola-Legal-Terms_of_Use/About_Motorola-Legal-Terms_of_Use.html" target="_blank" style="color: white;">Terminos y condiciones - Motorola</a></p>
					</div>
				</article>
			</div>
		</section>
	</section>
</footer>
<!-- FOOTER : FIN -->

</section>


<!--cambiar contrasena modal-->
<div id="cambiar" class="modal fade modal-md" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3 class="text-center" style="color:#FD9A29 !important;">Cambiar contraseña</h3>
      </div>
      <div class="modal-body" style="min-height: 300px;">
      	<div id="alerta" class="modal-body" style="color:red !important;">

      	</div>
     
          <form action="javascript:irforma('laforma','change-password.php','alerta');" method="post" id="laforma">
                <div class="form-group">
                  <input style="border: 1px solid #E9E9E9 !important; color:gray !important ;"  type="password" name="current_password" class="form-control input-lg" placeholder="Contraseña actual">
                </div>
                <div class="form-group">
                  <input style="border: 1px solid #E9E9E9 !important; color:gray !important ;"  type="password" name="password" class="form-control input-lg" placeholder="Nueva contraseña">
                </div>   
                <div class="form-group">
                  <input style="border: 1px solid #E9E9E9 !important; color:gray !important ;"  type="password" name="password_again" class="form-control input-lg" placeholder="Nueva contraseña">
                </div>                      
                <button type="submit" class="btn btn-warning btn-lg btn-block">Cambiar contraseña</button>
                
            </form>
      </div>	
      </div>
  </div>
  </div>
<!-- CONTENEDOR MAESTRO : FIN -->

<!--login modal recuperar-->
<div id="modal2" class="modal fade modal-md" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3 class="text-center" style="color:#FD9A29 !important;">Preguntas Frecuentes</h3>
      </div>
      <div class="modal-body">
      <h5>¿Cómo se determina la puntuación que obtengo?</h5>
      <p class="gray">La puntuación es determinada de acuerdo a las ventas realizadas en el mes, Nextel proporciona las ventas en un máximo de tres semanas después del cierre.</p>
      <h5>¿Cuándo es el cierre de cada periodo?</h5>
      <p class="gray">Los periodos tienen una duración de un mes natural por lo que los cierres serán el último día de cada mes.</p>
      <h5>¿Cuántos puntos obtengo por cada cierre de ventas?</h5>
      <p class="gray">En tu calculadora personal podrás revisar la puntuación de cada equipo.</p>
      <h5>¿Cuándo puedo revisar mis puntos?</h5>
      <p class="gray">Tres semanas después del último cierre de mes.</p>
      <h5>¿Se toma en cuenta el cierre del contrato o la activación del equipo?</h5>
      <p class="gray">Se tomarán en cuenta sólo las activaciones de equipo realizadas en el mes.</p>
      <h5>Si yo realizo un cierre de contrato al final de un mes pero la activación se realiza en el siguiente, ¿en qué mes me toman en cuenta la venta?</h5>
      <p class="gray">Si la activación resulta válida se tomará en cuenta en el mes en el que se haya llevado a cabo, NO en el del cierre de contrato.</p>
      <h5>¿Cuándo recibo mi depósito?</h5>
       <p class="gray">Dos a tres semanas después de solicitar tu cobro online vía la página de Motobenefits.</p>
      <h5>¿Qué datos o documentos necesito para hacer válido mi beneficio?</h5>
      <p class="gray">Necesitamos que nos des:</p>
      <li class="gray">CURP sólo el número</li>
      <li class="gray">RFC sólo el número</li>
      <li class="gray">IFE Escaneada por ambos lados</li>
      <li class="gray">Clabe interbancaria Sólo el número 18 números (no es el número de  cuenta)</li>
      <li class="gray">En caso de tener cuenta en Banco Santander los once dígitos de tu número de cuenta.</li>
      <p class="gray">Toda la información recopilada será protegida y no será utilizada para otros fines (leer términos y condiciones)</p>
      <h5>¿Cómo puedo actualizar los datos de mi perfil?</h5>
      <p class="gray">Da clíc  la pestaña de perfil y ahí encontrarás las opciones de cambio de contraseña y Edición de perfil.</p>
      <h5>¿Cómo sé si resulté ser ganador de los boletos de la trivia?</h5>
      <p class="gray">Las primeras 15 personas que respondan correctamente la trivia serán los ganadores, si ganaste recibirás un correo con las instrucciones para reclamar tu premio.</p>
      <h5>¿Dónde puedo consultar mi puntuación?</h5>
      <p class="gray">Sólo tienes que dar clíc en la pestaña “TÚ DINERO”</p>
      
      
      </div>	
      </div>
  </div>
  </div>
  
  <!--login modal recuperar-->
  <div id="modal3" class="modal fade modal-md" style="min-width: 400px;" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 class="text-center" style="color:#FD9A29 !important;">Ganadores trivia Motobenefits</h3>
        </div>
        <div class="modal-body">
        <img src="images/ganadores/ganadores.jpeg" width="100%" alt="" />
        
        
        </div>	
        </div>
    </div>
    </div>
    
    
    <div id="modal4" class="modal fade modal-md" style="min-width: 400px;" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3 class="text-center" style="color:#FD9A29 !important;">Próximamente nuevas promociones</h3>
          </div>
          <div class="modal-body">
          <a href="https://www.facebook.com/programa.motobenefits" target="_blank"><img src="images/face.jpg" width="100%" alt="" /></a>
          
          
          </div>	
          </div>
      </div>
      </div>
  
  
  <!-- Modal Terminos -->
  	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
  	  <div class="modal-dialog modal-lg">
  	    <div class="modal-content">
  	      <div class="modal-header">
  	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  	        <h4 class="modal-title" id="termsLabel">Términos y condiciones</h4>
  	      </div>
  	      <div class="modal-body">
  	        <h4>Aviso de privacidad</h4>
  	        <p class="gray">Conforme a lo previsto en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, hacemos de su conocimiento, que SP MERCADOTECNIA EN MÉXICO S.A de C.V., con domicilio en Margaritas 19, Col. Florida C.P 01030 en México D.F, es responsable de recabar sus datos personales y del uso, seguridad y confidencialidad que se le dé a los mismos.</p>	        
  	        <p class="gray"><b>I Finalidad de solicitar sus Datos Personales</b></p>
  	        <p class="gray">Los fines para los que recabamos y utilizamos sus datos personales son:</p>
  	        <p class="gray"><li>Participar en promociones, premios y concursos que organice nuestros clientes,</li>
  	        <li>Recibir electrónicamente información,</li>
  	        <li>Para las activaciones de los monederos electrónicos,</li>
  	        <li>Para la entrega de premios a los ganadores.</li></p>
  	        <p class="gray"><b>II Medios para recabar los Datos Personales</b></p>
  	        <p class="gray">Para las finalidades señaladas, podemos recabar sus datos personales por diferentes medios:</p>
  	        <li>Mediante el uso de correos electrónicos,</li>
  	        <li>Mediante el uso de formularios electrónicos de Google Drive</li>
  	        <li>Cuando usted nos los proporciona directamente,</li>
  	        <li>Cuando se comunica vía telefónica con nosotros,</li>
  	        <li>Cuando visita nuestro sitio de Internet o utiliza nuestros servicios en línea,</li>
  	        <li>Mediante el uso de herramientas de captura automática de datos,</li>
  	        <h4>III Datos Personales que se solicitan</h4>
  	        <p class="gray">Los datos personales que se solicitan, dependiendo las finalidades para las que se recaban, son: Nombre, Dirección, Teléfono fijo y/o celular, ID de su línea Nextel, Email, RFC, CURP, Fecha de Nacimiento, Ciudad y Estado donde reside.</p>
  	        <h4>IV Derechos ARCO</h4>
  	        <p class="gray">Usted tiene derecho de Acceder a sus datos personales que poseemos y a los detalles del tratamiento de los mismos, así como, a Rectificarlos en caso de ser inexactos o incompletos; Cancelarlos cuando considere que no se requieren para alguna de las finalidades señalados en el presente aviso de privacidad, estén siendo utilizados para finalidades no consentidas o haya finalizado la relación contractual o de servicio, o bien, Oponerse al tratamiento de los mismos para fines específicos.</p>
  	         
  	         
  	        <h4>V Responsable de los Datos Personales</h4>
  	        <p class="gray">Hemos designado al departamento Jurídico como responsable de la custodia de los Datos Personales, el cual dará trámite a las solicitudes y fomentará la protección de los Datos Personales al interior de la empresa.</p>
  	        <p class="gray">Las formas de contacto son:
  	        <li>Domicilio: Margaritas 19, Col. Florida C.P 01030 en México D.F</li>
  	        <li>Teléfono: 01 (55) 43417659</li>
  	        <li>Correo electrónico:     manuel.martinez@spgmexico.com<br />
  	        angelica.simon@spgmexico.com<br />
  	        legales@spgmexico.com</li>
  </p>	           <h4>VI  Como ejercer sus derechos ARCO</h4>
  	        <p class="gray">Los mecanismos que se han implementado para el ejercer estos derechos son a través de la presentación de una solicitud que deberá contener por lo menos lo siguiente:</p>	       
  	       <p class="gray"> <li>Nombre completo, dirección, correo electrónico, teléfono fijo y/o celular del titular de los Datos Personales, u otro medio para comunicarle la respuesta a su solicitud.</li>
  	        <li>Documentos que acrediten la identidad o la representación legal del titular de los Datos Personales.</li>
  	        <li>Descripción clara y precisa de los Datos Personales respecto de los que se busca ejercer alguno de los derechos antes mencionados.</li>
  	        <li>Cualquier otro elemento o documento que facilite la localización de los Datos Personales.</li>
  	       <li> Indicar de las modificaciones a realizarse y/o las limitaciones al uso de los Datos Personales, conforme a lo establecido en el apartado 6.2. del presente Aviso de Privacidad.</li>
  	        <li>Aportar la documentación que sustente su petición.</li></p>
  	        <p class="gray">Nos comprometemos a comunicar al titular de los Datos Personales la determinación adoptada, en un plazo no mayor a 20 días hábiles contados desde la fecha en que se recibió la solicitud. Este plazo podrá ser ampliado en una sola ocasión por un periodo igual, siempre y cuando así lo justifiquen las circunstancias del caso.</p>
  	        <p class="gray">Con base en lo anterior, y de acuerdo con lo establecido en la Ley, informaremos al titular de los Datos Personales el sentido y motivación de la resolución, por el mismo medio por el que se llevó a cabo la solicitud, y acompañará dicha resolución de las pruebas pertinentes, en su caso.</p>
  	        <p class="gray">Cuando la solicitud sea procedente, se hará efectiva dentro de los 15 días hábiles siguientes a la comunicación de la resolución adoptada.</p>
  	        <p class="gray">El titular podrá presentar ante el Instituto Federal de Acceso a la Información (IFAI) una solicitud de protección de datos por la respuesta recibida o falta de respuesta de nosotros. Dicha solicitud deberá presentarse por el titular dentro de los 15 días hábiles siguientes a la fecha en que se comunique la respuesta al titular por parte de nosotros, y se sujetará a lo previsto en la Ley.</p>
  	        <p class="gray">En caso de solicitudes de acceso a Datos Personales, será necesario que el solicitante o su representante legal acrediten previamente su identidad.</p>
  	        <p class="gray">La obligación de acceso a la información se dará por cumplida cuando pongamos a disposición del titular los Datos Personales o mediante la expedición de copias simples o documentos electrónicos.</p>
  	        <p class="gray">En el supuesto en que una persona solicite el acceso a sus Datos Personales presumiendo que éste es el responsable y resultara que no lo es, bastará con que así se lo indiquemos al titular por cualquier medio, (de los establecidos en este apartado), para tener por desahogada la solicitud.</p>
  	        <p class="gray">Podremos negar el acceso total o parcial a los Datos Personales o a la realización de la rectificación, cancelación u oposición al tratamiento de los mismos, en los siguientes supuestos:</p>
  	        <p class="gray"><li>Cuando el solicitante no sea el titular o el representante legal no esté acreditado para ello.</li>
  	        <li>Cuando en nuestra Base de Datos no se encuentren los Datos Personales del solicitante.</li>
  	        <li>Cuando se lesionen los derechos de un tercero.</li>
  	        <li>Cuando exista impedimento legal o resolución de una autoridad.</li>
  	        <li>Cuando la rectificación, cancelación u oposición haya sido previamente realizada, de manera que la solicitud carezca de materia.</li></p>
  	        <h4>VII Transferencia de Datos</h4>
  	        <p class="gray">En caso, de que llegáramos a transferir sus Datos Personales a alguno de nuestros clientes con el fin de llevar a cabo las Finalidades del tratamiento establecidas en el presente Aviso de Privacidad, se  hará previa celebración de convenios de confidencialidad, siempre y cuando el cliente o persona a quien se le transmitan, acepte someter el tratamiento de los Datos Personales al presente Aviso de Privacidad,</p>
  	        <p class="gray">Si usted no manifiesta su oposición para que sus Datos Personales sean transferidos a terceros, se entenderá que ha otorgado su consentimiento para ello.</p>
  	        <p class="gray">Nos comprometemos a no transferir su información personal a terceros sin su consentimiento, salvo las excepciones previstas en el artículo 37 de esta Ley.</p>
  	        <h4>VIII Uso de Cookies</h4>
  	        <p class="gray">El prestador por su propia cuenta o la de un tercero contratado para la prestación de servicios de medición, pueden utilizar cookies cuando un usuario navega por el sitio web. Las cookies son ficheros enviados al navegador por medio de un servidor web con la finalidad de registrar las actividades del usuario durante su tiempo de navegación.</p>
  	        <p class="gray">Las cookies utilizadas por el sitio web se asocian únicamente con un usuario anónimo y su ordenador, y no proporcionan por sí mismas los datos personales del usuario.</p>
  	        <p class="gray">Mediante el uso de las cookies resulta posible que el servidor donde se encuentra la web, reconozca el navegador web utilizado por el usuario con la finalidad de que la navegación sea más sencilla, permitiendo, por ejemplo, el acceso a los usuarios que se hayan registrado previamente, acceder a las áreas, servicios, promociones o concursos reservados exclusivamente a ellos sin tener que registrarse en cada visita. Se utilizan también para medir la audiencia y parámetros del tráfico, controlar el progreso y número de entradas.</p>
  	        <p class="gray">El usuario tiene la posibilidad de configurar su navegador para ser avisado de la recepción de cookies y para impedir su instalación en su equipo. Por favor, consulte las instrucciones y manuales de su navegador para ampliar esta información.</p>
  	        <p class="gray">Para utilizar el sitio web, no resulta necesario que el usuario permita la instalación de las cookies enviadas por el sitio web, o el tercero que actúe en su nombre, sin perjuicio de que sea necesario que el usuario inicie una sesión como tal en cada uno de los servicios cuya prestación requiera el previo registro o “login”.</p>
  	        <p class="gray">Las cookies utilizadas en este sitio web tienen, en todo caso, carácter temporal con la única finalidad de hacer más eficaz su transmisión ulterior. En ningún caso se utilizarán las cookies para recoger información de carácter personal.</p>
  	        <h4>IX DIRECCIONES IP</h4>
  	        <p class="gray">Los servidores del sitio web podrán detectar de manera automática la dirección IP y el nombre de dominio utilizados por el usuario. Una dirección IP es un número asignado automáticamente a un ordenador cuando ésta se conecta a Internet. Toda esta información es registrada en un fichero de actividad del servidor debidamente inscrito que permite el posterior procesamiento de los datos con el fin de obtener mediciones únicamente estadísticas que permitan conocer el número de impresiones de páginas, el número de visitas realizadas a los servicios web, el orden de visitas, el punto de acceso, etc.</p>
  	        <h4>X Cambios en el Aviso de Privacidad</h4>
  	        <p class="gray">Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas, políticas internas o nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos.</p>
  	        <p class="gray">Estas modificaciones estarán disponibles al público a través de anuncios, trípticos o folletos  visibles en nuestros establecimientos o centros de atención, en nuestra página de Internet o se las haremos llegar al último correo electrónico que nos haya proporcionado.</p>
  	        <p class="gray">Fecha última actualización: 10 de junio 2013</p>
  	        <h4>XI Consideración final</h4>
  	        <p class="gray">El contenido de este Aviso de Privacidad es de carácter informativo, por lo que en caso de que desees expresar su aceptación o rechazo al contenido del mismo, o ya no desea seguir recibiendo información electrónica de nosotros a través de nuestro portal en línea, lo invitamos a que envíe la solicitud correspondiente directamente al responsable de los Datos Personales que se indica en el apartado  V de este documento.</p>
  	        <p class="gray">Así también, si usted considera que su derecho de protección de datos personales ha sido lesionado por alguna conducta de nuestros empleados o de nuestras actuaciones o respuestas, presume que en el tratamiento de sus datos personales existe alguna violación a las disposiciones previstas en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, no dude en contactar a nuestro responsable de Datos Personales quién tiene la obligación de atender su queja y dar respuesta oportuna a la resolución de la misma.</p>	        
  	      </div>
  	      <div class="modal-footer">
  	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  	      </div>
  	    </div><!-- /.modal-content -->
  	  </div><!-- /.modal-dialog -->
  	</div><!-- /.modal -->
  	
  	
  	
  

<!-- Librerias JS -IMPORTANTE- -->
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" ></script> 
<script src="js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.field.js"></script>
<script type="text/javascript" src="js/jquery.calculation.js"></script>
<script src="js/calculadora.js" type="text/javascript"></script>

<!-- JS Plugins -IMPORTANTE- -->
<script src="javascripts/pace.min.js"></script>
<script src="javascripts/retina.js" ></script> 
<script src="javascripts/classie.js" ></script> 
<script src="javascripts/slidingmenu.js" ></script> 
<script src="javascripts/jquery.simple-text-rotator.js" ></script> 
<script src="javascripts/waypoints.min.js"></script>
<script src="javascripts/jquery.touchSwipe.js"></script>
<script src="javascripts/jquery.sudoSlider.designova.js"></script>
<script src="javascripts/owl.carousel.js"></script>
<script src="javascripts/jquery.mixitup.js"></script>
<script src="javascripts/flexslider.js" ></script> 
<script src="javascripts/prettyPhoto.js" ></script> 
<script src="javascripts/jquery.magnific-popup.js"></script> 
<script src="javascripts/jquery.tweet.js"></script>
<script src="javascripts/jquery.stellar.js"></script>
<script src="javascripts/smooth-scroll.js"></script>
<script src="javascripts/jquery.appear.js"></script>
<script src="javascripts/mb.bgndGallery.js"></script>
<!-- JS Custom Codes -->
<script src="javascripts/simple-text-rotator-init.js" ></script> 
<script src="javascripts/sudoslider-touch-init.js"></script>
<script src="javascripts/portfolio.js" ></script> 
<script src="javascripts/form-validation.js" ></script> 
<script src="javascripts/animate-init.js" ></script> 
<script src="javascripts/standard-nav-init.js" ></script> 
<script src="javascripts/bgslider-slide-up-init.js" ></script> 
<!-- Main JS File -->
<script src="javascripts/main.js" ></script> 


</body>
</html>
