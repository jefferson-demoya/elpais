<?php
error_reporting(0);
session_start();
session_destroy();
// isset verifica si existe una variable
if(isset($_SESSION['id'])){
  header('location: controller/redirec.php');
}
$mensaje="";
$mensaje=$_REQUEST['mensaje'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>El país</title>
  <meta content="El pais" name="description">
  <meta content="El pais" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
         <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
         <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link  active" href="index.php">Index</a></li>
            <li><a class="nav-link" href="#">Otro link</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
      </div>
    </div>

  </div>
</header><!-- End Header -->
<div id="content-wrapper" >
  <div id="accordion"  data-aos="fade-up">

    <!----------------------- Login  panel----------------->
    <div id="collapselogin" class="collapse show" aria-labelledby="heading" data-parent="#accordion">
     <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="assets/img/login/login.jpg"  alt="Actualizar datos" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100% ;"/>
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
                    <form action="controller/verifica.php" method="post">
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <span class="h1 fw-bold mb-0">EL PAÍS</span>
                      </div>
                      <h3 class="fw-normal" style="letter-spacing: 1px;">Iniciar sesión</h3>
                      <h6 class="fw-normal pb-3" style="letter-spacing: 1px;">Estabamos esperando <b>por ti :)</b></h6>
                      <div class="form-outline mb-4">
                        <input type="email" name="correo" class="form-control form-control-lg input-editado"  placeholder=" Correo eletrócnico"/>
                      </div>
                      <div class="form-outline mb-4">
                        <input type="password"  name="password" class="form-control form-control-lg input-editado" placeholder=" Contraseña"/>
                      </div>
                      <h5 style="color:red;"><?php echo $mensaje; ?></h5>
                      <div class="pt-1 mb-4">
                        <button class="btn btn-outline-danger btn-lg btn-block" id="login">Entrar</button>
                      </div>
                      <a class="small color-text-link" data-toggle="collapse" data-target="#collapsepassword" href="#">¡He olvidado mi contraseña</a>
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tienes una cuenta? <a data-toggle="collapse" data-target="#collapseregister" href="#" class="color-text-link">¡Registrate!</a></p>
                      <a href="#!" class="small text-muted">Recuerda siempre usar el botón <b>"Cerrar sesión"</b> cuando salgas de la app.</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  
  </div>

  <!----------------------- register  panel----------------->
  <div id="collapseregister" class="collapse" aria-labelledby="heading" data-parent="#accordion">
   <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="assets/img/login/create.jpg"  alt="Actualizar datos" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100% ;"/>
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <!-- Registro -->
                  <form action="controller/guarda_registro.php" method="post">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">EL PAÍS</span>
                    </div>
                    <h3 class="fw-normal" style="letter-spacing: 1px;">Crear una cuenta</h3>
                    <h6 class="fw-normal pb-3" style="letter-spacing: 1px;">A sólo <b>un paso:)</b></h6>
                    <div class="form-outline mb-4">
                      <input type="text" name="nombre" class="form-control form-control-lg input-editado"  placeholder=" Nombre" required />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" name="apellidos" class="form-control form-control-lg input-editado"  placeholder=" Apellido" required />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="email" name="correo" class="form-control form-control-lg input-editado"  placeholder=" Correo electrónico" required />
                    </div>
                    <div class="form-outline mb-4">
                      <input type="password" name="password" class="form-control form-control-lg input-editado" placeholder=" Contraseña" required />
                    </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-outline-danger btn-lg btn-block" id="login">Crear mi cuenta</button>
                    </div>
                    <a data-toggle="collapse" data-target="#collapselogin" href="#" class="color-text-link">¡Ya tengo una cuenta!</a><br>
                    <a href="#!" class="small text-muted">Recuerda siempre usar el botón <b>"Cerrar sesión"</b> cuando salgas de la app.</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
</div>


<!----------------------- password change  panel----------------->
<div id="collapsepassword" class="collapse" aria-labelledby="heading" data-parent="#accordion">
 <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/img/login/password.jpg"  alt="Actualizar datos" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100% ;"/>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0">EL PAÍS</span>
                  </div>
                  <h3 class="fw-normal" style="letter-spacing: 1px;">He olvidado mi contraseña</h3>
                  <h6 class="fw-normal pb-3" style="letter-spacing: 1px;">Estamops aquí para <b>ayudarte :)</b></h6>
                  <div class="form-outline mb-4">
                    <input type="email" class="form-control form-control-lg input-editado"  placeholder=" Correo eletrónico"/>
                  </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-outline-danger btn-lg btn-block" type="button">Enviar un correo de recuperación</button>
                  </div>
                  <a class="color-text-link" data-toggle="collapse" data-target="#collapselogin" href="#">Volver para inicicar sesión</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tienes una cuenta? <a data-toggle="collapse" data-target="#collapseregister" href="#" class="color-text-link">¡Crea una!</a></p>
                  <a href="#!" class="small text-muted">Recuerda siempre usar el botón <b>"Cerrar sesión"</b> cuando salgas de la app.</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  
</div>
</div>
</div>


</main>
<footer id="footer">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>Jefferson DM</strong>
    </div>
  </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
</body>
</html>