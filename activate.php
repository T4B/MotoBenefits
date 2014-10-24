<?php 
require 'core/init.php';
$general->logged_in_protect();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Activar</title>
</head>

<body>
<div class="frameT">
<div class="frameTC">

<div class="content">
<?php

if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
    ?>
    <p>Gracias tu cuenta fue activada.<span id="counter" style="visibility: hidden;">5</span></p>
    
    <script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) {
            location.href = 'perfil.php';
        }
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
    setInterval(function(){ countdown(); },1000);
    </script>
    
    <?php
        
} else if (isset ($_GET['email'], $_GET['email_code']) === true) {
    
    $email		=trim($_GET['email']);
    $email_code	=trim($_GET['email_code']);	
    
    if ($users->email_exists($email) === false) {
        $errors[] = 'No hemos encontrado tu correo';
    } else if ($users->activate($email, $email_code) === false) {
        $errors[] = 'No es posible activar tu cuenta';
    }
    
	if(empty($errors) === false){
	?>
	<script type="text/javascript">
	function countdown() {
	    var i = 5;
	    if (parseInt(i)<=0) {
	        location.href = 'perfil.php';
	    }
	    i = parseInt(i)-1;
	}
	setInterval(function(){ countdown(); },1000);
	</script>
	
	<?php
	
		echo '<p>' . implode('</p><p>', $errors) . '</p>';	

	} else {
        header('Location: activate.php?success');
        exit();
    }

} else {
    header('Location: index.php');
    exit();
}
?>
</div>
</div>
</div>
</body>

</html>