<?php 
include '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);
$pedidos=$users->genera_tabla_pagos_general($_SESSION['id']);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
<!-- Standard Favicon--> 
<link rel="shortcut icon" href="images/favicon/favicon.ico">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bootstrap/js/html5shiv.js"></script>
      <script src="../bootstrap/js/respond.min.js"></script>
    <![endif]-->

<!-- Modernizr Library-->
<script src="../javascripts/modernizr.custom.js"></script>

<link href="../css/solicitudes.css" rel="stylesheet">
</head>
<body>


	<div id="container">


		<div id="survey_container">
		
			<!-- end top-wizard -->
		    
			<div id="page-wrap">
			<form action="#">
				<fieldset style="border: 0px;">
					<input placeholder="Buscar" type="text" name="search" value="" id="id_search" /> <span class="loading">Loading...</span>
					<a href='../reporte_final.csv'><button type="button" style="background-color: #4AAD79; color: white;">Descargar archivo</button></a>
				</fieldset>
			</form>	
			
				<table>
					<thead>
					<tr>
						<th>Vendedor</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>RFC</th>
						<th>CURP</th>
						<th>Banco</th>
						<th>Cuenta</th>
						<th>CLABE</th>
						<th>IFE</th>
						<th>Monto</th>
						<th>Status</th>
						<th>Motivo</th>
						<th>Fecha</th>
						<th>Cambiar</th>
					</tr>
					</thead>
					
					<tbody>
					<tr id="noresults">
						<td style="background-color: #f5d08d;" colspan="15">Sin resultados</td>
					</tr>
					
						<?=$pedidos?>
					</tbody>
				</table>

				
				</div>
			
		    
		</div>
		
		
	</div>
	</section>

<!-- Librerias JS -IMPORTANTE- -->
<script src="../bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="../javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.js" ></script> 
<script src="../js/ajax.js"></script>

<script>
	function aparecer(div)
	{
		$('#motivos'+div).show();
	}

	function verifica_motivo(div)
	{
		if($('#selectmotivos'+div).val()!='otro')
			$('#otros_motivos'+div).hidden();
		else
			$('#otros_motivos'+div).show();

	}

	function envia_cancelacion(div)
	{
		if($('#selectmotivos'+div).val()=='otro' && $('#otros_motivos'+div).val()=="")
			alert("Por favor escriba el motivo del rachazo de la solicitud");
		else
			{
				ir('../rechazar.php?id='+div+'&motivo='+$('#selectmotivos'+div).val()+'&otro='+$('#otros_motivos'+div).val(),'divi'+div);
			}
			
	}

</script>
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