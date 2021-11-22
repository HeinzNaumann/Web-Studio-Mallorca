<?php

//index.php

include('config.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token']))
 {
  $access_token = $_SESSION['access_token'];
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }

 $_SESSION['user_id'] = '';
 $_SESSION['user_name'] = '';
 $_SESSION['user_email_address'] = '';
 $_SESSION['user_image'] = '';

 $graph_response = $facebook->get("/me?fields=name,email", $access_token);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['user_email_address'] = $facebook_user_info['email'];
 }
 
}
else
{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('https://webstudiomallorca.com/login/', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="php-login-with-facebook.gif" /></a></div>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="405889866997-f639rie7ku5ooi3i6leeudeqjeokpvun.apps.googleusercontent.com">
    <title>DevFLix</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    
</head>
<body>

	<header class="site-header">
		<img src="img/cac_logo_2018.png" alt="logotipo" class="logotipo">
		<div class="logout"> <a href="cerrar_sesion.php">Cerrar sesión</a></div> 
	</header>
	
	<main class="formulario-login contenedor">
		
		<form method="get">
			<legend>Inicia Sesión</legend>
			<div class="campo">
				<input type="text" name="usuario" id="usuario">
				<label >Nombre</label>
			</div>
			<div class="campo">
				<input type="password" name="password" id="password">
				<label >Email </label>
				<span>Mostrar</span>
			</div>
			<div class="no_enviado"></div>
			<div class="submit">
				<input type="submit" value="Iniciar Sesión">
			</div>
			<div class="acciones">
				<div class="recuerdame">
	<input type="checkbox" name="remember" id="remember">
					<label>Recuerdame</label>
				</div>
				<div class="ayuda">
					<a href="#">¿Necesitas ayuda?</a>
				</div>
			</div><!--Cierre acciones-->
		</form>
		
				<div class="contenido-inferior">
						<a href="#">Iniciar sesión </a>
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
			<div id="spinner"
		    style="
		        background: #4267b2;
		        border-radius: 5px;
		        color: white;
		        height: 40px;
		        text-align: center;
		        width: 250px;">
		    
		    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
		</div>

        <?php 
    if(isset($facebook_login_url))
    {
     echo $facebook_login_url;
    }
    else
    {
     echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
     echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
     echo '<h3><b>Name :</b> '.$_SESSION['user_name'].'</h3>';
     echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
     echo '<h3><a href="logout.php">Logout</h3></div>';
    }
    ?>
			<p class="nuevo-usuario">
				¿Primera vez? <a href="#">Suscríbete ya</a>
			</p>
		</div>
	</main>
	
	<footer class="site-footer">
		<div class="contenedor">
			<p>¿Preguntas llama al 38383-390434</p>
			
			
			<nav class="menu-footer">
				<a href="#">Términos de las tarjetas de regalos</a>
				<a href="#">Términos de uso </a>
				<a href="#">Declaracion de privacidad</a>
			</nav>
			<select class="lenguaje">
				<option value="eng">English</option>
				<option value="esp">Español</option>
			</select>
		
		</div>
	</footer>
<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
</script>
	

</body>