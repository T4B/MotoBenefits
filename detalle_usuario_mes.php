<?php 
include 'core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);


$lista=$users->detalle_vendedor_mes($_GET['id'],$_GET['mes'],$_GET['ano']);

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

<link href="css/detalle.css" rel="stylesheet">
</head>
<body>


	<div id="container">


		<div id="survey_container">
		
			<!-- end top-wizard -->
		    
			<div id="page-wrap">
			
				<table>
					<thead>
					<tr>
						<th>Folio</th>
						<th>Modelo</th>
						<th>Fecha</th>
						<th>Puntos</th>
						<th>Por promoción</th>
						<th>Status</th>
						
					</tr>
					</thead>
					
					<tbody>
						<?=$lista?>
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