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
                        <div class="col-sm-6 trabajos">
                          <h3><i class="fa fa-user-circle" aria-hidden="true"></i>  <?php echo $titulo_de_la_vista; ?></h3>
                        </div>
                        <div class="col-sm-6 grupobotones"></div>
                    </div>
                    <div class="col-sm-12">
                            <form class="form-group" action="?controller=usuario&action=editar_usuario" method="post" data-toggle="validator">

                                <input type="hidden" name="id_usuario" value="<?php echo $datos_usuario->id_usuario; ?>">
                              <div class="form-group col-sm-4">
                                <label>Cédula</label>
                                <input type="text" readonly="readonly" name="cedula" class="form-control" value="<?php echo $datos_usuario->usuario_cedula; ?>">
                              </div>
                              <div class="form-group col-sm-4">
                                <label>Nombre</label>
                                <input type="text" name="nombre" data-error="Introduzca un nombre." class="form-control" value="<?php echo $datos_usuario->usuario_nombre; ?>" onkeypress="return controltext(event)" required >
                                  <div class="help-block with-errors"></div>
                            </div>
                              <div class="form-group col-sm-4">
                                <label>Apellido</label>
                                <input type="text" name="apellido" class="form-control" value="<?php echo $datos_usuario->usuario_apellido; ?>" onkeypress="return controltext(event)" required >    
                                  <div class="help-block with-errors"></div>
                                  </div>
                              <div class="form-group col-sm-4">
                                <label>sexo</label><br>
                                  <?php if ($datos_usuario->usuario_sexo == 1): ?>
                                    Femenino
                                    <input type="radio" name="sexo" value="1" checked>
                                    Masculino
                                    <input type="radio" name="sexo" value="2" >
                                  <?php endif ?>

                                  <?php if ($datos_usuario->usuario_sexo == 2): ?>
                                    Femenino
                                    <input type="radio" name="sexo" value="1" >
                                    Masculino
                                    <input type="radio" name="sexo" value="2" checked>
                                  <?php endif ?>
                              </div>
                              <div class="form-group col-sm-4">
                                <label>Teléfono</label>
                                <input type="tel" name="telefono" class="form-control" value="<?php echo $datos_usuario->usuario_telefono; ?>" onkeypress="return controltag(event)" required >    
                                  <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group col-sm-4">
                                <label>Correo</label>
                                <input type="email" name="correo" class="form-control" value="<?php echo $datos_usuario->usuario_correo; ?>" >
                    <div class="help-block with-errors"></div>
                        </div>
                              <div class="form-group col-sm-4">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="<?php echo $datos_usuario->usuario_direccion; ?>" required >    
                                  <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group col-sm-4">
                              <label>Departamento Actual</label>
                                  <input readonly="readonly" class="form-control" type="text" value="<?php echo $usuario_departamento->departamento_nombre;?>">
                              </div>
                              <div class="form-group col-sm-4">
                              <label>Rol Actual</label>
                                  <input  readonly="readonly" class="form-control " type="text" value="<?php echo $usuario_rol->rol_nombre;?>">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Fecha de registro</label>
                                <input type="text" readonly="readonly" name="fecha_registro" class="form-control" value="<?php echo $datos_usuario->usuario_fecha_registro; ?>">
                              </div>
                              <div class="form-group col-sm-12">
                              <label>Estado Actual</label>
                                    <?php if ($datos_usuario->usuario_estado == 0) {
                                      $estado = "BLOQUEADO";
                                    }elseif ($datos_usuario->usuario_estado == 1) {
                                      $estado = "DESBLOQUEADO";
                                      }?>
                                    <input  readonly="readonly" class="form-control " type="text" value="<?php echo $estado;?>">
                              </div>


                              <div class="col-sm-12 form-group">
                                    <input type="submit"  name="editar" class="btn btn-info btn-block" value="Actualizar datos">
                              </div>
                          </form>
                                  <div class="col-sm-4 form-group">
                                    <a class="btn btn-default btn-block" href="#cambiar_departamento" data-toggle="modal">  Cambiar departamento</a>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <a class="btn btn-default btn-block" href="#cambiar_rol" data-toggle="modal">  Cambiar rol de usuario</a>
                                </div>

                                <div class="col-sm-4 form-group">
                                  <?php if ($datos_usuario->usuario_estado == 1): ?>
                                      <a class="btn btn-danger btn-block" href="?controller=usuario
                                      &action=cambiar_estado&id_usuario=<?=$datos_usuario->id_usuario ?>"><i class="fa fa-lock"></i> bloquear</a>
                                    <?php endif ?>
                                    <?php if ($datos_usuario->usuario_estado == 0): ?>
                                      <a class="btn btn-success btn-block" href="?controller=usuario&action=cambiar_estado&id_usuario=<?=$datos_usuario->id_usuario ?>"><i class="fa fa-unlock"></i> desbloquear</a>
                                    <?php endif ?>
                                </div>
                        </form>  
                          </div>
                       
                    <div class="col-sm-6">
                      <div class="col-sm-12">
                          <h3><i class="fa fa-id-card-o" aria-hidden="true"></i>  Categoria Actual</h3>
                        </div>
                     <div class="col-sm-12">
                        
                          <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Categoria actual</div>

                            <!-- Table -->
                            <div class="table-responsive">
                              <table border="0" class="table table-hover" align="center" >
                                <thead>
                                    <tr style="text-align:center;">
                                        <th  >nombre</th>
                                        <th  >fecha del ascenso</th>
                                        <th >Tiempo transcurrido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td ><a href="?controller=front&action=detalles_categoria&id_categoria=<?php echo $datos_usuario->id_categoria; ?>"><?php echo $datos_usuario->categoria_nombre;?></a></td>
                                    <td ><?php echo $datos_usuario->fecha_asignacion_de_categoria;?></td>
                                        <?php
                                        $hoy = date('Y-m-d');
                                        $datetime1 = date_create($datos_usuario->fecha_asignacion_de_categoria);
                                        $datetime2 = date_create($hoy);
                                        $intervalo = date_diff($datetime1, $datetime2);
                                        $tiempo_transcurrido = $intervalo->format('%a día(s)');
                                        ?>
                                    <td><?php echo $tiempo_transcurrido; ?></td>
                                  </tr>
                                </tbody>
                                </table>
                            </div>
                          </div>  
                          <div class="form-group">
                            <a class="btn btn-success btn-block" href="#cambiar_categoria" data-toggle="modal"> Ascender</a>
                          </div>        
                    </div> 
                    </div>

                    <div class="col-sm-6">
                      <div class="col-sm-12">
                          <h3><i class="fa fa-id-card-o" aria-hidden="true"></i> Trabajos del usuario</h3>
                      </div>
                      <div class="col-sm-12">
                      <?php if (!$trabajos_usuario): ?>
                            <?php echo "No se encontraron registros..."; ?>
                          <?php endif ?>
                          <?php if ($trabajos_usuario): ?>
                          <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Trabajos del usuario</div>

                            <!-- Table -->
                            <div class="table-responsive">
                              <table border="0" class="table table-hover" align="center" >
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>titulo</th>
                                        <th>vinculo</th>
                                        <th>fecha de asignacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  foreach ($trabajos_usuario as $trabajo):
                                  //obtenemos trabajos para mostrar
                                  $titulo = $trabajo->trabajo_titulo;
                                  $vinculo = $trabajo->vinculo;
                                  $id_trabajo = $trabajo->id_trabajo;
                                  $fecha_de_asignacion = $trabajo->fecha_de_asignacion;
                                ?>
                                  <tr>
                                    <td><a href="?controller=front&action=detalles_trabajo&id_trabajo=<?= $id_trabajo ?>"><?php echo $titulo;?></a></td>
                                    <td><?php echo $vinculo;?></td>
                                    <td><?php echo $fecha_de_asignacion;?></td>
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
              </div>
            </div>
        <!-- /contenido -->
    </div>
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




