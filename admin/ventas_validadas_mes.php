<?php 
include 'core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);


if(isset($_POST))
{
	$lista=$users->lista_usuarios_mes($_POST['mes'],$_POST['ano']);
}
else
{
	$lista=$users->lista_usuarios();
}


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
				<form action="#" method="POST">
					Selecciona mes: <select name="mes" id="mes">
											<option value="01">Enero
											<option value="02">Febrero
											<option value="03">Marzo
											<option value="04">Abril
											<option value="05">Mayo
											<option value="06">Junio
											<option value="07">Julio
											<option value="08">Agosto
											<option value="09">Septiembre
											<option value="10">Octubre
											<option value="11">Noviembre
											<option value="12">Diciembre
									</select>
					Selecciona año: <select name="ano" id="ano">
											<option value="2013">2013
											<option value="2014">2014
											<option value="2015">2015
											<option value="2016">2016
											<option value="2017">2017
											
									</select>
					<input type="submit" value="Ver">
				</form>
			
				<table>
					<thead>
					<tr>
						<th>Codigo de vendedor</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
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