<?php
	if(isset($_GET['submit'])){
		echo $_GET['nombre'];
		echo $_GET['nombre_compania'];
		echo $_GET['descripcion'];
		echo $_GET['presupuesto'];
	}
?>
	<!DOCTYPE html>

<html lang="es">
<head>
		<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta name="description" content="Estudio de diseño de páginas web y marketing digital en mallorca, especialistas SEO, desarrollo web y programación para llevar tu negocio o marca personal al mundo online. ">
	<meta property="og:locale" content="es_ES">
	<meta property="og:type" content="website">
	<meta property="og:title" content=" Estudio de diseño de páginas web y marketing digital">
	<meta property="og:description" content="Estudio de diseño de páginas web y marketing digital en mallorca, especialistas SEO, desarrollo web y programación para llevar tu negocio o marca personal al mundo online.">
	<meta property="og:url" content="https://wwww.webstudiomallorca.com">
	<meta property="og:site_name" content="Web studio mallorca">
	<link rel="canonical" href="https://www.webstudiomallorca.es/">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-W4QBW54');</script>
	<!-- End Google Tag Manager -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162218190-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-162218190-1');
	</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link type="text/css" href="assets/style_sobre_nosotros.css" rel="stylesheet">
	<link type="text/css" href="assets/transformicons.css" rel="stylesheet">
	<link type="text/css" href="assets/tablet.css" rel="stylesheet">
	<link type="text/css" href="assets/movil.css" rel="stylesheet">
	<title> Web studio mallorca </title>
	
	
	
</head>
<body class='pajaro'>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W4QBW54"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<div class="contenedor">
				<header class="header">
					<div class="barra">
							<div class="logo">
						        <a href="index.html"> 
							        <h1>Web studi <img id="logo" src="imagenes/logo_amarillo_web_studio_mallorca.png" alt="logo amarillo web studio mallorca" >
								        		  <img id="logo2" src="imagenes/logo_negro_web_studio_mallorca.png" alt="logo amarillo web studio mallorca"> 
								         mallorca
								    </h1>
								</a>	
							</div>    
							<nav class="navegacion">
							<div class="menu">
							        <ul id="container">
										<li><a class="btn " href="index.html">Inicio</a></li>
										<li><a class="btn" href="servicios.html">Servicios</a></li>
										<li><a class="btn " href="sobre_nosotros.html">Sobre nosotros</a></li>
							        	<li><a class="btn" href="contacto.php">Contacto</a></li>
							        	<li><a class="btn active" href="tel:+34871811964">871-811-964</a></li>
							        </ul>
								</div>	
						    
							    <div class="transformicon">
										<button type="button" class="tcon toggle-menu tcon-menu--xbutterfly" aria-label="toggle menu">
										<span class="tcon-menu__lines" aria-hidden="true"></span>
										<span class="tcon-visuallyhidden">toggle menu</span>
										</button>
								</div>
							</nav>
					</div>
			        <button type="button"  class="boton_movil" onclick="location.href='contacto.php'"> Contáctanos </button>
			    </header>   
	  </div>  
	
		<div class="debajo_cta">
	    			
						<div class="contacto">
							<div class="texto_contacto">
								<h2 class="contactanos_contacto"> Contáctanos </h2>
								<p> Crear experiencias digitales preparadas para el futuro es lo que hacemos. Cuéntanos sobre tus necesidades, nos encantaría colaborar contigo.</p>
								<a class="email_linea" href="mailto:contacto@webstudiomallorca.com"> contacto@webstudiomallorca.com</a>
							</div>
					    
					        
					        <form id="formulario" class="forumlario_contacto" action="contacto.php" method="POST" enctype="multipart/form-data" name="mi_formulario"><p class="requerido_formulario"> <span class="asterisco_solo">*</span> campos requeridos </p><span class="asterisco"></span>
					        	<input name="nombre" id="nombre" type="text" placeholder="TU NOMBRE" required="required"   > <span class="asterisco"></span><span class="fallo_campo_requerido"></span>
					        	<input name="tel" id="nombre_empresa" type="text" placeholder="TELEFONO" required="required"><span class="asterisco"></span><span class="fallo_campo_requerido2"></span>
					        	<input name="email" id="email" type="email" placeholder="EMAIL" required="required"><span class="asterisco"></span><span class="fallo_campo_requerido3"></span>
					        	<textarea name="descripcion" id="describe"  type="text" cols="20" rows="4" placeholder="DESCRIBE TU PROYECTO" required="required"></textarea><span class="fallo_campo_requerido4"></span>
					        	<input name="presupuesto" type="text"  placeholder="PRESUPUESTO PARA EL PROYECTO">
					        	<div class="caja_adjuntar">
						        	<span class="texto_adjunta"> Adjunta un archivo</span>
						        	<label for="file-input">
							       	 <i class="material-icons icono_adjunto"> attach_file</i>
							       	
									</label>
									<div class="caja_texto_requerido">
										<span class="requerido_adjuntar"> Adjunta cualquier documento importante. Máximo de 10mb.</span>
									</div>
						        	<input id="file-input" type="file" name="uploadme" class="adjuntar" onchange="texto_attach()">
					        	</div>
					        	<button type="button" name="flowerpo_webstudio" onclick="myFunction()"> ENVIAR </button>
					        	<div class="todos"></div>
					        </form>
						</div>
				     <div id="enviado"></div>
