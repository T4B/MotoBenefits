<?php 
include '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);
$image = $user['image_location'];
?>

<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8" />
<title>MOTOBENEFITS - ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN PLUGIN CSS -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css" />
<!-- END CSS TEMPLATE -->
<link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css" />
</head>
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation">
      <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu" class="">
          <div class="iconset top-menu-toggle-white"></div>
          </a> </li>
      </ul>
      <!-- BEGIN LOGO -->
      <a href="index.php"><img src="assets/img/logo.png" class="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo2x.png" width="106" height="92" /></a>
      <!-- END LOGO -->
      <ul class="nav pull-right notifcation-center">
        <li class="dropdown" id="header_task_bar"> <a href="index.php" class="dropdown-toggle active" data-toggle="">
          <div class="iconset top-home"></div>
          </a> </li>
        
        <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle">
          <div class="iconset top-chat-white "></div>
          </a> </li>
      </ul>
    </div>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <div class="header-quick-nav">
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="pull-left">
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle">
            <div class="iconset top-menu-toggle-dark"></div>
            </a> </li>
        </ul>
        
      </div>
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right"> 
		
		 <ul class="nav quick-section ">
			<li class="quicklinks"> 
				<a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
					<div class="iconset top-settings-dark "></div> 	
				</a>
				<ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
                  <li><a href="../perfil.php"> Mi cuenta</a>
                  </li>                  
                  <li class="divider"></li>                
                  <li><a href="../logout.php"><i class="icon-off"></i>&nbsp;&nbsp;Cerrar sesión</a></li>
               </ul>
			</li> 
			<li class="quicklinks"> <span class="h-seperate"></span></li> 
			<li class="quicklinks"> 	
			<a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle"><div class="iconset top-chat-dark "></div>
			</a> 
				<div class="simple-chat-popup chat-menu-toggle hide">
					<div class="simple-chat-popup-arrow"></div>
				</div>
			</li> 
		</ul>
      </div>
      <!-- END CHAT TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" id="main-menu">
  <!-- BEGIN MINI-PROFILE -->
  <div class="user-info-wrapper">
    <div class="profile-wrapper"> <img src="../<?=$image?>" data-src="../<?=$image?>" data-src-retina="../<?=$image?>" width="69" height="69" /> </div>
    <div class="user-info">
      <div class="greeting">Bienvenido</div>
      <div class="username"><?php echo $username; ?></div>
      <div class="status">Estado<a href="#">
        <div class="status-icon green"></div>
        Online</a></div>
    </div>
  </div>
  <!-- BEGIN SIDEBAR MENU -->

  <ul>
    <li class="start active "> <a href="index.php"> <i class="icon-custom-home"></i> <span class="title">Panel de Control</span> <span class="selected"></span> </a> </li>
    
    <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Ventas Validadas</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
        <li> <a href="#" id="ventas_validadas">Canal Directo</a> </li>
        <li> <a href="#" id="ventas_validadas_dist">Canal Alterno</a> </li>
        <li> <a href="#" id="ventas_validadas_temp">Temporales Canal Directo</a> </li>
        <li> <a href="#" id="ventas_validadas_dist_temp">Temporales Canal Alterno</a> </li>
      </ul>
    </li>
    <li class=""> <a href="javascript:;"> <i class="icon-user"></i> <span class="title">Datos de Usuarios</span> <span class="arrow "></span> </a>
      <ul class="sub-menu">
      	<li> <a href="#" id="usuarios_mes">Usuarios Registrados</a> </li>
        <li> <a href="#" id="usuarios_activos">Usuarios Activos/Inactivos</a> </li>
        <li> <a href="#" id="cobranza_completos">Datos de cobranza incompletos</a> </li>
        <li> <a href="#" id="pagos">Solicitudes de pago</a> </li>
      </ul>
    </li>
    
  </ul>
  
  <a href="#" class="scrollup">Scroll</a>
  <div class="clearfix"></div>
  <!-- END SIDEBAR MENU -->
</div>
<div class="footer-widget">
  <div class="progress transparent progress-success progress-small no-radius no-margin">
    <div data-percentage="100%" class="bar animate-progress-bar"></div>
  </div>
  <div class="pull-right">
    <div class="details-status"> <span data-animation-duration="560" data-value="100" class="animate-number"></span>% </div>
    <a href="../perfil.php"><i class="icon-off"></i></a></div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
  <div id="portlet-config" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button"></button>
      <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
  </div>
  <div class="clearfix"></div>
  <div class="content">


  </div>
  <!-- END PAGE -->
</div>
</div>
<!-- BEGIN CHAT -->
<div id="sidr">
  <div class="chat-window-wrapper">
    <div class="side-widget">
      <div class="side-widget-title">MUSTRAS DE PERFIL</div>
      <div class="side-widget-content">
        <div id="groups-list">
          <ul class="groups">
            <li><a href="../muestra_cd.php">
              <div class="status-icon green"></div>
              Perfil Canal Directo</a></li>
            <li><a href="../muestra_ca.php">
              <div class="status-icon red"></div>
              Perfil Canal Alterno</a></li>
          </ul>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- END CHAT -->
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/modernizr.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/boostrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- PAGE JS -->
<script src="assets/js/icon.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->

<script type="text/javascript">

$(".content").load("dashboard.php");

$('#ventas_validadas').click(function(){
   $(".content").load("ventas_validadas.php");
   return false;
});

$('#ventas_validadas_dist').click(function(){
   $(".content").load("ventas_validadas_dist.php");
   return false;
});

$('#ventas_validadas_temp').click(function(){
   $(".content").load("ventas_validadas_temp.php");
   return false;
});

$('#ventas_validadas_dist_temp').click(function(){
   $(".content").load("ventas_validadas_dist_temp.php");
   return false;
});

$('#usuarios_activos').click(function(){
   $(".content").load("usuarios_activos.php");
   return false;
});

$('#cobranza_completos').click(function(){
   $(".content").load("usuarios_cobranza.php");
   return false;
});

$('#usuarios_mes').click(function(){
   $(".content").load("usuarios_mes.php");
   return false;
});

$('#pagos').click(function(){
   $(".content").load("solicitudes.php");
   return false;
});


</script>

</body>
