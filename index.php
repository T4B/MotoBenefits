<?php
require 'core/init.php';
$general->logged_in_protect();

if (empty($_POST) === false) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Lo sentimos, necesitamos tu usuario y contraseña.';
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Lo sentimos, el usuario no existe';
	} else if ($users->email_confirmed($username) === false) {
		$errors[] = 'Necesitas activar tu cuenta. 
					 Por favor revisa tu correo.';
	} else {
		if (strlen($password) > 18) {
			$errors[] = 'La contraseña debe ser inferior a 18 dígitos y si espacios.';
		}
		$login = $users->login($username, $password);
		if ($login === false) {
			$errors[] = 'Lo sentimos el usuario/contraseña es inválido';
		}else {
			session_regenerate_id(true);// destruir sesión antigua y crear una nueva
			$_SESSION['id'] =  $login;
			header('Location: perfil.php');
			exit();
		}
	}
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Motobenefits - INICIO</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Motobenefits te recompensa">
<meta name="author" content="Motobenefits">

<!-- Standard Favicon--> 
<!--<link rel="shortcut icon" href="images/favicon/favicon.ico">-->

<!-- Standard iPhone Touch Icon--> 
<link rel="apple-touch-icon" sizes="57x57" href="images/touchicons/apple-touch-icon-57-precomposed.html" />
<!-- Retina iPhone Touch Icon -->
<link rel="apple-touch-icon" sizes="114x114" href="assets/touchicons/apple-touch-icon-114-precomposed.html" />
<!-- Standard iPad Touch Icon -->
<link rel="apple-touch-icon" sizes="72x72" href="assets/touchicons/apple-touch-icon-72-precomposed.html" />
<!-- Retina iPad Touch Icon -->
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
<link href="stylesheets/home07.css" rel="stylesheet">
<!-- Main Template Styles -->
<link href="stylesheets/main.css" rel="stylesheet">
<!-- Main Template Responsive Styles -->
<link href="stylesheets/main-responsive.css" rel="stylesheet">
<!-- Main Template Retina Optimizaton Rules -->
<link href="stylesheets/main-retina.css" rel="stylesheet">
<!-- LESS stylesheet for managing color presets -->
<link rel="stylesheet/less" type="text/css" href="less/demo-color-yellow.less">
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

<!-- MENÚ : INICIO -->


<!-- CONTENEDOR MAESTRO : INICIO -->
<section id="mastwrap" class="sliding">
	
	<!-- SLIDER : INICIO -->
	<header id="masthead" class="clearfix trans-header">
		<h1 class="logo">Motobenefits<br /><span class="spmarketing"><a href="mailto:motobenefits@sp-marketing.com">motobenefits@sp-marketing.com</a></span></h1>
	</header>
	<div id="intro" class="top-banner-caption-v6" data-stellar-background-ratio="1.7">
		<div class="vertical-center top-caps6">
			<h3><img src="images/logo_home.png" alt="" /></h3>
			<h1><span class="rotate">Hemos premiado a mas de 1000 EJECUTIVOS DE VENTA EN ESTE 2014</span></h1>
			<a class="btn btn-rounded btn-rounded-color2 scroll" href="#about">Ir</a>
		</div>
	</div>
	<!-- SLIDER : FIN -->
	
	<!-- GRACIAS A TÍ : INICIO -->
	<section id="about" class="about page-section add-top add-bottom-half">
		<section class="inner-section about-welcome">
			<section class="container">
				<div class="row">
					<article class="col-md-12 text-center">
						<div class="about-emblem">
							<img alt="" title="" src="images/logo_home_2.png"/>
						</div>
						<h1 class="super-heading animated" data-fx="flipInX">Gracias a tí, tenemos presencia en toda la República Mexicana y hemos premiado</h1>
						<h1 class="promo-heading animated" data-fx="pulse">a más de
							<strong class="text-rotator-fade color-high">
								<span class="rotate">1000 asesores de venta</span>
							</strong> 
							Hasta hoy
						</h1>
						<a class="btn btn-rounded btn-rounded-color2 scroll" href="#contact">Inicia la experiencia</a>
					</article>
				</div>
			</section>
		</section>
	</section>
	<!-- GRACIAS A TÍ : FIN -->
	
	<!-- CAMPAÑA DE REGISTRO : INICIO -->
	<section id="contact" class="contact page-section add-top add-bottom">
		<section class="inner-section">
			<section class="container">
				<div class="row">
					<article class="col-md-12 text-center">
						<h1 class="main-heading main-heading">Campaña de registro</h1>
						<p class="promo-text light-text">Estás a punto de vivir la experiencia que Motobenefits trae para ti.</p>
						<section class="text-center">
					    	<nav class="cl-effect-10 btn-dignity-animated">
								<a data-hover="REGISTRO" href="register.php"><span>REGISTRO</span></a>
								<a data-hover="INICIAR SESIÓN" data-toggle="modal" href="#modal1"><span>INICIAR SESIÓN</span></a>
							</nav>
							<!--<a style="color: white; font-weight: normal; text-align: left;" href="register_dist.php">Registro distribuidores</a>-->
						</section>
					</article>
				</div>
			</section>
		</section>
	</section>
	<!-- CAMPAÑA DE REGISTRO : FIN -->
	
