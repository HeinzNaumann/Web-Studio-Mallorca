<?php
	
	
$username="flowerpo_studio";
$password="Naumann3856--";
$database="flowerpo_webstudio";	
	
	
$conex = mysql_connect("localhost",$username,$password,$database);



$mysqli->select_db($database) or die( "Unable to select database");
	
	
	
	$mysqli->close();
?>