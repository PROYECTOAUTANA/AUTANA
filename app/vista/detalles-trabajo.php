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

                              <input type="hidden" name="id_trabajo" value="<?php echo $datos_trabajo->id_trabajo; ?>">

                              <div class="form-group col-sm-4">
                                <label>Titulo</label>
                                <input type="text" name="titulo" class="form-control" data-error="Por favor introduzca un título."   value="<?php echo $datos_trabajo->trabajo_titulo; ?>" required>   
                                  <div class="help-block with-errors"></div>
                            </div>
                              <div class="form-group col-sm-4">
                                <label>Fecha de presentacion Publica</label>
                                <input type="text" readonly="readonly" name="fecha_pp" class="form-control" value="<?php echo $datos_trabajo->trabajo_fecha_presentacion; ?>">
                              </div>
                              <div class="form-group col-sm-4">
                                <label>Mension</label>
                                <input type="text" name="mension" class="form-control" value="<?php echo $datos_trabajo->trabajo_mension; ?>" data-error="Por favor introduzca un título." required >   
                                  <div class="help-block with-errors"></div>
                            </div>
                              <div class="form-group col-sm-4">
                                <label>Proceso</label>
                                <input type="text" name="proceso" data-error="Por favor introduzca un valor." class="form-control" required value="<?php echo $datos_trabajo->trabajo_proceso; ?>">   
                                  <div class="help-block with-errors"></div>
                            </div>

                              <div class="form-group col-sm-4">
                                <label>Categoria de Ascenso</label>
                                <input type="text" name="categoria_ascenso" data-error="Por favor introduzca un título." class="form-control" required  value="<?php echo $datos_trabajo->trabajo_categoria_de_ascenso; ?>">   
                                  <div class="help-block with-errors"></div>
                            </div>

                              <div class="form-group col-sm-4">
                                <label>Fecha de registro</label>
                                <input type="text" readonly="readonly" name="fecha_registro" required class="form-control" value="<?php echo $datos_trabajo->trabajo_fecha_registro; ?>">
                              </div>

                              <div class="form-group col-sm-12">
                                <label>Resumen</label>
                                <textarea name="resumen" data-error="Por favor introduzca un título." required class="form-control" rows="4">
                                  <?php echo $datos_trabajo->trabajo_resumen; ?>
                                </textarea>   
                                  <div class="help-block with-errors"></div>
                            </div>

                              <div class="form-group col-sm-12">
                                <input type="submit" name="editar" class="btn btn-default col-sm-3" value="Actualizar datos">
                                <a href="?controller=front&action=detalles_trabajo&id_trabajo=<?php echo $datos_trabajo->id_trabajo; ?>" class="btn btn-info col-sm-3" > Deshacer</a>
                              </div>

                        </form>  
                      </div>


                    <div class="col-sm-6">
                          <h3><span class="glyphicon glyphicon-th-large"></span>  Fase</h3>
                        <hr>

                        <?php if (!$fase_del_trabajo): ?>
                          <p>actualmente no hay una fase asignada para este trabajo de ascenso  <a href="#asignar_fase" data-toggle="modal">Asignar</a></p>
                        <?php endif ?>
                        <?php if ($fase_del_trabajo): ?>
                          <table>
                            <tr>
                              <td>
                                <?php echo $fase_del_trabajo->fase_nombre; ?>
                              </td>
                              <td>
                                <a href="#cambiar_fase" data-toggle="modal" class="btn btn-success">  Cambiar fase</a>
                              </td>
                            </tr>
                          </table>
                        <?php endif ?>
                    </div>

                    <div class="col-sm-6">
                          <h3><span class="glyphicon glyphicon-th-large"></span>  Linea de Investigacion</h3>
                        <hr>

                        <?php if (!$linea_del_trabajo): ?>
                          <p>actualmente no hay una linea asignada para este trabajo de ascenso  <a href="#asignar_linea" data-toggle="modal">Asignar</a></p>
                        <?php endif ?>
                        <?php if ($linea_del_trabajo): ?>
                          <table>
                            <tr>
                              <td>
                                <?php echo $linea_del_trabajo->linea_nombre; ?>
                              </td>
                              <td>
                                <a href="#cambiar_linea" data-toggle="modal" class="btn btn-success">  Cambiar linea</a>
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
                                    <td ><a href="?controller=front&action=detalles_usuario&id_usuario=<?php echo $id_usuario; ?>"><?php echo $nombre;?></a></td>
                                    <td><?php echo $vinculo;?></td>
                                    <td ><?php echo $fecha_de_asignacion;?></td>
                                    <td><a href="?controller=trabajo&action=quitar_docente&id_usuario=<?php echo $id_usuario; ?>&vinculo=<?php echo $vinculo; ?>&id_trabajo=<?php echo $id_trabajo; ?>" class="btn btn-danger">  Quitar docente</a></td>
                                  </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                          </div>                  
                          <?php endif ?>
                    </div>
                    <div class="col-sm-12">
                      <a href="#asignar_usuario" data-toggle="modal" class="btn btn-info btn-block">  Asignar Usuario al Trabajo</a>
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

