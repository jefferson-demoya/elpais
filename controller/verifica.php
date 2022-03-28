<?php
include ('dbc.php');
session_start();
  if (isset($_SESSION['id'])){header("Location:../index.php");}
require 'dbc.php';
try {
$correo=htmlentities(addslashes($_POST['correo']));
$password=htmlentities(addslashes($_POST['password']));

$contador = 0;//variable auxiliar para comprobar que el usuario existe o no
$sql = "SELECT * FROM usuarios WHERE correo = :correo";
$resultado=$DB->prepare($sql);
$resultado->execute(array(":correo"=>$correo));	
while($login=$resultado->fetch(PDO::FETCH_ASSOC)) {//resultado en un array asociativo tipo while
		
		//traemos los valores de la base de datos en la consulta a voluntad
		// les damos el nombre de una variable
		$id=$login['id'];
		$nombre=$login['nombre'];
		$apellidos=$login['apellidos'];
		$correo=$login['correo'];
		$cargo=$login['cargo'];
		$pass=$login['password'];

		//creamos la session de los datos a lo largo del ciclo de vida en la session
		// e igualamos los valores vacios a los datos obtenidos anteriormente (lo seteamos)
		  $_SESSION['id']=$id;
          $_SESSION['nombre']=$nombre;
          $_SESSION['apellidos']=$apellidos;
          $_SESSION['correo']=$correo;
          $_SESSION['cargo']=$cargo;
          $_SESSION['pass']=$pass;

if(password_verify($password, $login['password'])) {
$contador++; //+1
}
}

	//si es mayor a cero = +1  entonces el usuario existe
if ($contador>0) {
	//echo ucwords($_SESSION['id']);
	//echo ucwords($_SESSION['nombre']);
	echo "el usuario existe";
	// si el usuario existe tramos el valor del cargo o cualquier valor a voluntad
	// que tu hallas iniciado session

	switch ($_SESSION['cargo']) {
		case '2':
			header("location:../r/u/index.php");
		break;
		case '1':
			header("location:../r/a/index.php");
		break;
		default:
		session_start();
session_destroy();
			header("location:../index.php?mensaje=Usuario y/o Clave incorrecta");
		break;
	}
//header("Location:logeado.php");
} 
else

 {
echo "el usuario no existe";
header("location: ../index.php?mensaje=Correo electrónico o contraseña incorrecta.");
}
//cierro la conexion
$conexion = null;
} catch(Exception $e) {
die($e->getMessage());
}
?>