<?php
require 'core/init.php';
$general->logged_in_protect();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <title>Recuperar Contraseña</title>
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
    <div id="container">
    	<?php
        if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
            ?>
            <h3>Gracias te hemos enviado una nueva contraseña a tu correo.</h3>
            <?php
            
        } else if (isset ($_GET['email'], $_GET['generated_string']) === true) {
            
            $email		=trim($_GET['email']);
            $string	    =trim($_GET['generated_string']);	
            
            if ($users->email_exists($email) === false || $users->recover($email, $string) === false) {
                $errors[] = 'Lo sentimos, no ha sido posible generar una nueva contraseña.';
            }
            
            if (empty($errors) === false) {    		

        		echo '<p>' . implode('</p><p>', $errors) . '</p>';
    			
            } else {

                header('Location: recuperar.php?success');
                exit();
            }
        
        } else {
            header('Location: index.php'); // If the required parameters are not there in the url. redirect to index.php
            exit();
        }
        ?>
    </div>
</body>
</html>