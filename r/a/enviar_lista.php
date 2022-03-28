<?php  
require '../../controller/dbc.php';
if ($DB == true) {
  
$insert = $DB->prepare("INSERT INTO tareas
                (creador,  titulo, fecha, estado, descripcion) 
        VALUES (:creador,  :titulo,  :fecha, 'Nuevo', :descripcion)");

//insertar campos
$insert->bindParam(':titulo', $_POST['titulo']);
$insert->bindParam(':creador', $_POST['creador']);
$insert->bindParam(':fecha', $_POST['fecha']);
$insert->bindParam(':descripcion', $_POST['descripcion']);

$insert->execute();
//cierre conex
$DB = null;
//redirex
echo "<script>
alert('Lista creada correctamente.');
window.location.href='index.php';
</script>";
} else {
echo "Error al procesar recurso";
}
?>
