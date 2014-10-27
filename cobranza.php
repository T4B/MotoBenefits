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


<!-- Toggle Switch -->
<link rel="stylesheet" href="css/jquery.switch.css" />

<!-- Jquery -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-ui-1.8.12.min.js"></script>

	
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
                 <h1>Cobranza</h1>
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
	        <span id="counter" style="visibility: hidden;">1</span>
	        <script type="text/javascript">
	        function countdown() {
	            var i = document.getElementById('counter');
	            if (parseInt(i.innerHTML)<=0) {
	                location.href = 'aceptar_envio.php';
	            }
	            i.innerHTML = parseInt(i.innerHTML)-1;
	        }
	        setInterval(function(){ countdown(); },1000);
	        </script>
	        
	        
	        <?php	        
	    } else{

            if(empty($_POST) === false) {	
            
            	if (ctype_alpha($_POST['terms']) === false) {
            	$errors[] = 'Es necesario aceptar los terminos';
            	}	
			
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
				
				
				if (isset($_POST['ife']) && empty ($_POST['ife'])){
//					if ( strlen($_POST['ife']) == false 

//|| strlen($_POST['ife']) < 13 || ctype_digit($_POST['ife']) === false) 
//					{
					$errors[] = 'Escribe los numeros de tu ife';
					}	
//				}


				if($_POST['cuenta']=="" && $_POST['clabe']=="")
					$errors[] = 'Escribe una cuenta o una cable';

				if($_POST['cuenta']=="")
				{
					if ( strlen($_POST['clabe']) > 18 || strlen($_POST['clabe']) < 18 || ctype_digit($_POST['clabe']) === false) {
					$errors[] = 'Deben ser 18 caracteres en clabe y solo dígitos';
					
					}
					else if ($_POST['clabe'] !== $_POST['clabe_confirm']) {
					            $errors[] = 'Tu CLABE y la confirmación no coinciden.';}
					}

				if($_POST['clabe']=="")
				{
						if ( strlen($_POST['cuenta']) > 11  || strlen($_POST['cuenta']) < 11 || ctype_digit($_POST['cuenta']) === false) {
					$errors[] = 'Deben ser 11 caracteres en cuenta y sólo digitos';
					}
					else if ($_POST['cuenta'] !== $_POST['cuenta_confirm']) {
					            $errors[] = 'Tu CUENTA y la confirmación no coinciden.';}
				}

				
				if($_POST['rfc']==""){
				$errors[] = 'Ingresa tu RFC';
				}
				
				if (isset($_POST['rfc']) && !empty ($_POST['rfc'])){
					if ( strlen($_POST['rfc']) > 13 || strlen($_POST['rfc']) < 13) {
					$errors[] = '13 caracteres en RFC';
					}	
				}

				if (isset($_POST['curp']) && empty ($_POST['curp'])){
//					if ( strlen($_POST['curp']) > 18 || strlen($_POST['curp']) < 18) {
					$errors[] = 'Escribe tu CURP';
//					}	
				}
				
				if (empty($user['image_ife'])) {
					
				if (isset($_FILES['myfile']) && empty($_FILES['myfile']['name'])) {
				$errors[] = 'Es necesario subir una copia de tu IFE';
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
						$errors[] = 'El tipo de imagen no es compatible, te sugerimos usar jpg, png o gif';	
					}
					
					if ($file_size > 280000) {
						$errors[] = 'La imagen debe ser inferior a 250Kb';
					}
					
				} else {
					$newpath = $user['image_ife'];
				}

				if(empty($errors) === true) {
					
					if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) ) {
				
						move_uploaded_file($tmp_name, "ife/".$_SESSION['id'].$user['username'].".".$file_ext);
						$newpath="ife/".$_SESSION['id'].$user['username'].".".$file_ext;

					}
												
					$nombre 		= utf8_decode(trim($_POST['nombre']));
					$apellido 		= utf8_decode(trim($_POST['apellido']));	
					$telefono 		= htmlentities(trim($_POST['telefono']));
					$ife 			= htmlentities(trim($_POST['ife']));
					$banco 		= htmlentities(trim($_POST['banco']));
					$cuenta 		= htmlentities(trim($_POST['cuenta']));
					$clabe 		= htmlentities(trim($_POST['clabe']));
					$rfc 			= htmlentities(trim($_POST['rfc']));
					$curp 		= htmlentities(trim($_POST['curp']));
					$image_location	= htmlentities(trim($newpath));
					$user_id=$_SESSION['id'];
					
					$users->update_cobranza($nombre,$apellido,$telefono,$ife,$banco,$cuenta,$clabe,$rfc,$curp,$image_location,$user_id);
					header('Location: cobranza.php?success');
					exit();
				
				} else if (empty($errors) === false) {
					echo '<p>' . implode('</p><p>', $errors) . '</p>';	
				}	
            }

        }
    		?></h5>
         
    		<strong>Ingresa y verifica los datos de cobranza para solicitar el pago de tus premios</strong>
    		<div class="shadow"></div>
    		</div>
    		
    		<form action="" method="post" enctype="multipart/form-data">
    		<div id="middle-wizard">
    			<div class="step">
    				<div class="row">
    					
    					
                
                <div class="col-md-12">
                		<p>SP MERCADOTECNIA EN MÉXICO S.A. DE C.V.</p>
                		<p>Presente</p>
                		
                		<p>POR ESTE MEDIO, AUTORIZO QUE TODOS LOS PAGOS DE INCENTIVOS - DE LOS CUALES PUEDA SER BENEFICIARIO POR PARTICIPAR EN EL PLAN DE LEALTAD MOTOBENEFITS - SEAN DEPOSITADOS EN LA CUENTA BANCARIA DE LA CUAL SOY TITULAR, ASÍ MISMO AUTORIZO A SP MERCADOTECNIA EN MÉXICO S.A. DE C.V. PARA RETENER EL IMPUESTO SOBRE LA RENTA QUE CORRESPONDA AL INCENTIVO DETERMINADO, MISMO QUE NO AFECTA EL IMPORTE TOTAL DE MI BENEFICIO.</p>
                		
                		<p>DE IGUAL MANERA, DECLARO CONOCER QUE LAS FICHAS DE DEPÓSITOS A LA CUENTA BANCARIA ANTES MENCIONADA SON LOS COMPROBANTES DEL PAGO DE MIS INCENTIVOS</p>	
                		<div class="row">
                			<div class="col-md-4 col-md-offset-4">
                				<ul class="data-list" id="terms">
                					<li>
                		            <strong>Aceptar terminos y condiciones</strong>
                					<div style="position:relative">
                						<select class=" example-1 required" name="terms">
                							<option value="" />No
                							<option value="Si" />Si
                						</select>
                					</div>
                					</li>
                				</ul>
                			</div>
                		</div>
                
                </div>
                
                
               
            	<div class="col-md-6">
            	<h3>Cambia tus datos</h3>
            	<div id="personal_info">
	          <ul class="data-list">
	                    <li>
	                        <h5>Nombre:</h5>
	                        <input class="form-control required" type="text" name="nombre" value="<?php if (isset($_POST['nombre']) ){echo utf8_encode(htmlentities(strip_tags($_POST['nombre'])));} else { echo utf8_encode($user['nombre']); }?>">
	                    </li>
	                    <li>
	                        <h5>Apellido:</h5>
	                        <input class="form-control required" type="text" name="apellido" value="<?php if (isset($_POST['apellido']) ){echo utf8_encode(htmlentities(strip_tags($_POST['apellido'])));} else { echo utf8_encode($user['apellido']); }?>">
	                    </li>     
	                    <li>
	                        <h5>Número de IFE:</h5>
	                        <input class="form-control required" type="text" name="ife" value="<?php if (isset($_POST['ife']) ){echo utf8_encode(htmlentities(strip_tags($_POST['ife'])));} else { echo utf8_encode($user['ife']); }?>">
	                    </li>
	                   <li>
	                       <h5>Banco: </h5>
	                       <select class="form-control" name="banco" id="banco" >
	                       <?php if ($user ['banco']!=""){ ?>
	                       
	                      <option selected  value="<? echo $user['banco'];?>"><? echo $user['banco'];?></option>
	                      <?} else {?>
	                      		   <option value="<?php if (isset($_POST['banco'])){echo htmlentities(strip_tags($_POST['banco']));}?>"><?php echo htmlentities(strip_tags($_POST['banco']));?></option>
	                               <option value="SANTANDER">SANTANDER</option>
	                               <option value="BANAMEX">BANAMEX</option>
	                               <option value="BANCOMER">BANCOMER</option>
	                               <option value="BANORTE">BANORTE</option>
	                               <option value="HSBC">HSBC</option>
	                               <option value="INBURSA">INBURSA</option>
	                               <option value="IXE">IXE</option>
	                               <option value="SCOTIABANK">SCOTIABANK</option>
	                               <option value="BANCOAZTECA">BANCO AZTECA</option>
	                               <option value="BANREGIO">BANREGIO</option>
	                               <?}?>
	                           </select>
	                   </li>
	                    <li id="santander">
	                        <h5>Número de cuenta a 11 dígitos: </h5>
	                        <input class="form-control" type="text" name="cuenta" value="<?php if (isset($_POST['cuenta']) ){echo htmlentities(strip_tags($_POST['cuenta']));} else { echo $user['cuenta']; }?>">
	                        <h5>Número de cuenta a 11 dígitos: </h5>
	                        <input class="form-control" type="text" name="cuenta_confirm" value="<?php if (isset($_POST['cuenta']) ){echo htmlentities(strip_tags($_POST['cuenta']));} else { echo $user['cuenta']; }?>">
	                    </li>
	                    <li id="otros">
	                        <h5>CLABE Interbancaria: </h5>
	                        <input class="form-control" type="text" name="clabe" value="<?php if (isset($_POST['clabe']) ){echo htmlentities(strip_tags($_POST['clabe']));} else { echo $user['clabe']; }?>">
	                        <h5>Confirmar CLABE: </h5>
	                        <input class="form-control" type="text" name="clabe_confirm" value="<?php if (isset($_POST['clabe']) ){echo htmlentities(strip_tags($_POST['clabe']));} else { echo $user['clabe']; }?>">
	                    </li>
	                    <li>
	                        <h5>RFC: </h5>
	                        <input class="form-control required" type="text" name="rfc" value="<?php if (isset($_POST['rfc']) ){echo htmlentities(strip_tags($_POST['rfc']));} else { echo $user['rfc']; }?>">
	                    </li>
	                    <li>
	                        <h5>CURP: </h5>
	                        <input class="form-control required" type="text" name="curp" value="<?php if (isset($_POST['curp']) ){echo htmlentities(strip_tags($_POST['curp']));} else { echo $user['curp']; }?>">
	                    </li>
	                    <li>
	                        <h5>Teléfono: </h5>
	                        <input class="form-control required" type="text" name="telefono" value="<?php if (isset($_POST['telefono']) ){echo htmlentities(strip_tags($_POST['telefono']));} else { echo $user['telefono']; }?>">
	                    </li>
	            	</ul>    
            	</div>
            	</div>
            	
            	<div class="col-md-6">
            			<h3>IFE (Frente y vuelta)</h3>	
            	<div id="profile_picture">
            	 <ul class="data-list">
            			<?php
            	        if(!empty ($user['image_ife'])) {
            	            $image = $user['image_ife'];
            	            echo "<img src='$image'>";
            	        }
            	        ?>
            	        
            	        <li>
            	        <input type="file" name="myfile" accept="image/*" />
            	        </li>
            	        
            	        <h6 style="color: #999999;">*Tamaño máximo 250kb (jpeg, jpg, png, gif)</h6>
            	        
            	    </ul>
            	</div>
            	</div>
            	
            	<div class="col-md-6">
            			<h3>IFE (Ejemplo)</h3>	
            	<div>
            	 <ul class="data-list">
            	 	 <img src="img/ife.jpg" alt="" />            	        
            	    </ul>
            	</div>
            	</div>
            	
            	<div class="clear"></div>
            	<hr />
            		<div class="submit" id="complete">
            			<button type="submit" name="submit" class="submit">Enviar</button>
            			</div>
               
               
            
</div>
</div>    
</div>
    </form>
</div>
</section>

<script type="text/javascript">

$(document).ready(function(){

if($("#banco").val() == ""){
    $("#santander").hide();
    $("#otros").hide();
	}
else if($("#banco").val() == "SANTANDER"){
    $("#santander").show();
    $("#otros").hide();
	}
else if ($("#banco").val() == "BANAMEX" || "BANCOMER" || "IXE" || "HSBC" || "BANORTE" || "SCOTIABANK"){
    $("#otros").show();
    $("#santander").hide();
	}


        $("#banco").change(function(){
            if($(this).val() == "SANTANDER"){
            $("#santander").show();
            $("#otros").hide();
        	}
        else if ($(this).val() == "BANAMEX" || "BANCOMER" || "IXE" || "HSBC" || "BANORTE" || "SCOTIABANK"){
            $("#otros").show();
            $("#santander").hide();
        	}
        });
});

</script>

<script src="js/bootstrap.js"></script>

<!-- OTHER JS --> 
<script src="js/jquery.placeholder.js"></script>
<script src="js/jquery.switch.min.js"></script>



</body>
</html>
