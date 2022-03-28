<?php
session_start();
switch ($_SESSION['cargo']) {
		//Redirec segun cargo.

		case '2':
			header("location:../r/u/index.php");
		break;

		case '1':
			header("location:../r/a/index.php");
		break;

		default:
			header("location:../index.php?mensaje=Usuario y/o Clave incorrecta");
		break;
	}
?>
