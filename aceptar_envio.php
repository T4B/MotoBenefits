<?php
require 'mailer/PHPMailerAutoload.php';
include 'core/init.php';
date_default_timezone_set('America/Mexico_City');
$general->logged_out_protect();




$tipos_usuario=array('ALE' => TRUE,'GDM' => TRUE,'GNT' => TRUE,'ICA' => TRUE,'RED' => TRUE,'ROALCOM' => TRUE,'SIB' => TRUE );


if(!isset($tipos_usuario[$_SESSION['tipo']]))
{
    $porpagar=$users->pesos_por_pagar($_SESSION['id']);
}
else
{
    $porpagar=$users->pesos_por_pagar_distribuidor($_SESSION['id']);

}

$smtpserver="p3plcpnl0371.prod.phx3.secureserver.net";
$correosmtp="test@moto-benefits.com.mx";
$passsmtp="123456";
$puertosmtp="465";
$seguridadsmtp="ssl";
$autenticacionsmtp=true;



$porpagarfinal=$porpagar/0.8;
$isr=$porpagarfinal*0.2;

$mesinicio=date("Y-m-d");
$i=0;

while ($i<6) {

        $dia=date("N",strtotime('+1 day',strtotime($mesinicio)));
        if($dia!=6 && $dia!=7)
        {
           $i++;
        }
        $mesinicio=date("Y-m-d",strtotime('+1 day',strtotime($mesinicio)));     

}
        $fechaaprox=date("d-m-Y",strtotime($mesinicio));     


       


if($user['cuenta']==""){

$cuenta_banco=$user['clabe'];
 }else{
$cuenta_banco=$user['cuenta'];
}

$nombre_recibo = utf8_encode($user['nombre']);
$apellido_recibo = utf8_encode($user['apellido']);

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/cobranza.css" >
	<title>Confirmación</title>
</head>

<body>


