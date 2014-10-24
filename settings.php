<?php 
include_once 'core/init.php';
$general->logged_out_protect();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/style2.css" rel="stylesheet" />


	
    <title>Editar Perfil</title>    
</head>
<body>
<section id="top-area">
	<header>
         <div class="container">
         </div><!-- End container -->
        </header> <!-- End header -->
        	
            <div class="container">
             <div class="row">
                 <div class="col-md-12 main-title">
                 <h1>Editar perfil</h1>
                </div>
       		</div>
            </div>
 </section> 

<section class="container" id="main">
<div id="survey_container">
<div id="top-wizard">

		<h5 style="color: red;"><?php
	    if (isset($_GET['success']) && empty($_GET['success'])) {
	        echo '<h5 style="color: #98C526;">Tus datos se han actualizado con éxito!</h5>';
	        ?>
	        <span id="counter" style="visibility: hidden;">5</span>
	        
	        <script type="text/javascript">
	        function countdown() {
	            var i = document.getElementById('counter');
	            if (parseInt(i.innerHTML)<=0) {
	                location.href = 'perfil.php';
	            }
	            i.innerHTML = parseInt(i.innerHTML)-1;
	        }
	        setInterval(function(){ countdown(); },1000);
	        </script>
	        <?php	        
	    } else{

            if(empty($_POST) === false) {		
			
				if (isset($_POST['nombre']) && !empty ($_POST['nombre'])){

					if (!preg_match('/^[\p{L}\s]+$/u', $_POST['nombre'])) {
					    $errors[] = 'Escribe solo letras en el nombre!';
					} 
/*
					if (ctype_alpha($_POST['nombre']) === false) {
					$errors[] = 'Escribe solo letras en el nombre!';
					}	*/
				}
				if (isset($_POST['apellido']) && !empty ($_POST['apellido'])){

					if (!preg_match('/^[\p{L}\s]+$/u', $_POST['apellido'])) {
					    $errors[] = 'Escribe solo letras en el apellido!';
					} 
					/*if (ctype_alpha($_POST['apellido']) === false) {
					$errors[] = 'Escribe solo letras en el apellido!';
					}*/	
				}
				
				if (isset($_POST['telefono']) && !empty ($_POST['telefono'])){
					if (ctype_digit($_POST['telefono']) === false) {
					$errors[] = 'Escribe solo numeros en el telefono!';
					}	
				}
				
				if (isset($_POST['email']) && !empty ($_POST['email'])){
					if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
					$errors[] = 'Escribe un email valido!';
					}	
				}
				
				if (isset($_POST['username']) && !empty ($_POST['username'])){
					if (ctype_alnum($_POST['username']) === false) {
					$errors[] = 'Escribe solo letras y numeros en el username';
					}	
				}

				if ($users->user_exists($_POST['username']) === true && $_POST['username']!=$user['username']) {
           			 $errors[] = 'El nombre de usuario ya esta siendo utilizado';
            		

        		}

				if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])) {
					
					$name 			= $_FILES['myfile']['name'];
					$tmp_name 		= $_FILES['myfile']['tmp_name'];
					$allowed_ext 	= array('jpg', 'jpeg', 'png', 'gif' );
					$a 				= explode('.', $name);
					$file_ext 		= strtolower(end($a)); unset($a);
					$file_size 		= $_FILES['myfile']['size'];		
					$path 			= "avatars";
					
					if (in_array($file_ext, $allowed_ext) === false) {
						$errors[] = 'El tipo de imagen no es compatible, te sugerimos usar jpg, png o gif';	
					}
					
					if ($file_size > 280000) {
						$errors[] = 'La imagen debe ser inferior a 250Kb';
					}
					
				} else {
					$newpath = $user['image_location'];
				}

				if(empty($errors) === true) {
					
					if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) ) {
				
						//$newpath = $general->file_newpath($path, $name);

						move_uploaded_file($tmp_name, "avatars/".$_SESSION['id'].$user['username'].".".$file_ext);
						$newpath="avatars/".$_SESSION['id'].$user['username'].".".$file_ext;

					}else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
                        $newpath = 'avatars/default_avatar.png';
                    }
							
					$nombre 		= utf8_decode(trim($_POST['nombre']));
					$apellido 		= utf8_decode(trim($_POST['apellido']));	
					$telefono 		= htmlentities(trim($_POST['telefono']));
					$mail 			= htmlentities(trim($_POST['email']));
					$username 		= htmlentities(trim($_POST['username']));
					$image_location	= htmlentities(trim($newpath));
					$user_id=$_SESSION['id'];
					
					$users->update_user($nombre, $apellido, $telefono, $mail, $username, $image_location, $user_id);
					header('Location: settings.php?success');
					exit();
				
				} else if (empty($errors) === false) {
					echo '<p>' . implode('</p><p>', $errors) . '</p>';	
				}	
            }

        }
    		?></h5>
         
    		<strong>Aquí puedes modificar los datos de tu perfil</strong>
    		<div class="shadow"></div>
    		</div>
    		
    		<form action="" method="post" enctype="multipart/form-data">
    		<div id="middle-wizard">
    			<div class="step">
    				<div class="row">
    					
    					<div class="col-md-6">
    					<h3>Cambia tu imagen de perfil</h3>	
                <div id="profile_picture">
                 <ul class="data-list">
        				<?php
                        if(!empty ($user['image_location'])) {
                            $image = $user['image_location'];
                            echo "<img src='$image'>";
                        }
                        ?>
                        
                        <li>
                        <input type="file" name="myfile" />
                        </li>
                        <?php if($image != 'avatars/default_avatar.png'){ ?>
                        <h6 style="color: #999999;">*Tamaño máximo 250kb (jpeg, jpg, png, gif)</h6>
	                        <li>
	                            <input type="checkbox" name="use_default" id="use_default" value="on"/> <label for="use_default">Usar imagen predeterminada</label>
	                        </li>
	                        <?php 
                        }
                        ?>
                    </ul>
                </div>
                </div>
                
               
            	<div class="col-md-6">
            	<h3>Cambia tus datos</h3>
            	<div id="personal_info">
	          <ul class="data-list">
	                    <li>
	                        <h5>Nombre:</h5>
	                        <input class="form-control" type="text" name="nombre" value="<?php if (isset($_POST['nombre']) ){echo utf8_encode(htmlentities(strip_tags($_POST['nombre'])));} else { echo utf8_encode($user['nombre']); }?>">
	                    </li>     
	                    <li>
	                        <h5>Apellido: </h5>
	                        <input class="form-control" type="text" name="apellido" value="<?php if (isset($_POST['apellido']) ){echo utf8_encode(htmlentities(strip_tags($_POST['apellido'])));} else { echo utf8_encode($user['apellido']); }?>">
	                    </li>
	                    <li>
	                        <h5>Telefono: </h5>
	                        <input class="form-control" type="text" name="telefono" value="<?php if (isset($_POST['telefono']) ){echo htmlentities(strip_tags($_POST['telefono']));} else { echo $user['telefono']; }?>">
	                    </li>
	                    <li>
	                        <h5>Email: </h5>
	                        <input class="form-control" type="text" name="email" value="<?php if (isset($_POST['email']) ){echo htmlentities(strip_tags($_POST['email']));} else { echo $user['email']; }?>">
	                    </li>
	                    <li>
	                        <h5>Username: </h5>
	                        <input class="form-control" type="text" name="username" value="<?php if (isset($_POST['username']) ){echo htmlentities(strip_tags($_POST['username']));} else { echo $user['username']; }?>">
	                    </li>
	            	</ul>    
            	</div>
            	</div>
            	<div class="clear"></div>
            	<hr />
            		<div class="submit" id="complete">
            			<button type="submit" name="submit" class="submit">Actualizar</button>
            			</div>
               
               
            
</div>
</div>    
</div>
    </form>
</div>
</section>

<script src="js/bootstrap.js"></script>


</body>
</html>
