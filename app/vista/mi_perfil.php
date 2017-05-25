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
                                  <input readonly="readonly" class="form-control" type="text" value="<?php echo $datos_usuario->departamento_nombre;?>">
                              </div>
                              <div class="form-group col-sm-4">
                              <label>Rol Actual</label>
                                  <input  readonly="readonly" class="form-control " type="text" value="<?php echo $datos_usuario->rol_nombre;?>">
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
                          <div class="col-sm-6 form-group">
                            <a class="btn btn-default btn-block" href="#cambiar_departamento" data-toggle="modal">  Cambiar departamento</a>
                          </div>
                          <div class="col-sm-6 form-group">
                            <a class="btn btn-default btn-block" href="#cambiar_clave" data-toggle="modal">  Cambiar contraseña</a>
                          </div>
                        </form>  
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


<!--********************* modal Cambiar departamento ******************-->


                   <div class="modal fade" id="cambiar_clave">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4>Cambio de contraseña</h4>
                          <form class="form-group" action="?controller=usuario&action=cambio_de_clave" method="post" data-toggle="validator">
                              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
                              <div class="form-group col-sm-12">
                                <label for="clave">Contraseña:</label>
                                <input type="password"  name="clave_vieja" class="form-control" data-error="Introduzca su contraseña." placeholder="Escriba su contraseña..." minlength="4" maxlength="10" required>
                                <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="clave">Contraseña:</label>
                                <input type="password"  data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
                                <div class="help-block">Míninmo 6 Carácteres</div>
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="rclave">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" id="clave_nueva" name="clave_nueva" data-match="#inputPassword" data-match-error="las contraseñas no coinciden" placeholder="Confirm" required>
                                 <div class="help-block with-errors"></div>
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