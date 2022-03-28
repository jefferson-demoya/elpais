<?php
session_start();
if($_SESSION['cargo'] != 2){
	header('location: ../../index.php');
}
require_once '../../controller/dbc.php';
$correo = $_SESSION['correo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../../assets/img/favicon.png">
	<title>El pais</title>
	<link href="../../assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../../assets/dashboard/css/sb-admin-2.css" rel="stylesheet">
	<link href="../../assets/css/cartas.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		<!-- Dashboard inicio -->
		<ul class="navbar-nav bg-gradient  sidebar sidebar-dark accordion text-white" id="accordionSidebar" style="background-color: #008EC9;">
			<a class="sidebar-brand d-flex align-items-center justify-content-center">
				<div >
					<img src="../../assets/img/favicon.png" style=" width: 20%; height: 20%; "><br>
					<div class="sidebar-brand-text mx-3">El país</div>
				</div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active">
				<a class="nav-link" href="#">
					<i class="fas fa-user-tie"></i>
					<span>Usuario</span>
				</a>
			</li>
			<hr class="sidebar-divider">
			<div class="sidebar-heading">To do</div>
			<!--Empresarios -->
		<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLista" aria-expanded="false" >
					<i class="fas fa-info-circle"></i>
					<span>Ver mis listas</span>
				</a>
			</li>		
			<hr class="sidebar-divider">
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul><!-- Fin dashboard -->

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- boton responsive -->
					<button id="sidebarToggleTop" class="btn btn-outline-warning d-md-none" onclick="cambiar()" style="color:#ff8039; width: 100%; border-color:#ff8039;">
						Menú: &nbsp<b id="contenedor">Ocultar</b>
					</button>
					<ul class="navbar-nav ml-auto">
						<div class="topbar-divider d-none d-sm-block"></div>
						<!--Perfil info -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucfirst($_SESSION['nombre']); ?></span>
								<img class="img-profile rounded-circle" src="../../assets/img/favicon.png"><!-- foto perfil -->
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Cerrar sesión
								</a>
							</div>
						</li>
					</ul>
				</nav>
				<!-- End of Topbar -->

				<div class="container">
					<div id="accordion">
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								Bienvenido <br> 
								Seleccione una de las opciones para continuar.
							</div>
						</div>
						<div id="collapseLista" class="collapse " aria-labelledby="heading" data-parent="#accordion">
							<div class="card-body">
								<?php include 'listas.php' ?>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- final del contenido-->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>© Jeferson</span> <!-- Jefersson Andrés De moya Montoya-->
					</div>
				</div>
			</footer><!-- End of Footer -->
		</div><!--fin Content Wrapper -->
	</div><!-- fin Page Wrapper -->

	<!-- Scroll top-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Señor/a <?php echo ucfirst($_SESSION['nombre']); ?></h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">¿Deseas cerrar sesión?</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
					<a class="btn btn-primary" href="../../controller/cerrarSesion.php" >Cerrar sesión</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="../../assets/dashboard/vendor/jquery/jquery.min.js"></script>
	<script src="../../assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="../../assets/dashboard/js/sb-admin-2.min.js"></script>
</body>
<script type="text/javascript">
	console.log(<?php echo $_SESSION['id']; ?>)
	function cambiar(){
		let contenedor=document.getElementById("contenedor");
		let boton=document.getElementsByTagName("button");
		if (boton[0].innerText=='Ver 2'){
			contenedor.innerText='Ocultar';
			boton[0].innerText='Ver 1'
		} else {
			contenedor.innerText='Mostrar';
			boton[0].innerText='Ver 2'    
		}
	}
</script>
</html>