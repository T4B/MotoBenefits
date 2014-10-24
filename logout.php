<?php 
session_start();

		$link=mysql_connect("localhost","motobene_usuario","socio00");
		mysql_select_db("motobene_usuario");

		$query="INSERT INTO `sesion`(`tipo`, `fecha`, `usuario`,ip) VALUES ('salida','".date("Y-m-d H:i:s")."','".$_SESSION['id']."','".$_SERVER['REMOTE_ADDR']."')";
		mysql_query($query);
		
session_destroy();
header('Location:index.php');