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
                        <a href="#" class="btn btn-info btn-block"><i class=" glyphicon glyphicon-print"></i> Reportes Trabajos</a>
                      </div>
                       <div class="btn-group col-sm-4">
                        <a href="#" class="btn btn-info btn-block"><i class="glyphicon glyphicon-print"></i> Reportes Usuarios </a>
                      </div>
                       <div class="btn-group col-sm-4">
                        <a href="#" class="btn btn-info btn-block"><i class="glyphicon glyphicon-tasks"></i> Constancias</a>
                      </div>
                    </div> 
                    <div class="col-sm-12"><br><br>
                        <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading">Totalizacion y Estadisticas</div>

                          <!-- Table -->
                            <table class="table table-hover" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th>Item</th>
                                      <th>Cantidad</th>
                                      <th>Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>Trabajos</td>
                                    <td>34</td>
                                    <td><a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-print"></i> Imprimir Reporte</a></td>
                                  </tr>
                                 </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        <!-- /contenido -->
        </div>
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