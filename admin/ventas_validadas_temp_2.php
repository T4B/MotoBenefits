<?php 
include '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);


$lista=$users->lista_usuarios_test_2();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
<!-- Standard Favicon--> 
<link rel="shortcut icon" href="images/favicon/favicon.ico">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
      <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->

<!-- Modernizr Library-->
<script src="javascripts/modernizr.custom.js"></script>

<link href="css/ventas.css" rel="stylesheet">
</head>
<body>


	<div id="container">


		<div id="survey_container">
		
			<!-- end top-wizard -->
		    
			<div id="page-wrap">
			
				<table>
					<thead>
					<tr>
						<th>Codigo de vendedor</th>
						<th>Username</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>Teléfono</th>
						<th>Tipo</th>
						<th>Pagado</th>
						<th>Pagar</th>
						<th>Gran total</th>
					</tr>
					</thead>
					
					<tbody>
						<?=utf8_encode($lista)?>
					</tbody>
				</table>
				
				</div>
			
		    
		</div>
		
		
	</div>
	</section>

<!-- Librerias JS -IMPORTANTE- -->
<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.js" ></script> 

	
</body>
</html>