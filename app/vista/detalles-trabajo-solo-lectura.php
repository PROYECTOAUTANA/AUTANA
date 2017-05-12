<?php session_start(); ?>
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
        <!-- /#sidebar-wrapper -->
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-9 trabajos">
                          <h3><span class="glyphicon glyphicon-th-large"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                        </div>
                        <div class="col-sm-3 grupobotones">
                        </div>
                    </div>
                     <div class="col-sm-12">
                            <form class="form-group" action="?controller=trabajo&action=editar_trabajo" method="post" data-toggle="validator">

                              <div class="form-group col-sm-4">
                                <label>Titulo</label>
                                <input type="text" readonly="readonly" name="titulo" class="form-control" data-error="Por favor introduzca un título."   value="<?php echo $datos_trabajo->trabajo_titulo; ?>" required>   
                                  <div class="help-block with-errors"></div>
                            </div>
                              <div class="form-group col-sm-4">
                                <label>Fecha de presentacion Publica</label>
                                <input type="text" readonly="readonly" readonly="readonly" name="fecha_pp" class="form-control" value="<?php echo $datos_trabajo->trabajo_fecha_presentacion; ?>">
                              </div>
                              <div class="form-group col-sm-4">
                                <label>Mension</label>
                                <input type="text" readonly="readonly" name="mension" class="form-control" value="<?php echo $datos_trabajo->trabajo_mension; ?>" data-error="Por favor introduzca un título." required >   
                                  <div class="help-block with-errors"></div>
                            </div>
                              <div class="form-group col-sm-4">
                                <label>Proceso</label>
                                <input type="text" readonly="readonly" name="proceso" data-error="Por favor introduzca un valor." class="form-control" required value="<?php echo $datos_trabajo->trabajo_proceso; ?>">   
                                  <div class="help-block with-errors"></div>
                            </div>

                              <div class="form-group col-sm-4">
                                <label>Categoria de Ascenso</label>
                                <input type="text" readonly="readonly" name="categoria_ascenso" data-error="Por favor introduzca un título." class="form-control" required  value="<?php echo $datos_trabajo->trabajo_categoria_de_ascenso; ?>">   
                                  <div class="help-block with-errors"></div>
                            </div>

                              <div class="form-group col-sm-4">
                                <label>Fecha de registro</label>
                                <input type="text" readonly="readonly" readonly="readonly" name="fecha_registro" required class="form-control" value="<?php echo $datos_trabajo->trabajo_fecha_registro; ?>">
                              </div>

                              <div class="form-group col-sm-12">
                                <label>Resumen</label>
                                <textarea readonly="readonly" name="resumen" data-error="Por favor introduzca un título." required class="form-control" rows="4">
                                  <?php echo $datos_trabajo->trabajo_resumen; ?>
                                </textarea>   
                                  <div class="help-block with-errors"></div>
                            </div>

                        </form>  
                      </div>


                    <div class="col-sm-6">
                          <h3><span class="glyphicon glyphicon-th-large"></span>  Fase</h3>
                        <hr>

                        <?php if (!$fase_del_trabajo): ?>
                          <p>actualmente no hay una fase asignada para este trabajo de ascenso </p>
                        <?php endif ?>
                        <?php if ($fase_del_trabajo): ?>
                          <table>
                            <tr>
                              <td>
                                <?php echo $fase_del_trabajo->fase_nombre; ?>
                              </td>
                            </tr>
                          </table>
                        <?php endif ?>
                    </div>

                    <div class="col-sm-6">
                          <h3><span class="glyphicon glyphicon-th-large"></span>  Linea de Investigacion</h3>
                        <hr>

                        <?php if (!$linea_del_trabajo): ?>
                          <p>actualmente no hay una linea asignada para este trabajo de ascenso  </p>
                        <?php endif ?>
                        <?php if ($linea_del_trabajo): ?>
                          <table>
                            <tr>
                              <td>
                                <?php echo $linea_del_trabajo->linea_nombre; ?>
                              </td>
                            </tr>
                          </table>
                        <?php endif ?>
                    </div>


                    <div class="col-sm-12">
                          <h3><span class="glyphicon glyphicon-th-large"></span>  Docentes del Trabajo</h3>
                    </div>
                    <div class="col-sm-12">
                      <?php if (!$usuario_trabajo): ?>
                            <?php echo "No se encontraron registros..."; ?>
                          <?php endif ?>
                          <?php if ($usuario_trabajo): ?>
                          <br><br>
                          <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Docentes vinculados al trabajo de ascenso</div>

                            <!-- Table -->
                            <div class="table-responsive">
                              <table border="0" class="table table-hover" align="center" >
                                     <thead>
                                    <tr style="text-align:center;">
                                        <th >usuario</th>
                                        <th >vinculo</th>
                                        <th >fecha de asignacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  foreach ($usuario_trabajo as $usuario):
                                  $id_usuario = $usuario->id_usuario;
                                  $nombre = $usuario->usuario_nombre;
                                  $vinculo = $usuario->vinculo;
                                  $fecha_de_asignacion = $usuario->usuario_trabajo_fecha_registro;
                                ?>
                                  <tr>
                                    <td ><a href="#"><?php echo $nombre;?></a></td>
                                    <td><?php echo $vinculo;?></td>
                                    <td ><?php echo $fecha_de_asignacion;?></td>
                                  </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>                  
                          <?php endif ?>
                    </div>
              </div>
            </div>
        <!-- /contenido -->
    <!-- /#principal -->
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