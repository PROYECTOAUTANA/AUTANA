<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=index&action=Home");
}elseif($_SESSION['tipo'] == 1){ 
$barra = "barra_admin";
}elseif ($_SESSION['tipo'] == 2) {
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
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
</head>
<body >
<?php include("sections/navbar.php"); ?>
<?php include("sections/$barra.php"); ?>
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-12 fecha">
                          <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                      </div>
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Nuevo Trabajo</h1>
                        <hr>
                        <h3>Fase 1: Datos del Trabajo</h3> 
                    </div>
                    <div class="formulario1 col-sm-12">
                      <form class="form-group">
                        <div class="form-group col-sm-4">
                          <label for="nombre">Titulo:</label>
                          <input  id="nombre" class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Linea de Investigacion:</label>
                          <input  id="" class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                          <div class="form-group col-sm-4">
                          <label for="">Numero de Consejo:</label>
                          <input  id="" class="form-control" type="number" name="" >
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="">Proceso:</label>
                          <select class="form-control">
                            <option>Regular</option>
                            <option>Extraordinario</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="">Fecha de Presentacion Publica:</label>
                          <input  id=""  class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="">Categoria de Ascenso:</label>
                          <input  id=""  class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="">Fase:</label>
                          <select class="form-control">
                            <option>Recepcion</option>
                            <option>Seguimiento</option>
                            <option>Aprobacion</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-12">
                          <a href="#ventana4" data-toggle="modal" class="btn btn-primary btn-block" name=""><span class="glyphicon glyphicon-plus"></span> Agregar Autor</a>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="">Observacion:</label>
                          <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                          <button type="submit" class="btn btn-primary btn-block" name="">Registrar Trabajo</button>
                        </div>
                      </form>
                    </div>
                <?php include("sections/minimenu.php"); ?>
                </div>
            </div>
        <!-- /contenido -->
        </div>
<!--*****************************************SOLO MODALS*********************************************************-->
<?php include("sections/cerrar.sesion.php"); ?>
<?php include("sections/misdatos.php"); ?>
<?php include("sections/docentes.php"); ?>
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