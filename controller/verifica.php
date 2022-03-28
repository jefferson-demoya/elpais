<?php session_start();
error_reporting(0);
  if (isset($_SESSION['id'])){header("Location:../index.php");}
require 'dbc.php';
try {
$correo=htmlentities(addslashes($_POST['correo']));
$password=htmlentities(addslashes($_POST['password']));

$contador = 0;//variable auxiliar para comprobar que el usuario 
$sql = "SELECT * FROM usuarios WHERE correo = :correo";
$resultado=$DB->prepare($sql);
$resultado->execute(array(":correo"=>$correo));	
while($login=$resultado->fetch(PDO::FETCH_ASSOC)) {//resultado en un array asociativo tipo while

//se traen los valores de la base de datos a la consulta 
// les damos el nombre de una variable
$id=$login['id'];
$nombre=$login['nombre'];
$apellidos=$login['apellidos'];
$correo=$login['correo'];
$cargo=$login['cargo'];
$pass=$login['password'];

//crea la session de los datos a lo largo del ciclo de vida en la session
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
// si el usuario existe tramos el valor del cargo 

switch ($_SESSION['cargo']) {
case '2':
?>
<script type="text/javascript">
window.location.href = '../r/u/index.php';
</script>
<?php
break;
case '1':

?>
<script type="text/javascript">
window.location.href = '../r/a/index.php';
</script>
<?php
break;
default:
session_start();
session_destroy();
?>
<script type="text/javascript">
window.location.href = '../index.php?mensaje=Usuario y/o Clave incorrecta';
</script>
<?php
break;
}
} 
else
{
?>
<script type="text/javascript">
window.location.href = '../index.php';
</script>
<?php
}
//cierro la conexion
$conexion = null;
} catch(Exception $e) {
die($e->getMessage());
}
?>