<?php 
include '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);

$lista=$users->lista_usuarios_dist();

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

<div class="page-title"> <i class="icon-bar-chart"></i>
  <h3><span class="semi-bold">Ventas Canal Alterno</span></h3>
</div>
	<div id="container">


		<div id="survey_container">
		
			<!-- end top-wizard -->
		    
			<div id="page-wrap">
			<form action="#">
				<fieldset style="border: 0px;">
					<input type="text" placeholder="Buscar" name="search" value="" id="id_search" /> <span class="loading">Loading...</span>
					<a href='ventas_canal_alterno.csv'><button type="button" style="background-color: #4AAD79; color: white; border: 0px;">Descargar archivo</button></a>
				</fieldset>
			</form>	
			
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
					<tr id="noresults">
						<td colspan="10">Sin resultados</td>
					</tr>
					
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

<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>-->
<script type="text/javascript" src="jquery.quicksearch.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#id_search").quicksearch("table tbody tr", {
			noResults: '#noresults',
			stripeRows: ['odd', 'even'],
			loader: 'span.loading'
		});
	});
</script>

</body>
</html>