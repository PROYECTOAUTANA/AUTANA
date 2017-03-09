<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=index&action=Home");
}elseif($_SESSION['tipo'] == 1){ 
$barra = "barra_admin";
$titulo = "Administrador";
}elseif ($_SESSION['tipo'] == 2) {
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
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
</head>
<body >
<?php include("sections/navbar.php"); ?>
<?php include("sections/$barra.php"); ?>
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
                    <div class="noticias col-sm-8">
                        <p>Sin Noticias ni Publicaciones...</p>
                    </div>
                    <div class="notificaciones col-sm-4">
                      <p>Sin Notificaciones...</p>
                    </div>
                </div>
                <?php include("sections/minimenu.php"); ?>
              </div>
            </div>
        <!-- /contenido -->
    </div>
    <!-- /#principal -->
<!--*****************************************SOLO MODALS*********************************************************-->
<?php include("sections/cerrar.sesion.php"); ?>
<?php include("sections/misdatos.php"); ?>
<script src="src/js/jquery.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script>
    $("#boton").click(function(e) {
        e.preventDefault();
        $("#principal").toggleClass("cambiado");
    });
    </script>
</body>
</html> 