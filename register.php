
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="es"> <![endif]-->
<html lang="en">
<!--<![endif]-->

<head>

<!-- Basic Page Needs -->
<meta charset="utf-8" />
<title>Registro Motobenfits</title>
<meta name="description" content="" />


<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- CSS -->
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/style2.css" rel="stylesheet" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="check_radio/skins/square/aero.css" rel="stylesheet" />

<!-- Toggle Switch -->
<link rel="stylesheet" href="css/jquery.switch.css" />


<!-- Google web font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css' />

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Jquery -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-ui-1.8.12.min.js"></script>

<!-- Wizard-->
<script src="js/jquery.wizard.js"></script>

<!-- Radio and checkbox styles -->
<script src="check_radio/jquery.icheck.js"></script>

<!-- HTML5 and CSS3-in older browsers-->
<script src="js/modernizr.custom.17475.js"></script>

<!-- Support media queries for IE8 -->
<script src="js/respond.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41545798-1', 'moto-benefits.com.mx');
  ga('send', 'pageview');

</script>

</head>


<body>	
	<div class="regresar"><a href="index.php"><b>Regresar</b></a></div>
	<section id="top-area">
		<header>
	         <div class="container">
	         </div><!-- End container -->
	        </header> <!-- End header -->
	        	
	            <div class="container">
	             <div class="row">
	                 <div class="col-md-12 main-title">
	                 <h1>Registro de usuario</h1>
	                </div>
	       		</div>
	            </div>
	 </section>   
	
	
	<section class="container" id="main">

		<div id="survey_container">
		
			<div id="top-wizard">
				<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo '<strong>Registro exitoso. Por favor revisa tu correo.</strong>';
				  ?>
				 <span id="counter" style="visibility: hidden;">5</span>
				 
				 <script type="text/javascript">
				 function countdown() {
				     var i = document.getElementById('counter');
				     if (parseInt(i.innerHTML)<=0) {
				         location.href = 'index.php';
				     }
				     i.innerHTML = parseInt(i.innerHTML)-1;
				 }
				 setInterval(function(){ countdown(); },1000);
				 </script>
				  
				<?php  
				}else{
				?>
				<strong>Progreso <span id="location"></span></strong>
				<div id="progressbar"></div>
				<?php
				}
				?>
				<div style="background-color: #DC5160; color: white;" id="col-md-12 sub-title"><?php 
						if(empty($errors) === false){
							echo '<p style="margin:0 !important; line-height:20px;">' . implode('</p><p style="margin:0 !important; line-height:20px;">', $errors) . '</p>';	
						}
				
						?></div>
				<div class="shadow"></div>
			</div><!-- end top-wizard -->
		    
			<form name="example-1" id="wrapped" action="javascript:irforma('wrapped','registro.php','errores')" method="POST" />
				<div id="middle-wizard">
					<div class="step">
						<div class="row">
							<h3 class="col-md-10">Información personal</h3>
							<div class="col-md-6">
								<ul class="data-list">
									
									<li><input id="cv" style="margin-bottom:0px !important;" type="text" name="cvendedor" class="required form-control" placeholder="Número de empleado sin guión" /><label style="color: gray; font-weight: normal; top: 3px; text-indent: 15px;" for="cv">*Si no lo sabes comunícate a motobenefits@sp-marketing.com</label></li>
									<li><input type="text" name="nombre" class="required form-control" placeholder="Nombre" /></li>
									<li><input type="text" name="apellido" class="required form-control" placeholder="Apellido paterno" /></li>
									<li><input type="text" name="apellido_m" class="required form-control" placeholder="Apellido materno" /></li>
									<li><input type="email" name="email" class="required form-control" placeholder="Email" /></li>
									<li><input type="email" name="email_confirm" class="required form-control" placeholder="Confirmar email" /></li>
									
									
								</ul>
							</div><!-- end col-md-6 -->
		                    
							<div class="col-md-6">
								<ul class="data-list" style="margin-bottom: 0;">
		                    		<li><input type="tel" name="telefono" class="required form-control" placeholder="Telefono" /></li>
		                    	</ul>
								<ul class="data-list">
									
									<li>
									<div class="styled-select">
										<select class="form-control required" name="tipo">
											<option value="" disabled selected>Seleccionar tipo de usuario</option>
											<option value="VD" />Venta Directa
											<option value="VCAP" />VCAP
											<option value="KIOSKO" />KIOSKO
											<option value="SIS" />SIS
											<option value="NST" />NST
											<option value="CC" />Call Click
											<option value="DC" />Dere Comercial
											<option value="EM" />Enlaces de Mexico
											<option value="N1C" />Número 1 Com
											<option value="ALE" />ALEGRATEL
											<option value="GDM" />GDM
											<option value="GNT" />GNT
											<option value="ICA" />ICALL
											<option value="RED" />RED INTELIGENTE
											<option value="ROALCOM" />ROALCOM
											<option value="SIB" />SIBLINSA
										</select>
									</div>
									</li>
								</ul>
		                        
								<ul class="data-list">
									<li>
									<div class="styled-select">
										<select class="form-control required" name="estado">
										<option value="" disabled selected>Seleccionar estado</option>
											<option value="Aguascalientes">Aguascalientes</option>
											<option value="Baja California">Baja California</option>
											<option value="Baja California Sur">Baja California Sur</option>
											<option value="Campeche">Campeche</option>
											<option value="Chiapas">Chiapas</option>
											<option value="Chihuahua">Chihuahua</option>
											<option value="Coahuila">Coahuila</option>
											<option value="Colima">Colima</option>
											<option value="Distrito Federal">Distrito Federal</option>
											<option value="Durango">Durango</option>
											<option value="Estado de México">Estado de México</option>
											<option value="Guanajuato">Guanajuato</option>
											<option value="Guerrero">Guerrero</option>
											<option value="Hidalgo">Hidalgo</option>
											<option value="Jalisco">Jalisco</option>
											<option value="Michoacán">Michoacán</option>
											<option value="Morelos">Morelos</option>
											<option value="Nayarit">Nayarit</option>
											<option value="Nuevo León">Nuevo León</option>
											<option value="Oaxaca">Oaxaca</option>
											<option value="Puebla">Puebla</option>
											<option value="Querétaro">Querétaro</option>
											<option value="Quintana Roo">Quintana Roo</option>
											<option value="San Luis Potosí">San Luis Potosí</option>
											<option value="Sinaloa">Sinaloa</option>
											<option value="Sonora">Sonora</option>
											<option value="Tabasco">Tabasco</option>
											<option value="Tamaulipas">Tamaulipas</option>
											<option value="Tlaxcala">Tlaxcala</option>
											<option value="Veracruz">Veracruz</option>
											<option value="Yucatán">Yucatán</option>
											<option value="Zacatecas">Zacatecas</option>
										</select>
									</div>
									</li>
								</ul>
								
								<ul class="data-list" style="margin-bottom: 0;">
									<li><input type="text" name="ciudad" class="form-control" placeholder="Ciudad" /></li>
								</ul>
		                        
								                        
							</div><!-- end col-md-6 -->
						</div><!-- end row -->
		                
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<ul class="data-list" id="terms">
									<li>
		                            <strong>Aceptar <a href="#" data-toggle="modal" data-target="#terms-txt">terminos y condiciones</a></strong>
									<div style="position:relative">
										<select class=" example-1 required" name="terms">
											<option value="" />No
											<option value="Accepted" />Si
										</select>
									</div>
									</li>
								</ul>
							</div>
						</div>
		                
					</div><!-- end step-->
					
					
		            
					<div class="step row">
						<div class="col-md-10">
							<h3>Crear cuenta</h3>
								<ul class="data-list">
									<li><input type="text" name="username" class="required form-control" placeholder="Nombre de usuario" onkeyup="this.value = this.value.toLowerCase();" /></li>
									<li><input type="password" name="password" class="required form-control" placeholder="Contraseña" /><label style="color: gray; font-weight: normal; top: 3px; text-indent: 15px;" for="cv">*Mínimo 6 caracteres alfanuméricos y comenzar con una letra</label></li>
								</ul>
						</div>
					</div><!-- end step -->
		                       
					<div class="submit step" id="complete">
		                    	<i class="icon-check"></i>
								<h3>Información completada</h3>
								<div id="errores" style="margin-bottom: 10px; color: #F49300;"></div>
								<button type="submit" name="submit" class="submit">Enviar registro</button>
					</div><!-- end submit step -->
		            
		            <div id="bottom-wizard">
		            	<button type="button" name="backward" class="backward">Atras</button>
		            	<button type="button" name="forward" class="forward">Siguiente</button>
		            </div><!-- end bottom-wizard -->
		            
				</div><!-- end middle-wizard -->
	
			</form>
		    
		</div>


	</section>
	
	<!-- Modal Terminos -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="termsLabel">Términos y condiciones</h4>
	      </div>
	      <div class="modal-body">
	        <h4>Aviso de privacidad</h4>
	        <p>Conforme a lo previsto en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, hacemos de su conocimiento, que SP MERCADOTECNIA EN MÉXICO S.A de C.V., con domicilio en Margaritas 19, Col. Florida C.P 01030 en México D.F, es responsable de recabar sus datos personales y del uso, seguridad y confidencialidad que se le dé a los mismos.</p>	        
	        <p><b>I Finalidad de solicitar sus Datos Personales</b></p>
	        <p>Los fines para los que recabamos y utilizamos sus datos personales son:</p>
	        <p><li>Participar en promociones, premios y concursos que organice nuestros clientes,</li>
	        <li>Recibir electrónicamente información,</li>
	        <li>Para las activaciones de los monederos electrónicos,</li>
	        <li>Para la entrega de premios a los ganadores.</li></p>
	        <p><b>II Medios para recabar los Datos Personales</b></p>
	        <p>Para las finalidades señaladas, podemos recabar sus datos personales por diferentes medios:</p>
	        <li>Mediante el uso de correos electrónicos,</li>
	        <li>Mediante el uso de formularios electrónicos de Google Drive</li>
	        <li>Cuando usted nos los proporciona directamente,</li>
	        <li>Cuando se comunica vía telefónica con nosotros,</li>
	        <li>Cuando visita nuestro sitio de Internet o utiliza nuestros servicios en línea,</li>
	        <li>Mediante el uso de herramientas de captura automática de datos,</li>
	        <h4>III Datos Personales que se solicitan</h4>
	        <p>Los datos personales que se solicitan, dependiendo las finalidades para las que se recaban, son: Nombre, Dirección, Teléfono fijo y/o celular, ID de su línea Nextel, Email, RFC, CURP, Fecha de Nacimiento, Ciudad y Estado donde reside.</p>
	        <h4>IV Derechos ARCO</h4>
	        <p>Usted tiene derecho de Acceder a sus datos personales que poseemos y a los detalles del tratamiento de los mismos, así como, a Rectificarlos en caso de ser inexactos o incompletos; Cancelarlos cuando considere que no se requieren para alguna de las finalidades señalados en el presente aviso de privacidad, estén siendo utilizados para finalidades no consentidas o haya finalizado la relación contractual o de servicio, o bien, Oponerse al tratamiento de los mismos para fines específicos.</p>
	         
	         
	        <h4>V Responsable de los Datos Personales</h4>
	        <p>Hemos designado al departamento Jurídico como responsable de la custodia de los Datos Personales, el cual dará trámite a las solicitudes y fomentará la protección de los Datos Personales al interior de la empresa.</p>
	        <p>Las formas de contacto son:
	        <li>Domicilio: Margaritas 19, Col. Florida C.P 01030 en México D.F</li>
	        <li>Teléfono: 01 (55) 43417659</li>
	        <li>Correo electrónico:     manuel.martinez@spgmexico.com<br />
	        angelica.simon@spgmexico.com<br />
	        legales@spgmexico.com</li>
