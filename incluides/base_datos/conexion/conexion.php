<?php
$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$conexion){
	die('Could not connect: ' . mysql_error());
}
?>