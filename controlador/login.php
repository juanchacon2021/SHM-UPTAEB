<?php
  require 'includes/conexion.php';

  if(is_file("vista/".$pagina.".php")){

	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }

  if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) and empty($_POST["clave"])) {
      echo '<div class="alert alert-danger" style="font-weight: 700;">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
      $usuario=$_POST['usuario'];
      $clave=$_POST['clave'];
      $consulta=$conexion->query("SELECT * FROM login WHERE usuario = '$usuario' and clave = '$clave'");
      if ($resultado=$consulta->fetch_object()) {
        header('Location: ?pagina=inicio');
      } else {
        echo '<div class="alert alert-danger" style="font-weight: 700;">ACCESO DENEGADO</div>';
      }
    }
  }