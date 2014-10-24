<?php 
include_once 'core/init.php';
$general->logged_out_protect();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
    <title>Settings</title>    
</head>
<body>
	<div id="container">
		<?php
	    if (isset($_GET['success']) && empty($_GET['success'])) {
	        echo '<h3>Tus datos se han actualizado con éxito!</h3>';	        
	    } else{

            if(empty($_POST) === false) {		
			
				if (isset($_POST['nombre']) && !empty ($_POST['nombre'])){
					if (ctype_alpha($_POST['nombre']) === false) {
					$errors[] = 'Please enter your First Name with only letters!';
					}	
				}
				if (isset($_POST['apellido']) && !empty ($_POST['apellido'])){
					if (ctype_alpha($_POST['apellido']) === false) {
					$errors[] = 'Please enter your Last Name with only letters!';
					}	
				}
				
				if (isset($_POST['telefono']) && !empty ($_POST['telefono'])){
					if (ctype_alpha($_POST['telefono']) === false) {
					$errors[] = 'Please enter your Last Name with only letters!';
					}	
				}
				
				if (isset($_POST['email']) && !empty ($_POST['email'])){
					if (ctype_alpha($_POST['email']) === false) {
					$errors[] = 'Please enter your Last Name with only letters!';
					}	
				}
				
				if (isset($_POST['username']) && !empty ($_POST['username'])){
					if (ctype_alpha($_POST['username']) === false) {
					$errors[] = 'Please enter your Last Name with only letters!';
					}	
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
						$errors[] = 'Image file type not allowed';	
					}
					
					if ($file_size > 2097152) {
						$errors[] = 'File size must be under 2mb';
					}
					
				} else {
					$newpath = $user['image_location'];
				}

				if(empty($errors) === true) {
					
					if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && $_POST['use_default'] != 'on') {
				
						$newpath = $general->file_newpath($path, $name);

						move_uploaded_file($tmp_name, $newpath);

					}else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
                        $newpath = 'avatars/default_avatar.png';
                    }
							
					$nombre 	= utf8_encode(trim($_POST['nombre']));
					$apellido 		= utf8_decode(trim($_POST['apellido']));	
					$telefono 		= htmlentities(trim($_POST['telefono']));
					$mail 			= htmlentities(trim($_POST['mail']));
					$username 		= htmlentities(trim($_POST['username']));
					$image_location	= htmlentities(trim($newpath));
					
					$users->update_user($nombre, $apellido, $telefono, $mail, $username, $image_location, $user_id);
					header('Location: settings.php?success');
					exit();
				
				} else if (empty($errors) === false) {
					echo '<p>' . implode('</p><p>', $errors) . '</p>';	
				}	
            }
    		?>
         
    		<h2>Settings.</h2> <p><b>Note: Information you post here is made viewable to others.</b></p>
            <hr />

            <form action="" method="post" enctype="multipart/form-data">
                <div id="profile_picture">
                 
               		<h3>Cambiar imagen de perfil</h3>
                    <ul>
                        
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
	                        <li>
	                            <input type="checkbox" name="use_default" id="use_default" /> <label for="use_default">Usar imagen predeterminada</label>
	                        </li>
	                        <?php 
                        }
                        ?>
                    </ul>
                </div>
            
            	<div id="personal_info">
	            	<h3 >Actualizar información</h3>
	                <ul>
	                    <li>
	                        <h4>Nombre:</h4>
	                        <input type="text" name="nombre" value="<?php if (isset($_POST['nombre']) ){echo utf8_decode(strip_tags($_POST['nombre']));} else { echo $user['nombre']; }?>">
	                    </li>     
	                    <li>
	                        <h4>Apellido: </h4>
	                        <input type="text" name="apellido" value="<?php if (isset($_POST['apellido']) ){echo htmlentities(strip_tags($_POST['apellido']));} else { echo $user['apellido']; }?>">
	                    </li>
	                    <li>
	                        <h4>Telefono: </h4>
	                        <input type="text" name="telefono" value="<?php if (isset($_POST['telefono']) ){echo htmlentities(strip_tags($_POST['telefono']));} else { echo $user['telefono']; }?>">
	                    </li>
	                    <li>
	                        <h4>Email: </h4>
	                        <input type="text" name="email" value="<?php if (isset($_POST['email']) ){echo htmlentities(strip_tags($_POST['email']));} else { echo $user['email']; }?>">
	                    </li>
	                    <li>
	                        <h4>Username: </h4>
	                        <input type="text" name="username" value="<?php if (isset($_POST['username']) ){echo htmlentities(strip_tags($_POST['username']));} else { echo $user['username']; }?>">
	                    </li>
	            	</ul>    
            	</div>
            	<div class="clear"></div>
            	<hr />
            		<span>Actualizar:</span>
                    <input type="submit" value="Update">
               
            </form>
    </div>
</body>
</html>
<?php
}