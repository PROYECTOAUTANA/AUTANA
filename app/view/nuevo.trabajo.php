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
                        <h3>Fase 1: Datos Personales</h3> 
                    </div>
                    <div class="formulario1 col-sm-12">
                      <form class="form-group">
                         <div class="form-group col-sm-1">
                          <label for="">Nacionalidad:</label>
                          <select class="form-control">
                            <option>V</option>
                            <option>E</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="">Cedula:</label>
                          <input  id="" class="form-control" type="text" name="" placeholder="Escriba..." autofocus>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="nombre">Nombre:</label>
                          <input  id="nombre" class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Apellido:</label>
                          <input  id="" class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                          <div class="form-group col-sm-1">
                          <label for="">Edad:</label>
                          <input  id="" class="form-control" type="number" name="" >
                        </div>
                         <div class="form-group col-sm-2">
                          <label for="">Sexo:</label>
                          <select class="form-control">
                            <option>FEMENINO</option>
                            <option>MASCULINO</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="">Telefono de Habitacion:</label>
                          <input  id=""  class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="">Celular:</label>
                          <input  id=""  class="form-control" type="text" name="" placeholder="Escriba...">
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="">Correo:</label>
                          <input  id=""  class="form-control" type="mail" name="" placeholder="Escriba...">
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="">Estado::</label>
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="">Municipio:</label>
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Parroquia:</label>
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="">Direccion:</label>
                          <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Departamento:</label>
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Categoria Actual:</label>
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="">Categoria de Ascenso:</label>
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="">Observacion:</label>
                          <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-3">
                          <button type="submit" class="btn btn-primary" name="">Enviar</button>
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