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
}elseif ($_SESSION['rol'] == 'docente') {
    $barra = "barra_docente";
    $titulo = $_SESSION['usuario_nombre'];
}else{

    header("location: ?controller=front&action=home");
}

?>
<!DOCTYPE html>
<html>
<head>
 <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">-->
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
  <script src="src/js/fecha_y_hora.js"></script>
</head>
<body onload="javascript:hora()">
<?php 
include("sections/cargando.php");
include("sections/navbar.php"); 
include("sections/$barra.php"); 
?>
        <!-- /#sidebar-wrapper -->
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="noticias col-sm-12">
                        <div class="col-sm-12 fecha">
                            <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                        </div>
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Bienvenido <?php echo $titulo; ?></h1>
                        <hr>
                      </div>
                    <div class="col-sm-12">
                        <?php include("sections/carrusell.php"); ?>
                    </div>
                    <div class="col-sm-12">
                         <h1><span class="glyphicon glyphicon-th-large"></span>  Noticias (0)</h1>
                        <hr>
                        <div class="panel panel-default">
                          <div class="panel-heading">Ultimas Noticias (0)</div>
                          <div class="panel-body">
                            <form class="form-group">
                                <div class="form-group col-sm-12">
                                    <textarea name="noticia" id="noticia" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group-btn col-sm-12">
                                    <button class="btn btn-info" onclick="noticia();" name="enviarnoticia" type="button"><i class="glyphicon glyphicon-picture"></i> Agregar Imagen </button>
                                    <button class="btn btn-default" onclick="noticia();" name="enviarnoticia" type="button"><i class="glyphicon glyphicon-share-alt"></i> Publicar </button>

                                </div>
                            </form><br>
                          </div>
                         </div>
                    </div>
                </div>
              </div>
            </div>
        <!-- /contenido -->
    <!-- /#principal -->
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/minimenu.php");
include("sections/modal.php"); 
include("sections/footer2.php");
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 