</p>	           <h4>VI  Como ejercer sus derechos ARCO</h4>
	        <p>Los mecanismos que se han implementado para el ejercer estos derechos son a través de la presentación de una solicitud que deberá contener por lo menos lo siguiente:</p>	       
	       <p> <li>Nombre completo, dirección, correo electrónico, teléfono fijo y/o celular del titular de los Datos Personales, u otro medio para comunicarle la respuesta a su solicitud.</li>
	        <li>Documentos que acrediten la identidad o la representación legal del titular de los Datos Personales.</li>
	        <li>Descripción clara y precisa de los Datos Personales respecto de los que se busca ejercer alguno de los derechos antes mencionados.</li>
	        <li>Cualquier otro elemento o documento que facilite la localización de los Datos Personales.</li>
	       <li> Indicar de las modificaciones a realizarse y/o las limitaciones al uso de los Datos Personales, conforme a lo establecido en el apartado 6.2. del presente Aviso de Privacidad.</li>
	        <li>Aportar la documentación que sustente su petición.</li></p>
	        <p>Nos comprometemos a comunicar al titular de los Datos Personales la determinación adoptada, en un plazo no mayor a 20 días hábiles contados desde la fecha en que se recibió la solicitud. Este plazo podrá ser ampliado en una sola ocasión por un periodo igual, siempre y cuando así lo justifiquen las circunstancias del caso.</p>
	        <p>Con base en lo anterior, y de acuerdo con lo establecido en la Ley, informaremos al titular de los Datos Personales el sentido y motivación de la resolución, por el mismo medio por el que se llevó a cabo la solicitud, y acompañará dicha resolución de las pruebas pertinentes, en su caso.</p>
	        <p>Cuando la solicitud sea procedente, se hará efectiva dentro de los 15 días hábiles siguientes a la comunicación de la resolución adoptada.</p>
	        <p>El titular podrá presentar ante el Instituto Federal de Acceso a la Información (IFAI) una solicitud de protección de datos por la respuesta recibida o falta de respuesta de nosotros. Dicha solicitud deberá presentarse por el titular dentro de los 15 días hábiles siguientes a la fecha en que se comunique la respuesta al titular por parte de nosotros, y se sujetará a lo previsto en la Ley.</p>
	        <p>En caso de solicitudes de acceso a Datos Personales, será necesario que el solicitante o su representante legal acrediten previamente su identidad.</p>
	        <p>La obligación de acceso a la información se dará por cumplida cuando pongamos a disposición del titular los Datos Personales o mediante la expedición de copias simples o documentos electrónicos.</p>
	        <p>En el supuesto en que una persona solicite el acceso a sus Datos Personales presumiendo que éste es el responsable y resultara que no lo es, bastará con que así se lo indiquemos al titular por cualquier medio, (de los establecidos en este apartado), para tener por desahogada la solicitud.</p>
	        <p>Podremos negar el acceso total o parcial a los Datos Personales o a la realización de la rectificación, cancelación u oposición al tratamiento de los mismos, en los siguientes supuestos:</p>
	        <p><li>Cuando el solicitante no sea el titular o el representante legal no esté acreditado para ello.</li>
	        <li>Cuando en nuestra Base de Datos no se encuentren los Datos Personales del solicitante.</li>
	        <li>Cuando se lesionen los derechos de un tercero.</li>
	        <li>Cuando exista impedimento legal o resolución de una autoridad.</li>
	        <li>Cuando la rectificación, cancelación u oposición haya sido previamente realizada, de manera que la solicitud carezca de materia.</li></p>
	        <h4>VII Transferencia de Datos</h4>
	        <p>En caso, de que llegáramos a transferir sus Datos Personales a alguno de nuestros clientes con el fin de llevar a cabo las Finalidades del tratamiento establecidas en el presente Aviso de Privacidad, se  hará previa celebración de convenios de confidencialidad, siempre y cuando el cliente o persona a quien se le transmitan, acepte someter el tratamiento de los Datos Personales al presente Aviso de Privacidad,</p>
	        <p>Si usted no manifiesta su oposición para que sus Datos Personales sean transferidos a terceros, se entenderá que ha otorgado su consentimiento para ello.</p>
	        <p>Nos comprometemos a no transferir su información personal a terceros sin su consentimiento, salvo las excepciones previstas en el artículo 37 de esta Ley.</p>
	        <h4>VIII Uso de Cookies</h4>
	        <p>El prestador por su propia cuenta o la de un tercero contratado para la prestación de servicios de medición, pueden utilizar cookies cuando un usuario navega por el sitio web. Las cookies son ficheros enviados al navegador por medio de un servidor web con la finalidad de registrar las actividades del usuario durante su tiempo de navegación.</p>
	        <p>Las cookies utilizadas por el sitio web se asocian únicamente con un usuario anónimo y su ordenador, y no proporcionan por sí mismas los datos personales del usuario.</p>
	        <p>Mediante el uso de las cookies resulta posible que el servidor donde se encuentra la web, reconozca el navegador web utilizado por el usuario con la finalidad de que la navegación sea más sencilla, permitiendo, por ejemplo, el acceso a los usuarios que se hayan registrado previamente, acceder a las áreas, servicios, promociones o concursos reservados exclusivamente a ellos sin tener que registrarse en cada visita. Se utilizan también para medir la audiencia y parámetros del tráfico, controlar el progreso y número de entradas.</p>
	        <p>El usuario tiene la posibilidad de configurar su navegador para ser avisado de la recepción de cookies y para impedir su instalación en su equipo. Por favor, consulte las instrucciones y manuales de su navegador para ampliar esta información.</p>
	        <p>Para utilizar el sitio web, no resulta necesario que el usuario permita la instalación de las cookies enviadas por el sitio web, o el tercero que actúe en su nombre, sin perjuicio de que sea necesario que el usuario inicie una sesión como tal en cada uno de los servicios cuya prestación requiera el previo registro o “login”.</p>
	        <p>Las cookies utilizadas en este sitio web tienen, en todo caso, carácter temporal con la única finalidad de hacer más eficaz su transmisión ulterior. En ningún caso se utilizarán las cookies para recoger información de carácter personal.</p>
	        <h4>IX DIRECCIONES IP</h4>
	        <p>Los servidores del sitio web podrán detectar de manera automática la dirección IP y el nombre de dominio utilizados por el usuario. Una dirección IP es un número asignado automáticamente a un ordenador cuando ésta se conecta a Internet. Toda esta información es registrada en un fichero de actividad del servidor debidamente inscrito que permite el posterior procesamiento de los datos con el fin de obtener mediciones únicamente estadísticas que permitan conocer el número de impresiones de páginas, el número de visitas realizadas a los servicios web, el orden de visitas, el punto de acceso, etc.</p>
	        <h4>X Cambios en el Aviso de Privacidad</h4>
	        <p>Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad, para la atención de novedades legislativas, políticas internas o nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos.</p>
	        <p>Estas modificaciones estarán disponibles al público a través de anuncios, trípticos o folletos  visibles en nuestros establecimientos o centros de atención, en nuestra página de Internet o se las haremos llegar al último correo electrónico que nos haya proporcionado.</p>
	        <p>Fecha última actualización: 10 de junio 2013</p>
	        <h4>XI Consideración final</h4>
	        <p>El contenido de este Aviso de Privacidad es de carácter informativo, por lo que en caso de que desees expresar su aceptación o rechazo al contenido del mismo, o ya no desea seguir recibiendo información electrónica de nosotros a través de nuestro portal en línea, lo invitamos a que envíe la solicitud correspondiente directamente al responsable de los Datos Personales que se indica en el apartado  V de este documento.</p>
	        <p>Así también, si usted considera que su derecho de protección de datos personales ha sido lesionado por alguna conducta de nuestros empleados o de nuestras actuaciones o respuestas, presume que en el tratamiento de sus datos personales existe alguna violación a las disposiciones previstas en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, no dude en contactar a nuestro responsable de Datos Personales quién tiene la obligación de atender su queja y dar respuesta oportuna a la resolución de la misma.</p>	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<!-- OTHER JS --> 
	<script src="js/jquery.validate.js"></script>
	<script src="js/jquery.placeholder.js"></script>
	<script src="js/jquery.switch.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/ajax.js"></script>
	<script type="text/javascript">
	</script>
</body>
</html>



























