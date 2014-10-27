
<?php
error_reporting(0);
require 'core/init.php';
$general->logged_in_protect();

if (empty($_POST) === false) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		echo 'Lo sentimos, necesitamos tu usuario y contraseña.';
	} else if ($users->user_exists($username) === false) {
		echo 'Lo sentimos, el usuario no existe';
	} else if ($users->email_confirmed($username) === false) {
		echo 'Necesitas activar tu cuenta. 
					 Por favor revisa tu correo.';
	} else {
		if (strlen($password) > 18) {
			echo 'La contraseña debe ser inferior a 18 dígitos y si espacios.';
		}
		$login = $users->login($username, $password);
		if ($login === false) {
			echo 'Lo sentimos el usuario/contraseña es inválido';
		}else {
			$link=mysql_connect("localhost","motobene_usuario","socio00");
			mysql_select_db("motobene_usuario");
			$query="INSERT INTO `sesion`( `tipo`, `fecha`, `usuario`,ip) VALUES ('entrada','".date("Y-m-d H:i:s")."','$login','".$_SERVER['REMOTE_ADDR']."')";
			mysql_query($query);
			session_regenerate_id(true);// destruir sesión antigua y crear una nueva
			$_SESSION['id'] =  $login;
			$_SESSION['tipo']= $users->tipo_usuario($_SESSION['id']);
			?>
				<script>
						window.location="perfil.php";
				</script>
			<?php
			exit();
		}
	}
} 
?>
