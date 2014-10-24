<?php
require 'core/init.php';
$general->logged_in_protect();

		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
				
			echo 'Tu solucitud ha sido completada, revisa tu correo para continuar con el proceso';
			
		} else {
			
		    echo 'Ingresa tu dirección de correo para solicitar una nueva contraseña.';
		    
		    
			if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
				if ($users->email_exists($_POST['email']) === true){
					$users->confirm_recover($_POST['email']);

					header('Location:confirm-recover.php?success');
					exit();
					
				} else {
					echo 'Lo sentimos, la dirección ingresada no existe.';
				}
			}

		}