<!--********************* modal Cambiar departamento ******************-->


                   <div class="modal fade" id="cambiar_departamento">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Cambio de departamento</h4>
                          <form class="form-group" action="?controller=usuario&action=cambio_de_departamento" method="post">
                          <input type="hidden" name="id_usuario" value="<?php echo $datos_usuario->id_usuario; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="departamento">
                                <option>Seleccione un departamento</option>
                                <?php foreach ($departamentos as $departamento): ?>
                                  <option value="<?php echo $departamento->id_departamento; ?>"><?php echo $departamento->departamento_nombre; ?></option>
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

<!--********************* modal Cambiar categoria ******************-->


                   <div class="modal fade" id="cambiar_categoria">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Cambio de categoría</h4>
                          <form class="form-group" action="?controller=usuario&action=cambio_de_categoria" method="post">
                          <input type="hidden" name="id_usuario" value="<?php echo $datos_usuario->id_usuario; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="categoria">
                                <option>Seleccione un categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                  <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->categoria_nombre; ?></option>
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


<!--********************* modal Cambiar rol ******************-->


                   <div class="modal fade" id="cambiar_rol">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Cambio de rol de usuario</h4>
                          <form class="form-group" action="?controller=usuario&action=cambio_de_rol" method="post">
                          <input type="hidden" name="id_usuario" value="<?php echo $datos_usuario->id_usuario; ?>">
                            <div class="col-sm-12 form-group">
                              <select class="form-control" name="rol">
                                <option>seleccione un rol</option>
                                <?php foreach ($roles as $rol): ?>
                                  <option value="<?php echo $rol->id_rol; ?>"><?php echo $rol->rol_nombre; ?></option>
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




<!--******************************************************************-->