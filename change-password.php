<?php 
include_once 'core/init.php';
$general->logged_out_protect();

        if(empty($_POST) === false) {
           
            if(empty($_POST['current_password']) || empty($_POST['password']) || empty($_POST['password_again'])){

                echo 'Todos los campos son obligatorios';

            }else if($bcrypt->verify($_POST['current_password'], $user['password']) === true) {

                if (trim($_POST['password']) != trim($_POST['password_again'])) {
                    echo 'Tu contraseña no coincide';
                } else if ( !preg_match( '/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $_POST['password']) || strlen($_POST['password']) < 6) { 
                    echo 'Tu contraseña debe ser de al menos 6 caracteres alfanuméricos y comenzar con una letra';
                } else if (strlen($_POST['password']) >18){
                    echo 'Tu contraseña debe ser inferior a 18 caracteres';
                } 
                else
                {
                        $users->change_password($user['id'], $_POST['password']);
                        echo 'Tu contraseña ha sido cambiada!';
                }

            } else {
                echo 'Tu contraseña actual es incorrecta';
            }


        }

        ?>