</div>				
					
			    
			    <hr>
			    
			    <div class="texto-contacto-email">
						<h2 class="otras_formas_contacto"> Otras formas de contactarnos: </h2>
						<div class="emails_contacto">
							<div class="texto_contacto_email"> 
								<p> General</p>
								<a class="email_linea" href="mailto:info@webstudiomallorca.com"> info@webstudiomallorca.com</a>
							</div>
							<div class="texto_contacto_email"> 
								<p> Prensa</p>
								<a class="email_linea" href="mailto:prensa@webstudiomallorca.com"> prensa@webstudiomallorca.com</a>
							</div>
							<div class="texto_contacto_email">
								<p> Vacantes </p>
								<a class="email_linea" href="mailto:jobs@webstudiomallorca.com"> jobs@webstudiomallorca.com</a>
							</div>
			    		</div>
				</div>
			    
				<footer class="footer">
					    <div class="footer_int">

							<div class="logos_redes_sociales">
						    	<a href="https://www.facebook.com/Web-studio-Mallorca-112947810356428/"> <img class="imagenes_logos_redes_sociales_facebook" src="imagenes/logo_facebook.png" alt="logo de facebook"></a>
								<a href="https://twitter.com/web_mallorca"><img class="imagenes_logos_redes_sociales_twitter" src="imagenes/Logo_twitter.png" alt="logo de twitter"></a>
								<a href="https://www.linkedin.com/company/65278615/"><img class="imagenes_logos_redes_sociales" src="imagenes/Logo%20Linkedin.png" alt="logo de linkedin"></a>
								<a href="https://www.instagram.com/web_studio_mallorca/"><img class="imagenes_logos_redes_sociales" src="imagenes/Logo_instragram.png" alt="logo de instagram"></a>
							</div>

							<div class="direccion_footer">
									<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
										<p class="titulo_direccion"><span itemprop="addressRegion" >MALLORCA</span></p>
												<p>
													<span itemprop="streetAddress">Calle Fetget, 3 Bajos<br></span><span itemprop="postalCode">07560</span>
													<span itemprop="addressLocality">Cala Millor</span>, <br>
													<span itemprop="addressRegion">Islas Baleares</span> 
												</p>
												<p>Tel:
													<a href="tel:+34871811964" data-wpel-link="internal">
													<span itemprop="telephone">871811964</span></a>
												</p>
												<p class="directions"><a target="_blank" href="https://goo.gl/maps/SGoAp51U8aaCdQZg8" data-wpel-link="external" rel="nofollow external noopener noreferrer">Obtener dirección </a></p>
									</div>
							</div>
							
							<div class="menu_footer">
								<h2>LINKS DE INTERES</h2>
								<ul>
									<li><a href="contacto.php">Pide presupuesto</a></li>
									<li><a href="servicios.html">Servicios</a></li>
									<li><a href="sobre_nosotros.html">Sobre nosotros</a></li>
									<li><a href="contacto.php">Contacto</a></li>
									<li><a href="contacto.php">FAQS</a></li>
								</ul>
							</div>	

							<div class="logo_texto_subir">
							    <a class="prueba" href="#"><img src="imagenes/Logo_subir.png"></a>
							    <p class="texto_logo_subir"> Volver arriba</p>
							</div>

																
					    </div> 
					    <a class="logo-whatsapp" href="https://wa.me/+34684106108/?text=Hola, te escribo desde Web Studio Mallorca"> <img src="imagenes/whatsapp.png"></a>

						<hr class="linea_footer">
						<div class="copyright"> 
							<p>
								<a  class="enlaces_footer" href="cookies.html"> Cookies </a>
								<a  class="enlaces_footer" href="terminos_condiciones.html"> Términos y condiciones </a>
								<a  class="enlaces_footer" href="politica_privacidad.html"> Política de Privacidad </a> 
							</p>
							<p>© 2020 Web Studio Mallorca | Compañia de diseño y desarrollo Web.  </p>
						</div>
	
			    </footer>
		
<?php

		
				error_reporting(E_ALL);
		$upload_complete = false;
		if(isset($_FILES['uploadme']) && $_FILES['uploadme']['size'] > 0) {
			$target_dir = '/home/customer/www/webstudiomallorca.com/public_html/upload/';
			$target_file = $target_dir . time() . '-' . $_FILES['uploadme']['name']; 
			
			
			// Check if Destination File already exists.
			if(!file_exists($target_file)) {
				
				if($_FILES['uploadme']['size'] < 5000000){
					// Get file extension
					$ext = pathinfo($target_file, PATHINFO_EXTENSION);
					$allowed_ext = array('jpg','jpeg', 'png', 'gif');
					if(in_array($ext, $allowed_ext)){
						if(move_uploaded_file($_FILES['uploadme']['tmp_name'], $target_file)){
							echo '<p> Archivo subido</p>'; 
							$upload_complete = true;
					}else{
						echo'<p> Could not move to destination</p>';
						}		
					}else
						echo '<p> No permitido </p>';
				}
			}
		}
		
		
			if($upload_complete){
		?>
		
		<p> Archivo subido eres el amo</p>
		
		<pre> 
			
			<? print_r($_FILES['uploadme']); ?> 
			target: <? $target_file; ?>
		</pre>
		
<?  } else { ?> 
			
			
		
<? } ?>	
		
	<script type="text/javascript" src="assets/transformicons_sn.js"></script>
	
</body>
</html>
