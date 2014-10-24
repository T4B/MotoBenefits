<?php
include 'core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);
$lista=$users->tabla_usuarios_mes($_POST['mes'],$_POST['ano']);
echo utf8_encode($lista);
?>