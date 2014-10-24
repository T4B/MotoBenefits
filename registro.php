<?php 
require 'core/init.php';
$general->logged_in_protect();



	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['apellido']) || empty($_POST['apellido_m'])){

		echo 'Por favor llena los campos faltantes.';
		exit();


	}else{
        
        
		if ($users->user_exists($_POST['username']) === true) {
            echo 'El nombre de usuario ya existe';
            		exit();

        }
        if ($users->user_vendedor_registrado($_POST['cvendedor']) === true) {
            echo 'Tu número de empleado no puede ser registrado, comunicate a motobenefits@sp-marketing.com';
            		exit();

        }
        if ($users->user_cvendedor($_POST['cvendedor']) === true) {
            echo 'El número de empleado ya existe';
            		exit();

        }
        if(!ctype_alnum($_POST['username'])){
            echo 'El nombre de usuario debe contener unicamente letras y numeros';
            		exit();
	
        }
        if( !preg_match( '/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $_POST['password']) || strlen( $_POST['password']) < 6){
            echo 'Tu contraseña debe ser de al menos 6 caracteres alfanuméricos y comenzar con una letra';
            		exit();

        } else if (strlen($_POST['password']) >18){
            echo 'Tu contraseña debe ser inferior a 18 caracteres';
            		exit();

        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            echo 'Por favor ingresa una dirección de correo válida';
           exit();

        }else if ($users->email_exists($_POST['email']) === true) {
            echo 'La cuenta de correo ya fue registrada.';
            exit();

        }else if ($_POST['email'] !== $_POST['email_confirm']) {
                    echo 'Tu mail y la confirmación no coinciden.';
                    exit();
        
        }
	}

		
		$cvendedor 	= htmlentities($_POST['cvendedor']);
		$nombre 	= utf8_decode($_POST['nombre']);
		$apellido 	= utf8_decode($_POST['apellido']);
		$apellido_m 	= utf8_decode($_POST['apellido_m']);
		$email 		= htmlentities($_POST['email']);
		$telefono 	= htmlentities($_POST['telefono']);
		$celular 	= htmlentities($_POST['celular']);
		$nextel 	= htmlentities($_POST['nextel']);
		$tipo 		= htmlentities($_POST['tipo']);
		$estado 	= utf8_decode($_POST['estado']);
		$ciudad 	= utf8_decode($_POST['ciudad']);
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];

	

		$users->register($cvendedor,$nombre,$apellido,$apellido_m,$email,$telefono,$celular,$nextel,$tipo,$estado,$ciudad,$username,$password);

		echo '<strong>Registro exitoso. Por favor revisa tu correo.</strong><script>$("#wrapped")[0].reset();</script>';

		exit();
	

?>