</section>
<!-- CONTENEDOR MAESTRO : INICIO -->

<!-- FOOTER : INICIO -->
<footer id="mastfoot" class="mastfoot">
	<section class="inner-section footer-bottom">
		<section class="container">
			<div class="row">
				<article class="col-md10 text-center">
					<div class="credits">
						<p>Motobenefits. <br/>Copyright &copy; 2014<br /><a href="#" data-toggle="modal" data-target="#terms-txt" style="color: white;">Terminos y condiciones</a><br /><a href="http://www.motorola.com.mx/consumers/about-motorola-MX/About_Motorola-Legal-Terms_of_Use/About_Motorola-Legal-Terms_of_Use.html" target="_blank" style="color: white;">Terminos y condiciones - Motorola</a></p>
					</div>
				</article>
			</div>
		</section>
	</section>
</footer>
<!-- FOOTER : FIN -->

<!--login modal-->
<div id="modal1" class="modal fade modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h3 class="text-center" style="color:#FD9A29 !important;">Inicia tu sesión</h3>
      </div>
      <div class="modal-body" style="min-height: 400px;">
      	<div id="alerta" class="modal-body" style="color:red;">

      	</div>
      <?php 
      if(empty($errors) === false){
      	echo '<p>' . implode('</p><p>', $errors) . '</p>';	
      }
      ?>
          <form id="loginForm" method="post" action="javascript:irforma('loginForm','iniciar_sesion.php','alerta');" class="form col-md-12 center-block">
            <div class="form-group">
            <label for="user">Usuario</label>
              <input id="user" style="border: 1px solid #E9E9E9 !important; color:gray !important ;" type="text" name="username" class="form-control input-lg" placeholder="Usuario" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" onkeyup="this.value = this.value.toLowerCase();">
            </div>
            <div class="form-group">
            <label for="user">Contraseña</label>
              <input style="border: 1px solid #E9E9E9 !important; color:gray !important ;" type="password" name="password" class="form-control input-lg" placeholder="Contraseña">
            </div>
            <div class="form-group">
       
              <button id="enviar" class="btn btn-warning btn-lg btn-block">Iniciar Sesión</button>
              <p class="text-center" style="margin-top: 10px;"><a <a data-dismiss="modal" data-toggle="modal" style="color: gray;" href="#modal2">Olvidé mi contraseña</a></p>
            </div>
          </form>
      </div>	
      </div>
  </div>
  </div>
  
  <!--login modal recuperar-->
  <div id="modal2" class="modal fade modal-md" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 class="text-center" style="color:#FD9A29 !important;">Recupera tu contraseña</h3>
        </div>
        <div class="modal-body" style="min-height: 300px;">
        	<div id="alerta2" class="modal-body" style="color:red;">
  
        	</div>
            <form id="passForm" method="post" action="javascript:irforma('passForm','confirm-recover.php','alerta2');" class="form col-md-12 center-block">
              <div class="form-group">
                <input style="border: 1px solid #E9E9E9 !important; color:gray !important ;" type="email" name="email" class="form-control input-lg" placeholder="Ingresa tu email" onkeyup="this.value = this.value.toLowerCase();">
                <div class="form-group">
                <button id="enviar" class="btn btn-warning btn-lg btn-block">Recuperar contraseña</button>
                </div>
              </div>
            </form>
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
<script src="js/ajax.js"></script>
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
<!-- JS Custom Codes -->
<script src="javascripts/simple-text-rotator-init.js" ></script> 
<script src="javascripts/sudoslider-touch-init.js"></script>
<script src="javascripts/portfolio.js" ></script> 
<script src="javascripts/form-validation.js" ></script> 
<script src="javascripts/animate-init.js" ></script> 
<!-- Main JS File -->
<script src="javascripts/main.js" ></script> 



</body>
</html>