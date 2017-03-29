<?php 
session_start();
if(!$_SESSION){
    header("location: home");
}elseif($_SESSION['rol'] == 'admin'){ 
$barra = "barra_admin";
}elseif ($_SESSION['rol'] == 'supervisor') {
$barra = "barra_usuario";
}
?>
<!DOCTYPE html>
<html>
<head>

 <link rel="shortcut icon" type="image/x-icon" href="src/img/autana_ico.ico" />
  <meta charset="UTF-8">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">-->
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
</head>
<body >
<?php 
include("sections/cargando.php"); 
include("sections/navbar.php"); 
include("sections/$barra.php"); 
?>
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-12 fecha">
                          <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                      </div>
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Gestion de  Reportes</h1>
                        <hr>
                    </div>
                    <div class="col-md-12 contenido_4">
                        <a href="#" class="btn btn-default"> Correos</a>
                        <a href="#" class="btn btn-info"> Correos Automaticos</a>
                        <a href="#" class="btn btn-danger"> Estatus de un trabajo PDF</a>
                        <a href="#" class="btn btn-danger"> Constancias PDF</a>
                    </div>
                     <div class="contenido_5 col-sm-12">
                      
                    </div>
                <?php include("sections/minimenu.php"); ?>
                </div>
            </div>
        <!-- /contenido -->
        </div>
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/modal.salir.php"); 
include("sections/modal.datos.php");
include("sections/modal.nuevo.trabajo.php"); 
include("sections/modal.consultar.trabajo.php");
include("sections/modal.eliminar.trabajo.php"); 
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 