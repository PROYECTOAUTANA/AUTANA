<?php if (!$_SESSION) header("location: ?controller=front&action=home");?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>:::  <?php echo $titulo_de_la_vista; ?> :::</title>
 <!-- ******  ARCHIVO DONDE ESTAN TODOS LOS LLAMADOS A JAVASCRIPT Y CSS -->
<?php require_once "secciones/scripts.php"; ?>
<!--***********************************************************************-->
</head>
<body>
<?php 
include("secciones/navbar.php"); 
include("secciones/menu.php"); 
?>
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-9 trabajos">
                        <h3><span class="glyphicon glyphicon-th-large"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                      </div>
                       <div class="col-sm-3" style="margin-top:20px;">
                          <a class="btn btn-danger" href="?controller=reporte&action=trabajos_del_docente&id_usuario=<?php echo $SESSION['id']; ?>"> <i class="glyphicon glyphicon-save"></i> Estatus general </a>
                      </div>
                    </div>
                      <div class="col-sm-12 tablas">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Trabajos </div>
                            <!-- Table -->
                            <?php if (!$trabajos_usuario): ?>
                              <p>No hay trabajos en los que participes aun...</p>
                            <?php endif ?>
                            <?php if ($trabajos_usuario): ?>
                              <div class="table-responsive">
                              <table class="table table-hover">
                                      <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Vinculo</th>
                                        <th>Titulo</th>
                                        <th>Fecha de presentacion</th>
                                        <th>Resumen</th>
                                        <th colspan="3">Operaciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $contador=1;
                                    foreach ($trabajos_usuario as $trabajo):
                                          
                                          $id_trabajo = $trabajo->id_trabajo;
                                    ?>
                                    <tr>
                                      <td><?php echo $contador;?></td>
                                      <td><?php echo $trabajo->vinculo;?></td>
                                      <td><?php echo $trabajo->trabajo_titulo;?></td>
                                      <td><?php echo $trabajo->trabajo_fecha_presentacion;?></td>
                                      <td><?php echo $trabajo->trabajo_resumen;?></td>
                                      <td>
                                        <a class="btn btn-default" href="?controller=reporte&action=ver_estatus_trabajo&id_trabajo=<?php echo $trabajo->id_trabajo; ?>" target="_blank"> <i class="glyphicon glyphicon-stats"></i>  Estatus
                                        </a>
                                      </td>
                                      <td>
                                          <a class="btn btn-danger" href="?controller=reporte&action=constancia_pdf&id_trabajo=<?php echo $trabajo->id_trabajo; ?>"> <i class="glyphicon glyphicon-save"></i> Constancia 
                                          </a>
                                      </td>
                                    </tr>
                                    <?php 
                                    $contador++;
                                    endforeach;?>
                                  </tbody>
                                </table>
                              </div>
                            <?php endif ?>
                            </div>   
                      </div> 
                    </div>
                </div>
            </div>
        <!-- /contenido -->
<div class="contenido_2">
    <ul id="minimenu">
      <li>
        <a href="#boton" class="ocultar" id="boton"><span class="glyphicon glyphicon-chevron-left"></span></a>
      </li>
    </ul> 
</div>
<script src="src/js/boton.js"></script>
</body>
</html>




<!--********************* VENTANAS MODALES ...  ******************-->






<!--******************************************************************-->