<!--********************* modal Cambiar de fase ******************-->


                   <div class="modal fade" id="cambiar_fase">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Cambio de Fase</h4>
                          <form class="form-group" action="?controller=trabajo&action=cambio_de_fase" method="post">
                          <input type="hidden" name="id_trabajo" value="<?php echo $datos_trabajo->id_trabajo; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="fase">
                                <option>seleccione una fase</option>
                                <?php foreach ($fases as $fase): ?>
                                  <option value="<?php echo $fase->id_fase; ?>"><?php echo $fase->fase_nombre; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" name="">
                            </div>
                          </form>
                        </div>


                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->



<!--********************* modal Cambiar linea ******************-->


                   <div class="modal fade" id="cambiar_linea">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Cambio de linea de investigacion</h4>
                          <form class="form-group" action="?controller=trabajo&action=cambio_de_linea" method="post">
                          <input type="hidden" name="id_trabajo" value="<?php echo $datos_trabajo->id_trabajo; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="linea">
                                <option>seleccione una linea</option>
                                <?php foreach ($lineas as $linea): ?>
                                  <option value="<?php echo $linea->id_linea; ?>"><?php echo $linea->linea_nombre; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" name="">
                            </div>
                          </form>
                        </div>


                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->


<!--********************* modal ASIGNAR FASE ******************-->


                   <div class="modal fade" id="asignar_fase">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Asignacion de fases</h4>
                          <form class="form-group" action="?controller=trabajo&action=asignar_fase" method="post">
                            <input type="hidden" name="id_trabajo" value="<?php echo $datos_trabajo->id_trabajo; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="fase">
                                <option>seleccione una fase</option>
                                <?php foreach ($fases as $fase): ?>
                                  <option value="<?php echo $fase->id_fase; ?>"><?php echo $fase->fase_nombre; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" name="">
                            </div>
                          </form>
                        </div>


                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->


<!--********************* modal ASIGNAR LINEA DE INVESTIGACION ******************-->


                   <div class="modal fade" id="asignar_linea">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Asignacion de lineas de investigacion</h4>
                          <form class="form-group" action="?controller=trabajo&action=asignar_linea" method="post">
                            <input type="hidden" name="id_trabajo" value="<?php echo $datos_trabajo->id_trabajo; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="linea">
                                <option>seleccione una linea</option>
                                <?php foreach ($lineas as $linea): ?>
                                  <option value="<?php echo $linea->id_linea; ?>"><?php echo $linea->linea_nombre; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" name="">
                            </div>
                          </form>
                        </div>


                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->




<!--********************* modal ASIGNAR USUARIO ******************-->


                   <div class="modal fade" id="asignar_usuario">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Asignacion de usuarios</h4><hr>
                          <form class="form-group" action="?controller=trabajo&action=asignar_usuario" method="post">
                            <input type="hidden" name="id_trabajo" value="<?php echo $datos_trabajo->id_trabajo; ?>">
                            <div class="col-sm-12 form-group">
                              <label>SELECCIONE UN USUARIO</label>
                              <select class="form-control" name="usuario">
                                <option>seleccione un usuario</option>
                                <?php foreach ($usuarios as $usuario): ?>
                                  <option value="<?php echo $usuario->id_usuario; ?>"><?php echo $usuario->usuario_nombre; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>

                            <div class="col-sm-12 form-group">
                              <label>SELECCIONE UN VINCULO</label>
                              <select class="form-control" name="vinculo">
                                <option>seleccione un vinculo</option>
                               
                                  <option value="autor">autor</option>
                                  <option value="tutor">tutor</option>
                                  <option value="jurado">jurado</option>
                              </select>
                            </div>
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" name="">
                            </div>
                          </form>
                        </div>


                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->



<!--******************************************************************-->