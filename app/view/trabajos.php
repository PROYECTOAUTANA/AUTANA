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
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Gestion de  Trabajos</h1>
                        <hr>
                    </div>
                    <div class="col-md-12 contenido_4">
                       <div class="col-sm-12 btn-group btn-group-justified" >
                          <div class="btn-group">
                            <a href="#nuevo_trabajo" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i>  Nuevo Trabajo</a>
                          </div>
                          <div class="btn-group">
                            <a href="#consultar_trabajo" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-upload"></i>  Consultar Trabajo</a>
                          </div>
                          <div class="btn-group">
                            <a href="#eliminar_trabajo" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-trash"></i>  Eliminar Trabajo</a>
                          </div>
                        </div> <br><br><br> 
                    </div>
                     <div class="contenido_5 col-sm-12">
                      <div class="tabla col-sm-12">
                      <form class="form-group" action="buscar" method="post">
                              <div class="input-group">
                                    <input type="text" name="filtro" autofocus required placeholder="Escribe algo.." class="form-control">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" name="buscarTrabajo" type="submit"><i class="glyphicon glyphicon-search"></i>  Buscar</button>
                                    </span>
                                </div>
                    </form><br>
                    <?php 
                          if (!$db) {
                            if ($controller == "buscar") {
                                  echo "no se encontraron registros para: <strong>".$filtro."</strong>";
                              }else{
                                echo "no se encontraron registros.... :(";
                              }
                          }else{
                          ?>
                            <table border="0" class="table table-bordered table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th>Titulo</th>
                                      <th colspan="3">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($db as $dato):
                                  $id = $dato["id_trabajo"];
                                  $titulo = $dato["trabajo_titulo"]; 
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $titulo;?></td>
                                    <td align="center"><a class="btn btn-danger" href="eliminar-trabajo?=<?php echo $id; ?>"> Eliminar</a></td>
                                    <td align="center"><a class="btn btn-info" href="modificar-trabajo?=<?php echo $id; ?>"> Modificar</a></td>
                                    <td align="center"><a class="btn btn-default" href="ver-trabajo?id=<?php echo $id; ?>"> Ver</a></td>
                                  </tr>
                                <?php 
                                endforeach;
                              }
                                ?>
                                 </tbody>
                            </table>
                    </div> 
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