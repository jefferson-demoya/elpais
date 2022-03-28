<?php  
//configuracion de la conexion
$servidor = 'localhost';
$BD = 'bd_el_pais';
$usuario = 'root';
$password = '';

//establezco la conexion con PDO 
$DB = new PDO("mysql:host=$servidor; dbname=$BD", $usuario, $password);
	
//aplico el cotejamiento	
$DB->exec("SET CHARACTER SET utf8");
?>