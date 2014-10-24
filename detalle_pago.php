<?php
include 'core/init.php';
$general->logged_out_protect();
$porpagar=$users->pesos_por_recibo($_GET['id']);


$elementos=explode("&&", $porpagar);
$porpagar=$elementos[22];

$porpagarfinal=$porpagar/0.8;
$isr=$porpagarfinal*0.2;

if($elementos[16]==""){

$cuenta_banco=$elementos[18];
 }else{
$cuenta_banco=$elementos[16];
}

$nombre_recibo = utf8_encode($elementos[4]);
$apellido_recibo = utf8_encode($elementos[6]);

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/cobranza.css" >
	<title>Confirmación</title>
	
	<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="js/tableExport.js"></script>
	<script type="text/javascript" src="js/jquery.base64.js"></script>
	
	<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="jspdf/jspdf.js"></script>
	<script type="text/javascript" src="jspdf/libs/base64.js"></script>
	<script type="text/javascript" src="js/html2canvas.js"></script>
	
</head>
<body>
		<div class="frameT">
		<div class="frameTC">
		
		<div class="content">
				<p><b>Solicitud de pago</b></p>
				<table id="recibo" style='min-width: 300px;' border='0' align='center' cellpadding='0' cellspacing='0'>
				              
				              
				              <tr>
				                <td bgcolor='#F7F7F7' style='padding:25px; font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:.9em; line-height:1.4em; border:1px solid silver;'>
				                <p><span style='background-color: #50c3d1; padding: 5px 10px; color: white; font-size:1em;'>ESTE RECIBO SOLO SERÁ VÁLIDO AL PRESENTARSE JUNTO AL COMPROBANTE DE DEPÓSITO</span></p>
				                <p>Recib&iacute; de SP Mercadotecnia en M&eacute;xico SA de CV, la cantidad de <span style='background-color: #50c3d1; padding: 5px 10px; color: white; font-size:1em;'>$ <?=$porpagar;?> pesos</span>, originado del incentivo al que fu&iacute; acreedor, est&aacute; cantidad se determin&oacute;:</p>
				                <table style='min-width: 250px; max-width: 450px; border-style: solid; border-color: silver; border-collapse: collapse;' border='1' align='center' cellpadding='3' cellspacing='0'>
				                  <tr>
				                    <td align='right'>Incentivo a que fue acreedor:</td>
				                    <td bgcolor="#DFDFDF">$ <?=$porpagarfinal;?></td>
				                  </tr>
				                  <tr>
				                    <td align='right'>Menos 20% del ISR:</td>
				                    <td bgcolor="#DFDFDF">$ <?=$isr?></td>
				                  </tr>
				                  <tr>
				                    <td align='right'>Importe que se deposita:</td>
				                    <td bgcolor="#DFDFDF">$ <?=$porpagar?></td>
				                  </tr>
				                  <tr>
				                    <td align='right'>Banco:</td>
				                    <td bgcolor="#DFDFDF"><? echo $elementos[14];?></td>
				                  </tr>
				                  <tr>
				                    <td align='right'>En la cuenta o CLABE autorizada:</td>
				                    <td bgcolor="#DFDFDF"><? if($elementos[16]=="")
                                                        echo $elementos[18];
                                                    else
                                                        echo $elementos[16];?></td>
				                  </tr>
				                </table>
				                <p>Nombre completo: <? echo utf8_encode($elementos[4]);?> <? echo utf8_encode($elementos[6]);?><br>
				                RFC: <? echo $elementos[11];?> <br>
				                CURP: <? echo $elementos[12];?><br><br>
				                <img style="max-width: 400px; min-width: 280px; border: 1px solid silver;" src="<?=$elementos[20]?>">
				                </p>
				                </td>
				  				</tr>
				              
				              
				            </table>
				            <a href="#" onClick ="$('#recibo').tableExport({type:'png',escape:'false'});"> <img src='icons/png.png' width='20px'> Descargar Imagen</a>
		</div>
		
		</div>
		</div>
</body>

	