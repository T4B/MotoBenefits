<?php
	include 'core/init.php';
	$general->logged_out_protect();


if($user['image_ife']=="" or $user['ife']=="" or $user['curp']=="" or $user['banco']=="" or ($user['clabe']=="" && $user['cuenta']=="")) {

	?>
	<script>
			window.location="cobranza.php";
	</script>
<?php
}else{
	?>
		<script>
				window.location="aceptar_envio.php";
		</script>
	<?php
}
?>

