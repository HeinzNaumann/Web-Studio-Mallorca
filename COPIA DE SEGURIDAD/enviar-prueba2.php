<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
       $mail->SMTPDebug = 2;                  					    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'webstudiomallorca.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@webstudiomallorca.com';                     // SMTP username
    $mail->Password   = 'Naumann3856--';                               // SMTP password
	$mail->SMTPSecure = 'ssl' ;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@webstudiomallorca.com', 'Yo mismo');
    $mail->addAddress('info@webstudiomallorca.com', 'Heinz Naumann');     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto';
    $mail->Body    = 'Hola este es un mensaje de prueba';

    $mail->send();
    echo '<h2 class="texto_enviado"> ¡Muchas gracias!</h2>
					    	 <p class="p_texto_enviado"> Un consultor de proyectos se pondrá en contacto con usted enseguida que recibamos su solicitud. </p>
							 <div class="logos_redes_sociales_enviado">
						    <a><img class="imagenes_logos_redes_sociales_enviado_facebook" src="imagenes/logo_facebook.png"></a>
						    <a><img class="imagenes_logos_redes_sociales_enviado" src="imagenes/Logo_twitter.png"></a>
						    <a><img class="imagenes_logos_redes_sociales_enviado" src="imagenes/Logo%20Linkedin.png"></a>
						    <a><img class="imagenes_logos_redes_sociales_enviado" src="imagenes/Logo_instragram.png"></a>
							</div>';
} catch (Exception $e) {
    echo "Hubo un erorr al enviar el mensaje {$mail->ErrorInfo}";
}