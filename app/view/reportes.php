<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}

if($_SESSION['rol'] == 'administrador'){ 
    $barra = "barra_admin";
    $titulo = "Administrador";
}elseif ($_SESSION['rol'] == 'supervisor') {
    $barra = "barra_usuario";
    $titulo = "Supervisor";
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
            <div class="container-fluid" >
                    <div class="contenido_1 col-sm-12" >
                      <div class="col-sm-12 fecha">
                          <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                      </div>
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Gestion de  Reportes</h1>
                        <hr>
                    </div>
                    <div class="col-sm-12 contenido_4" >
                      <div class="btn-group col-sm-4">
                        <a href="#" class="btn btn-info btn-block"><i class=" glyphicon glyphicon-download"></i> Descargar Listado PDF</a>
                      </div>
                       <div class="btn-group col-sm-4">
                        <a href="#" class="btn btn-info btn-block"><i class="glyphicon glyphicon-send"></i> Enviar Listado por Correo</a>
                      </div>
                       <div class="btn-group col-sm-4">
                        <a href="#" class="btn btn-info btn-block"><i class="glyphicon glyphicon-tasks"></i> Constancias</a>
                      </div>
                    </div> 
                <?php include("sections/minimenu.php"); ?>
            </div>
        <!-- /contenido -->
        </div>
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/modal.php"); 
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 