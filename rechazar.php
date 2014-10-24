<?php
		session_start();
        require 'mailer/PHPMailerAutoload.php';

		$link=mysql_connect("localhost","motobene_usuario","socio00");
		mysql_select_db("motobene_usuario");



      $query="SELECT monto,cvendedor FROM pagos WHERE id='".$_GET['id']."'";
        $resultado=mysql_query($query);
        $row=mysql_fetch_array($resultado);

        ///variables que puedes usar

        $monto=$row['monto'];
        $cvendedor=$row['cvendedor'];



        $query="SELECT * FROM users WHERE cvendedor='".$cvendedor."'";
        $resultado=mysql_query($query);
        $datos=mysql_fetch_array($resultado);


        ///variables que puedes usar
        $nombre=$datos['nombre'];
        $apellido=$datos['apellido'];
        $correo=$datos['email'];


        if($_GET['motivo']=='otro')
        {
            $query="UPDATE pagos SET status='2',motivo='".$_GET['otro']."' WHERE id='".$_GET['id']."'";
            mysql_query($query);
        }
        else
        {
            $query="UPDATE pagos SET status='2',motivo='".$_GET['motivo']."' WHERE id='".$_GET['id']."'";
            mysql_query($query);
        }
		


		$query="SELECT * FROM pagos WHERE id='".$_GET['id']."'";
		$resultado=mysql_query($query);
		$row=mysql_fetch_array($resultado);

		$query="UPDATE valida SET cobrado='0' WHERE cvendedor='".$row['cvendedor']."' AND fecha_solicitud='".$row['fecha']."'";
		mysql_query($query);
		
		$query="SELECT * FROM pagos WHERE cvendedor='".$cvendedor."'";
		        $resultado=mysql_query($query);
		        $datos2=mysql_fetch_array($resultado);
		
		
		        ///variables que puedes usar
		        $motivo=$datos['motivo'];
    

		$smtpserver="p3plcpnl0371.prod.phx3.secureserver.net";
		$correosmtp="test@moto-benefits.com.mx";
		$passsmtp="123456";
		$puertosmtp="465";
		$seguridadsmtp="ssl";
		$autenticacionsmtp=true;


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
            $mail->addAddress($correo, 'Envio');
            $mail->Subject = 'Pago RECHAZADO Motobenefits';
            $mail->msgHTML("<table width='750' border='0' align='center' cellpadding='0' cellspacing='0'>
                          <tr>
                            <td style='font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:12px;' height='35' align='center' bgcolor='#eaeaea'>Solicitud de pago rechazada</td>
                          </tr>
                          <tr>
                            <td align='center'><img src='http://moto-benefits.com.mx/mailings/images/logo_moto.jpg' width='176' height='105'  alt=''/></td>
                          </tr>
                          <tr>
                            <td style='padding:25px; font-family:Helvetica, Arial, sans-serif; color:#9f9e9e; font-size:.9em; line-height:1.4em;'><p><strong>".$nombre.":</strong></p>
                            <p>Lamentamos informarte que tu solicitud de pago por la cantidad de $ <strong>".$monto."</strong> fue rechazada.</p>
                            <p>El motivo del rechazo es: <strong>".$_GET['motivo']."</strong></p>
                            <p>Ingresa nuevamente a tu cuenta en https://www.moto-benefits.com.mx y da click en <strong>Editar datos de cobranza</strong> dentro de la secci&oacute;n Motopesos para corregir tus datos.</p>
                            <p>Para cualquier duda o aclaraci&oacute;n puedes contactarnos en: <strong>motobenefits@sp-marketing.com</strong></p>
                            <p>Agradecemos de antemano tu paciencia y recuerda que Motobenefits premia tu esfuerzo.</p>
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

            echo "RECHAZADO";
?>
<script>

    <?php
        if($_GET['motivo']=='otro')
        {
            ?>
                $('#moti<?=$_GET['id']?>').html("<?=$_GET['otro']?>");
            <?php
        }
        else
        {
            ?>
                $('#moti<?=$_GET['id']?>').html("<?=$_GET['motivo']?>");
            <?php
        }
    ?>
    $('#botones<?=$_GET['id']?>').html("");
     $('#motivos<?=$_GET['id']?>').html("");
</script>