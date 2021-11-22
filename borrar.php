<?php
	

		if(empty($_POST["nombre"]) == false){
			
				/*Conecta a la base de datos*/
			
									/*servidor*/ /*usuario*/     /*contraseña*/    /*base de datos*/ 
			$conn = mysqli_connect("localhost","flowerpo_studio","Naumann3856--", "flowerpo_webstudio");
			
			
			$yourName = $conn->real_escape_string($_POST['nombre']);
			$yourCompanyName = $conn->real_escape_string($_POST['nombre_compania']);
			$yourEmail = $conn->real_escape_string($_POST['email']);
			$yourDescription = $conn->real_escape_string($_POST['descripcion']);
			$yourBudget = $conn->real_escape_string($_POST['presupuesto']);

			$sql="INSERT INTO formulario_contacto (nombre, nombre_compania, email, descripcion,presupuesto ) VALUES ('".$yourName."','".$yourCompanyName."','".$yourEmail."','".$yourDescription."','".$yourBudget."')";


			if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
				
			} else{
				
				echo json_encode(   '<h2 class="texto_enviado"> ¡Muchas gracias!</h2>
					     <p class="p_texto_enviado"> Un consultor de proyectos se pondrá en contacto con usted enseguida que recibamos su solicitud. </p>
					     <div class="logos_redes_sociales_enviado">
						    <a><img class="imagenes_logos_redes_sociales_enviado_facebook" src="imagenes/logo_facebook.png"></a>
						    <a><img class="imagenes_logos_redes_sociales_enviado" src="imagenes/Logo_twitter.png"></a>
						    <a><img class="imagenes_logos_redes_sociales_enviado" src="imagenes/Logo%20Linkedin.png"></a>
						    <a><img class="imagenes_logos_redes_sociales_enviado" src="imagenes/Logo_instragram.png"></a>
					    </div>'
					     );
			}
			
		}