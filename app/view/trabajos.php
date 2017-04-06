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
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-12 fecha">
                          <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                      </div>
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Gestion de  Trabajos</h1>
                        <hr>
                    </div>
                    <div class="col-md-12 contenido_4">
                       <div class="col-sm-12 btn-group btn-group-justified" >
                          <div class="btn-group">
                            <a href="#nuevo_trabajo" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>  Nuevo Trabajo</a>
                          </div>
                          <div class="btn-group">
                            <a href="gestionar-trabajos" class="btn btn-info"><i class="glyphicon glyphicon-list"></i>  Todos los Trabajos</a>
                          </div>
                          <div class="btn-group">
                            <a href="#eliminar_trabajo" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-search"></i>  Consultas Filtradas</a>
                          </div>
                        </div> <br><br><br> 
                    </div>
                     <div class="contenido_5 col-sm-12">
                      <div class="tabla col-sm-12">
                       <form class="form-group">
                              <div class="input-group">
                                    <input type="text" name="filtro" id= "bus" autofocus onkeyup="buscar2();" autocomplete="off" required placeholder="Escribe algo.." class="form-control">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" onclick="buscar2();" name="buscarUsuario" type="button"><i class="glyphicon glyphicon-search"></i> </button>
                                    </span>
                                </div>
                    </form><br>
                      <div id="resultado"></div>
                        <div id="tabla">
                          <?php require_once "sections/tabla-trabajos.php"; ?>
                        </div>     
                    </div> 
                    </div>
                <?php include("sections/minimenu.php"); ?>
                </div>
            </div>
        <!-- /contenido -->
        </div>
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/modal.php"); 
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/ajax.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 