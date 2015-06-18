<?php

$database = "NATACIO";

$connection = mysql_connect("localhost", "root", "1234") 
	or die("No se conecta a base de datos.");
	
$results = mysql_select_db($database) or die ("La base de datos no puede ser seleccionada");

?>
