<?php

  // se elimina la sesion si esta abierta para cerrarla
session_start();
session_destroy();

header('location: ../index.php');

?>
