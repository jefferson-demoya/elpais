<?php
require_once '../../controller/dbc.php';
$correo = $_SESSION['correo'];
?>

<div class="col-md-8 col-xl-9 " >
	<h1 align="center"><b>Listas to do</b></h1><br>	
	<div align="right" >
		<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#CrearListaModal">
			Crear una lista
		</button>
	</div>
</div>
<br>

<?php foreach ($DB->query('SELECT * FROM tareas WHERE creador LIKE "'.$correo.'"') as $row){  ?> 
	<div class="row" >
		<div class="col-md-8 col-xl-9 carta-top"><br>
			<h3 align="center"><?php echo $row['titulo'] ?></h3>
			<div class="row">
				<div class="col-md-12">
					<div class="md-form">
						<textarea class="form-control" rows="4" cols="50" style="background-color: #f9f9f9; border-color: white;" disabled readonly><?php echo $row['descripcion'] ?></textarea>
					</div>
					<br>
					<div align="right" >
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal<?php echo $row['id'] ?>">
							Eliminar lista
						</button>	 &nbsp&nbsp
						<a href="ver-lista.php?/=<?php echo $row['id']; ?>" type="button" class="btn btn-outline-info"><span class="glyphicon glyphicon-edit"></span> Actualizar lista</a>
					</div>
					<br>
					<div align="right" style="font-size: 11px!important;"><?php echo $row['estado'] ?> - <?php echo $row['fecha'] ?></div>
				</div>
			</div><br>
		</div>
	</div>  <br>
	<?php
}
?>

<!-- Modal -->
<div class="modal fade" id="CrearListaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Creación de lista To DO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="contact-form" action="enviar_lista.php" method="POST">
				<div class="modal-body">
					<div class="row" >
						<div class="carta-top-1"><br>
							<h3 align="center">Crear lista</h3>
							<div class="row">
								<div class="col">
									<div class="md-form">
										<label  class="">Título:</label>
										<input type="text" class="form-control" placeholder="Titulo..." name="titulo" onkeyup="this.value=Textos(this.value)" required>
										<input type="text" class="form-control" value="<?php echo $correo?>" name="creador" hidden>
										<br>
										<label  class="">Descripción:</label>
										<textarea class="form-control" rows="4" cols="50" placeholder="Descripcion..." name="descripcion" onkeyup="this.value=Textos(this.value)" required></textarea>
										<input  name="fecha" hidden  value="<?php echo date("Y/m/d");?>"> 
										<label  class="">&nbsp</label><br>
									</div>
								</div>
							</div><br>
						</div>
					</div>  
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
					<button class="btn btn-outline-success">Crear</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="info">
	<?php
	$stmt = $DB->prepare('SELECT * FROM tareas WHERE creador LIKE "'.$correo.'"');
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<!-- Modal -->
			<div class="modal fade" id="Modal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">¿Está seguro que desea eliminar esta lista?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<b>Titulo:</b> <?php echo $row['titulo'] ?>.<br>
							<b>Descripción:</b> <?php echo $row['descripcion'] ?><br>
							<b>Creado el:</b> <?php echo $row['fecha'] ?>.<br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<a class="btn btn-danger" href="?borrar_lista=<?php echo $row['id'] ?>" title="Eliminar">Eliminar</a>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
	?>
</div>

<?php if(isset($_GET['borrar_lista']))
{
	$stmt_delete = $DB->prepare('DELETE FROM tareas WHERE id =:uid');
	$stmt_delete->bindParam(':uid',$_GET['borrar_lista']);
	echo "<script>
alert('Lista eliminada.');
window.location.href='index.php';
</script>";
	$stmt_delete->execute();
}
?>
