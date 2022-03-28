<?php
require_once '../../controller/dbc.php';
$correo = $_SESSION['correo'];
?>

<div class="col-md-8 col-xl-9 " >
	<h1 align="center"><b>Listas to do</b></h1><br>	
</div>
<br>

<?php foreach ($DB->query('SELECT * FROM tareas WHERE creador NOT LIKE "'.$correo.'"') as $row){  ?> 
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
						<a href="ver-lista-otros.php?/=<?php echo $row['id']; ?>" type="button" class="btn btn-outline-info"><span class="glyphicon glyphicon-edit"></span> Ver lista</a> &nbsp&nbsp
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