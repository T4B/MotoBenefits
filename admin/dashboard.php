<?php 
include '../core/init.php';
$general->logged_out_protect();
$username 	= htmlentities($user['username']);

///usuarios totales y su desgloce
$usuarios_totales=$users->usuarios_totales();
$totales=explode(',', $usuarios_totales);
$usuarios_normales=$totales[0];
$usuarios_distribuidores=$totales[1];
$usuarios_total=$totales[2];
//termina
//tabla de modelos vendidos
$tabla_modelos_vendidos=$users->modelos_vendidos();
////termina


//codigo para revisar  numero de usuarios registrados este mes contra los del mes pasado
$usuarios_mes_actual=$users->usuarios_mes_actual();
$usuarios_mes_anterior=$users->usuarios_mes_anterior();
$porcentaje_diferencia=(($usuarios_mes_actual*100)/$usuarios_mes_anterior)-100;
//termina

//codigo para ver ventas realizadas en el mes por usuarios normales y distribuidores, contra el mes pasado
$ventas_registradas_mes_actual=$users->ventas_registradas_mes_actual();
$ventas_registradas_mes_anterior=$users->ventas_registradas_mes_anterior();
$ventas_actuales=explode("|", $ventas_registradas_mes_actual);
$ventas_anterior=explode("|", $ventas_registradas_mes_anterior);
$ventas_del_mes_normales=$ventas_actuales[0];
$ventas_del_mes_distribuidor=$ventas_actuales[1];
$ventas_del_mes_anterior_normales=$ventas_anterior[0];
$ventas_del_mes_anterior_distribuidor=$ventas_anterior[1];
$porcentaje_diferencia_ventas_normales=(($ventas_del_mes_normales*100)/$ventas_del_mes_anterior_normales)-100;
$porcentaje_diferencia_ventas_distribuidor=(($ventas_del_mes_distribuidor*100)/$ventas_del_mes_anterior_distribuidor)-100;
//termina

///codigo para los 6 datos de montos
$montos_todo=$users->pesos_usuario_distribuidor();
$montos=explode("|", $montos_todo);
$montos_distribuidor=explode(",",$montos[1]);
$montos_usuario=explode(",",$montos[0]);
/*
el 0 son los pagados
el 1 son los pendientes
el 2 son los globales
 */
///termina los 6 datos de montos.
?>
<div class="page-title"> <i class="icon-tasks"></i>
  <h3><span class="semi-bold">Dashboard</span></h3>
</div>

<div class="row-fluid spacing-bottom 2col">	
	
	<!-- Usuarios Registrados mes actual -->
	<div class="span4 ">	
		<div class="tiles blue added-margin">
		  <div class="tiles-body">
			<div class="controller">									
			</div>		
			<div class="tiles-title">
				Usuarios registrados mes actual
			</div>	
			<div class="heading">
			<span class="animate-number" data-value="<?=$usuarios_mes_actual?>" data-animation-duration="1200"><?=$usuarios_mes_actual?></span>
									
			</div>
			<div class="progress transparent progress-white progress-small no-radius">
				<div class="bar animate-progress-bar" data-percentage="<?=$usuarios_mes_actual?>%"></div>
			</div>					
			<div class="description"><i class="icon-bar-chart"></i><span class="text-white mini-description ">&nbsp;<?=number_format($porcentaje_diferencia,2,'.',',')?> % <span class="blend"> <b>[<?=$usuarios_mes_anterior?>]</b> mes pasado</span></span></div>
			</div>	
		</div>
	</div>
	<!-- Usuarios Registrados mes actual -->
	
	<!-- Usuarios Registrados mes anterior -->
	<div class="span4 ">
		<div class="tiles green added-margin">
		 <div class="tiles-body">
			<div class="controller">												
			</div>		
			<div class="tiles-title">
				Numero de ventas Canal Directo
			</div>	
			<div class="heading">
				<span class="animate-number" data-value="<?=$ventas_del_mes_normales?>" data-animation-duration="1000"><?=$ventas_del_mes_normales?></span>	
			</div>
			<div class="progress transparent progress-white progress-small no-radius">
					<div class="bar animate-progress-bar" data-percentage="100%"></div>
			</div>				
			<div class="description"><i class="icon-bar-chart"></i><span class="text-white mini-description ">&nbsp; <?=number_format($porcentaje_diferencia_ventas_normales,2,'.',',')?>% <span class="blend"> <b>[<?=$ventas_del_mes_anterior_normales?>]</b> mes pasado</span></span></div>	
		 </div>
		</div>
	</div>
	<!-- Usuarios Registrados mes anterior -->
	
	<!-- Numero de ventas usuario normal -->
	<div class="span4 ">
		<div class="tiles red added-margin">
		<div class="tiles-body">
			<div class="controller">															
				</div>	
			<div class="tiles-title">
				Numero de ventas Canal Alterno
			</div>	
			<div class="heading">
				<span class="animate-number" data-value="<?=$ventas_del_mes_distribuidor?>" data-animation-duration="1200"><?=$ventas_del_mes_distribuidor?></span>	
			</div>
			<div class="progress transparent progress-white progress-small no-radius">
				<div class="bar animate-progress-bar" data-percentage="100%"></div>
			</div>
			<div class="description"><i class="icon-bar-chart"></i><span class="text-white mini-description ">&nbsp; <?=number_format($porcentaje_diferencia_ventas_distribuidor,2,'.',',')?>%  <span class="blend"> <b>[<?=$ventas_del_mes_anterior_distribuidor?>]</b> mes pasado</span></span></div>	
		</div>
		</div>

	</div>
	<!-- Numero de ventas usuario normal -->
