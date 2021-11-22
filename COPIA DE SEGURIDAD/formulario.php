

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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

	
	<title> Web studio mallorca </title>
	
	
</head>
<body>
	
	<form action="" method="post">
				
	<input type="text" name="nombre" placeholder="nombre"><br>
	<input type="text" name="nombre_compania" placeholder="nombre_compania"><br>	

	<input type="submit"  value="enviar formulario">
	
	</form>
	
	
	
	

		
		
		<?php
			
			
			
		


		if(empty($_POST["nombre"]) == false){
			
				/*Conecta a la base de datos*/
			
									/*servidor*/ /*usuario*/     /*contraseña*/    /*base de datos*/ 
			$conn = mysqli_connect("localhost","flowerpo_studio","Naumann3856--", "flowerpo_webstudio");
			
			
			$yourName = $conn->real_escape_string($_POST['nombre']);
			$yourEmail = $conn->real_escape_string($_POST['nombre_compania']);
			

$sql="INSERT INTO prueba (pajaro, ciervo) VALUES ('".$yourName."','".$yourEmail."')";


if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Thank you! We will contact you soon";
}
}
else
{
echo "Please fill Name and Email";
}
?>
		
</body>
</html>
