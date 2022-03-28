<?php  
session_start();
require '../../controller/dbc.php';
$correo = $_SESSION['correo'];
if ($DB == true) {
  
$insert = $DB->prepare("INSERT INTO acciones
                (id_tarea, correo, accion, fecha, estado) 
        VALUES (:id_tarea, :correo, :accion, :fecha, 'Por hacer')");

//insertar campos
$insert->bindParam(':id_tarea', $_POST['id_tarea']);
$insert->bindParam(':correo', $correo);
$insert->bindParam(':accion', $_POST['accion']);
$insert->bindParam(':fecha', $_POST['fecha']);


$insert->execute();
//cierre conex
$DB = null;

//redirex


echo "<script>
window.location = document.referrer;
</script>";
} else {
echo "Error al procesar recurso";
}

// ///


?>