</div>

<div class="row-fluid spacing-bottom 2col">	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles purple added-margin">
		  <div class="tiles-body">
			<div class="controller">														
			</div>		
			<div class="tiles-title">
				Total pagado Canal Directo:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=number_format($montos_usuario[0],2,'.',',')?>" data-animation-duration="700">$ <?=number_format($montos_usuario[0],2,'.',',')?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles purple added-margin">
		  <div class="tiles-body">
			<div class="controller">													
			</div>		
			<div class="tiles-title">
				Total pendiente Canal Directo:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=number_format($montos_usuario[1],2,'.',',')?>" data-animation-duration="700">$ <?=number_format($montos_usuario[1],2,'.',',')?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles purple added-margin">
		  <div class="tiles-body">
			<div class="controller">													
			</div>		
			<div class="tiles-title">
				Total global Canal Directo:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=number_format($montos_usuario[2],2,'.',',')?>" data-animation-duration="700">$ <?=number_format($montos_usuario[2],2,'.',',')?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
			
</div>

<div class="row-fluid spacing-bottom 2col">	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles orange added-margin">
		  <div class="tiles-body">
			<div class="controller">												
			</div>		
			<div class="tiles-title">
				Total pagado Canal Alterno:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=number_format($montos_distribuidor[0],2,'.',',')?>" data-animation-duration="700">$ <?=number_format($montos_distribuidor[0],2,'.',',')?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles orange added-margin">
		  <div class="tiles-body">
			<div class="controller">															
			</div>		
			<div class="tiles-title">
				Total pendiente Canal Alterno:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=number_format($montos_distribuidor[1],2,'.',',')?>" data-animation-duration="700">$ <?=number_format($montos_distribuidor[1],2,'.',',')?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles orange added-margin">
		  <div class="tiles-body">
			<div class="controller">														
			</div>		
			<div class="tiles-title">
				Total global Canal Alterno:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=number_format($montos_distribuidor[2],2,'.',',')?>" data-animation-duration="700">$ <?=number_format($montos_distribuidor[2],2,'.',',')?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
			
</div>

<div class="row-fluid spacing-bottom 2col">	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles orange added-margin">
		  <div class="tiles-body">
			<div class="controller">									
			</div>		
			<div class="tiles-title">
				Total usuarios Canal Directo:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=$usuarios_normales?>" data-animation-duration="700"><?=$usuarios_normales?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles orange added-margin">
		  <div class="tiles-body">
			<div class="controller">															
			</div>		
			<div class="tiles-title">
				Total usuarios Canal Alterno:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=$usuarios_distribuidores?>" data-animation-duration="700"><?=$usuarios_distribuidores?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->
	<div class="span4">
		<div class="tiles orange added-margin">
		  <div class="tiles-body">
			<div class="controller">														
			</div>		
			<div class="tiles-title">
				Total usuarios registrados:
			</div>	
			<div class="row-fluid">
				<div class="heading">
					<span class="animate-number" data-value="<?=$usuarios_total?>" data-animation-duration="700"><?=$usuarios_total?></span>	
				</div>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
			
</div>

<div class="row-fluid spacing-bottom 2col">	
	<!-- Numero de ventas distribuidores -->
	<div class="span12">
		<div class="tiles blue added-margin">
		  <div class="tiles-body">
				
			
			<div class="row-fluid">
				<table>
					<tr>
						<th style="background: transparent !important;">Modelo</th>
						<th style="background: transparent !important;">Nombre</th>
						<th style="background: transparent !important;">Cantidad</th>
					</tr>
					<?=$tabla_modelos_vendidos?>
				</table>
				
			</div>
		
			
		 </div>
		</div>
	</div>
	<!-- Numero de ventas distribuidores -->
	
	<!-- Numero de ventas distribuidores -->

	<!-- Numero de ventas distribuidores -->
	
			
</div>