<?php


	if(isset($_POST['aceptado']) && !empty($_POST['aceptado']))
	{
			$users->actualizando_montos($_SESSION['id'],$porpagar);
			?>
			<div class="frameT">
			<div class="frameTC">
			
			<div class="content">
					<p>¡Gracias! Tu información ha sido enviada correctamente, <br />te recordamos que tu pago se verá reflejado a más tardar dentro de <strong>6 días hábiles</strong> Fecha aproximada <strong><?=$fechaaprox?></strong> </p>
					<button class="" onclick="location.href='perfil.php';">Aceptar</button>
					
			</div>
			
			</div>
			</div>
			<?
			
			$mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = $smtpserver;
            $mail->Port = $puertosmtp;
            $mail->SMTPSecure = $seguridadsmtp; 
            $mail->SMTPAuth = $autenticacionsmtp;
            $mail->Username = $correosmtp;
            $mail->Password = $passsmtp;
            $mail->setFrom($correosmtp, 'Cobranza');
            $mail->addAddress($user['email'], 'Envio');
            $mail->Subject = 'Pago pendiente Motobenefits';
            $mail->msgHTML("<table width='750' border='0' align='center' cellpadding='0' cellspacing='0'>
                          <tr>
                            <td style='font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:12px;' height='35' align='center' bgcolor='#eaeaea'>Solicitud de pago</td>
                          </tr>
                          <tr>
                            <td align='center'><img src='http://moto-benefits.com.mx/mailings/images/logo_moto.jpg' width='176' height='105'  alt=''/></td>
                          </tr>
                          <tr>
                            <td style='padding:25px; font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:.9em; line-height:1.4em;'><p><strong>".$user['nombre'].":</strong></p>
                            <p>Tu solicitud de pago fue enviada con &eacute;xito al &aacute;rea de pagos por la cantidad de:</p>
                            <p style='text-align:center; padding:15px 0;'><span style='background-color: #50c3d1; padding: 10px 20px; color: white; font-size:1.5em;'>$ ".$porpagar." pesos</span></p>
                            <p>Tu solicitud ser&aacute; validada y sujeta a aprobaci&oacute;n a la brevedad, en cuanto tu solicitud sea procesada recibir&aacute;s un correo indicandote el nuevo status de tu solicitud. Recuerda que puedes checar el status de tus operaciones en la secci&oacute;n de <strong>Tu dinero</strong>.</p>
                            <p>Agradecemos de antemano tu paciencia y recuerda que Motobenefits premia tu esfuerzo.</p>
                            <p>Para cualquier duda o aclaraci&oacute;n puedes contactarnos en:  <strong>motobenefits@sp-marketing.com
                             </strong></p>
                            <p><strong>Un cordial saludo!</strong></p></td>
                          </tr>
                          <tr>
                            <td style='font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:12px;' height='25' align='center' bgcolor='#eaeaea'><a style='color:#9f9e9e; text-decoration:none;' href='http://moto-benefits.com.mx/' target='_blank'>www.moto-benefits.com.mx</a></td>
                          </tr>
                        </table>
                ");
            if (!$mail->send()) {
                //echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                //echo "Message sent!";
            }

            $mail->ClearAllRecipients();
            $mail->setFrom($correosmtp, 'Cobranza');
            $mail->addAddress('martin.camacho@spgmexico.com', 'Envio');
            $mail->addCC('carlos.gonzalez@spgmexico.com', 'Envio');
            $mail->addCC('braulio.bribiesca@spgmexico.com', 'Envio');
            $mail->addCC('farah.vargas@spgmexico.com', 'Envio');
            $mail->Subject = 'Pago pendiente solicitado';
            $mail->msgHTML("<table width='750' border='0' align='center' cellpadding='0' cellspacing='0'>
                          <tr>
                            <td style='font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:12px;' height='35' align='center' bgcolor='#eaeaea'>Solicitud de pago</td>
                          </tr>
                          <tr>
                            <td align='center'><img src='http://moto-benefits.com.mx/mailings/images/logo_moto.jpg' width='176' height='105'  alt=''/></td>
                          </tr>
                          <tr>
                            <td style='padding:25px; font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:.9em; line-height:1.4em;'><p><strong>El usuario ".$user['nombre']." con n&uacute;mero de empleado: ".$user['cvendedor']."</strong></p>
                            <p>Ha solicitado el pago de sus premios:</p>
                            </td>
                          </tr>
                          <tr>
                            <td bgcolor='#F7F7F7' style='padding:25px; font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:.9em; line-height:1.4em; border:1px solid silver;'>
                            <p><span style='background-color: #50c3d1; padding: 5px 10px; color: white; font-size:1em;'>ESTE RECIBO SOLO SER&Aacute; V&Aacute;LIDO AL PRESENTARSE JUNTO AL COMPROBANTE DE DEP&Oacute;SITO</span></p>
                            <p>Recib&iacute; de SP Mercadotecnia en M&eacute;xico SA de CV, la cantidad de <span style='background-color: #50c3d1; padding: 5px 10px; color: white; font-size:1em;'>".$porpagar." pesos</span>, originado del incentivo al que fu&iacute; acreedor, est&aacute; cantidad se determin&oacute;:</p>
                            <table width='450' style='border-style: solid; border-color: silver; border-collapse: collapse;' border='1' align='center' cellpadding='3' cellspacing='0'>
                              <tr>
                                <td align='right'>Incentivo a que fue acreedor:</td>
                                <td bgcolor='#DFDFDF'>".$porpagarfinal."</td>
                              </tr>
                              <tr>
                                <td align='right'>Menos 20% del ISR:</td>
                                <td bgcolor='#DFDFDF'>".$isr."</td>
                              </tr>
                              <tr>
                                <td align='right'>Importe que se deposita:</td>
                                <td bgcolor='#DFDFDF'>".$porpagar."</td>
                              </tr>
                              <tr>
                                <td align='right'>Banco:</td>
                                <td bgcolor='#DFDFDF'>".$user['banco']."</td>
                              </tr>
                              <tr>
                                <td align='right'>En la cuenta o CLABE autorizada:</td>
                                <td bgcolor='#DFDFDF'>".$cuenta_banco."</td>
                              </tr>
                            </table>
                            <p>Nombre completo: ".$user['nombre']." ".$user['apellido']."<br>
                            RFC: ".$user['rfc']."<br>
                            CURP: ".$user['curp']."<br><br>
                            </p>
                            </td>
              </tr>
                          <tr>
                            <td style='padding:25px; font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:.9em; line-height:1.4em;'>
                              <p>La solicitud est&aacute; en espera de aprobaci&oacute;n.</p>
                            <p><strong>Saludos!</strong></p></td>
                          </tr>
                          <tr>
                            <td style='font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:12px;' height='25' align='center' bgcolor='#eaeaea'><a style='color:#9f9e9e; text-decoration:none;' href='http://moto-benefits.com.mx/' target='_blank'>www.moto-benefits.com.mx</a></td>
                          </tr>
                        </table>
                ");
            if (!$mail->send()) {
                //echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                //echo "Message sent!";
            } 

			?>

			<?php
	}
	else
	{
		?>
		
		<div class="frameT">
		<div class="frameTC">
		
		<div class="content">
				<p><b>Solicitud de pago</b></p>
        Fecha aproximada <strong><?=$fechaaprox?></strong>
				<table style='min-width: 300px;' border='0' align='center' cellpadding='0' cellspacing='0'>
				              
				              
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
				                    <td bgcolor="#DFDFDF"><? echo $user['banco'];?></td>
				                  </tr>
				                  <tr>
				                    <td align='right'>En la cuenta o CLABE autorizada:</td>
				                    <td bgcolor="#DFDFDF"><? if($user['cuenta']=="")
                                                        echo $user['clabe'];
                                                    else
                                                        echo $user['cuenta'];?></td>
				                  </tr>
				                </table>
				                <p>Nombre completo: <? echo utf8_encode($user['nombre']);?> <? echo utf8_encode($user['apellido']);?><br>
				                RFC: <? echo $user['rfc'];?> <br>
				                CURP: <? echo $user['curp'];?><br><br>
				                </p>
				                </td>
				  </tr>
				              
				              
				            </table>
				<form action="" method="POST">
					<input type="hidden" name="aceptado" value="1">
					<button type="submit" >Aceptar</button>
				</form>
				<span class="notas">Puedes consultar el status de las solicitudes en tu perfil</span>
		</div>
		
		</div>
		</div>

		<?php
	}

?>


</body>

	