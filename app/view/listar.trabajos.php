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
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Trabajos de Ascenso</h1>
                        <hr>
                    </div>
                    <div class="tabla col-md-12">
                       <table border="0" class="table table-bordered table-hover" align="center">
                          <thead>
                              <tr>
                                  <th>Titulo</th>
                                  <th>Fecha</th>
                                  <th>Categoria</th>
                                  <th>Estado</th>
                                  <th colspan="2">Operaciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>trabajo de ascenso 1</td>
                                  <td>11/02/1990</td>
                                  <td>quimica</td>
                                  <td>aprobado</td>
                                  <td><a class="btn btn-default" href="#">Eliminar</a></td>
                                  <td><a class="btn btn-primary" href="#">Modificar</a></td>
                              </tr>
                              <tr>
                                  <td>trabajo de ascenso 1</td>
                                  <td>11/02/1990</td>
                                  <td>quimica</td>
                                  <td>aprobado</td>
                                  <td><a class="btn btn-default" href="#">Eliminar</a></td>
                                  <td><a class="btn btn-primary" href="#">Modificar</a></td>
                              </tr>
                              <tr>
                                  <td>trabajo de ascenso 1</td>
                                  <td>11/02/1990</td>
                                  <td>quimica</td>
                                  <td>aprobado</td>
                                  <td><a class="btn btn-default" href="#">Eliminar</a></td>
                                  <td><a class="btn btn-primary" href="#">Modificar</a></td>
                              </tr>
                              <tr>
                                  <td>trabajo de ascenso 1</td>
                                  <td>11/02/1990</td>
                                  <td>quimica</td>
                                  <td>aprobado</td>
                                  <td><a class="btn btn-default" href="#">Eliminar</a></td>
                                  <td><a class="btn btn-primary" href="#">Modificar</a></td>
                              </tr>
                          </tbody>
                      </table>
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