<?php  
require 'dbc.php';
// validar que los campos no estén vacios
if (empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['correo']) || empty($_POST['password'])){
	echo "<script>
	alert('Uno o más campos están vacios.');
	window.location.href='../index.php';
	</script>"; 
}

// validar datos
$password = $_POST['password'];
$correo_ver = $_POST['correo'];
$registro=$DB->prepare("select * from usuarios where correo=:correo");
$registro->execute(array(':correo'=>$correo_ver));
$reg=$registro->fetch();
if($reg != false){
	echo "<script>
	alert('El correo electrónico ingresado ya se encuentra registrado, por favor ingrese otro.');
	window.location.href='../index.php';
	</script>";
}
else {
//cifrado
	$pass_cifrada = password_hash($password, PASSWORD_DEFAULT, array("cost"=>15));
	if ($DB == true) {
		$insert = $DB->prepare("INSERT INTO usuarios 
			(nombre, apellidos, correo, cargo, password) 
			VALUES 
			(:nombre, :apellidos, :correo, '2', :password)");
//insertar campos
		$insert->bindParam(':nombre', $_POST['nombre']);
		$insert->bindParam(':apellidos', $_POST['apellidos']);
		$insert->bindParam(':correo', $_POST['correo']);
		$insert->bindParam(':password', $pass_cifrada);

		$insert->execute();
//cierre conex
		$DB = null;
//redirex
		echo "<script>
		alert('Usted se ha registrado correctamente.');
		window.location.href='../index.php';
		</script>";
//header('Location: registro.php');
	} else {
		echo "Error al procesar recurso";
	}
}
?>