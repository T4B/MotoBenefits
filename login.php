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
			
			echo mysql_error();

			session_regenerate_id(true);// destruir sesión antigua y crear una nueva
			$_SESSION['id'] =  $login;
			//header('Location: perfil.php');
			exit();
		}
	}
} 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
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
	<!-- Home Page Styles -->
	<link href="stylesheets/home07.css" rel="stylesheet">
	<!-- Main Template Styles -->
	<link href="stylesheets/main.css" rel="stylesheet">
	<!-- Main Template Responsive Styles -->
	<link href="stylesheets/main-responsive.css" rel="stylesheet">
	<title>Ingreso</title>
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
	<div id="container">

		<h1>Ingreso</h1>

		<?php 
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		}
		?>
	<div id="intro" class="top-banner-caption-v6" data-stellar-background-ratio="1.7">
		<div class="vertical-center top-caps6">
			<h3><img src="images/logo_home.png" alt="" /></h3>
			<form method="post" action="">
				<h4>Usuario:</h4>
				<input type="text" name="username" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" />
				<h4>Contraseña:</h4>
				<input type="password" name="password" />
				<br>
				<input type="submit" name="submit" />
			</form> 
			<a class="btn btn-rounded btn-rounded-color2 scroll" href="#about">Ir</a>
		</div>
	</div>
		
		<a href="confirm-recover.php">Olvidaste tu usuario/contraseña?</a>

	</div>
</body>
</html>