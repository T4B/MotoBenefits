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
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="es"> <![endif]-->
<html lang="en">
<!--<![endif]-->

<head>

<!-- Basic Page Needs -->
<meta charset="utf-8" />
<title>Registro Motobenfits</title>
<meta name="description" content="" />


<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- CSS -->
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/style2.css" rel="stylesheet" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="check_radio/skins/square/aero.css" rel="stylesheet" />

<!-- Toggle Switch -->
<link rel="stylesheet" href="css/jquery.switch.css" />


<!-- Google web font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css' />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Jquery -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-ui-1.8.12.min.js"></script>

<!-- Wizard-->
<script src="js/jquery.wizard.js"></script>

<!-- Radio and checkbox styles -->
<script src="check_radio/jquery.icheck.js"></script>

<!-- HTML5 and CSS3-in older browsers-->
<script src="js/modernizr.custom.17475.js"></script>

<!-- Support media queries for IE8 -->
<script src="js/respond.min.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41545798-1', 'moto-benefits.com.mx');
  ga('send', 'pageview');

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>


<body>	
	
	<section id="top-area">
		<header>
	         <div class="container">
	         </div><!-- End container -->
	        </header> <!-- End header -->
	        	
	            <div class="container">
	             <div class="row">
	                 <div class="col-md-12 main-title">
	                 <h1>Registro de usuario</h1>
	                </div>
	       		</div>
	            </div>
	 </section>   
	
	
	<section class="container" id="main">

		<div id="survey_container">
		
			<div id="top-wizard">
				<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo '<strong>Registro exitoso. Por favor revisa tu correo.</strong>';
				  ?>
				 <span id="counter" style="visibility: hidden;">5</span>
				 
				 <script type="text/javascript">
				 function countdown() {
				     var i = document.getElementById('counter');
				     if (parseInt(i.innerHTML)<=0) {
				         location.href = 'index.php';
				     }
				     i.innerHTML = parseInt(i.innerHTML)-1;
				 }
				 setInterval(function(){ countdown(); },1000);
				 </script>
				  
				<?php  
				}else{
				?>
				<strong>Progreso <span id="location"></span></strong>
				<div id="progressbar"></div>
				<?php
				}
				?>
				<div style="background-color: #DC5160; color: white;" id="col-md-12 sub-title"><?php 
						if(empty($errors) === false){
							echo '<p style="margin:0 !important; line-height:20px;">' . implode('</p><p style="margin:0 !important; line-height:20px;">', $errors) . '</p>';	
						}
				
						?></div>
				<div class="shadow"></div>
			</div><!-- end top-wizard -->
		    
			<form name="example-1" id="wrapped" action="" method="POST" />
				<div id="middle-wizard">
					<!-- end step-->
		            
					<div class="step row">
						<div class="col-md-10">
							<h3>Crear cuenta</h3>
								<ul class="data-list">
									<li><input type="text" name="username" class="required form-control" placeholder="Nombre de usuario" /></li>
									<li><input type="password" name="password" class="required form-control" placeholder="Contraseña" /></li>
								</ul>
								<button type="submit" name="submit" class="submit">Enviar registro</button>
						</div>
					</div><!-- end step -->
		                       
					<!-- end submit step -->
		            
		            <div id="bottom-wizard">
		            	<button type="button" name="backward" class="backward">Atras</button>
		            	<button type="button" name="forward" class="forward">Siguiente</button>
		            </div><!-- end bottom-wizard -->
		            
				</div><!-- end middle-wizard -->
	
			</form>
		    
		</div>


	</section>
	
	<!-- Modal Terminos -->
	<!-- /.modal -->
	
	<!-- OTHER JS --> 
	<script src="js/jquery.validate.js"></script>
	<script src="js/jquery.placeholder.js"></script>
	<script src="js/jquery.switch.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/functions.js"></script>
	
</body>
</html>