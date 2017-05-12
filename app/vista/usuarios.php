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
<!--********************************************************************-->
</head>
<body>
<?php 
//llamamos a el menu superior horizontal
include("secciones/navbar.php"); 
//llamamos al menu navegacional del usuario
include("secciones/menu.php"); 
?>

    <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-4 trabajos">
                        <h3><span class="glyphicon glyphicon-user"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                      </div>
                       <div class="col-sm-8 grupobotones">
                        <div class="col-sm-4">
                            <a href="#nuevo_usuario" data-toggle="modal" class="btn btn-default btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i>  Nuevo usuario</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="?controller=front&action=usuarios" class="btn btn-info btn-block"><i class="glyphicon glyphicon-refresh"></i>  Refrescar</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="?controller=reporte&action=reporte_de_usuarios_pdf" target="_blank" data-toggle="modal" class="btn btn-danger btn-block"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reporte PDF</a>
                        </div>
                      </div>
                    </div>
                      <div class="col-sm-12 tablas">
                        <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Usuarios</div>

                        <!-- Table -->
                        <div class="table-responsive">
                           <table class="table table-hover">
                              <thead>
                                  <tr style="text-align:center;">
                                      <th>Cedula</th>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th colspan="2">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                               <?php 
                                  foreach ($usuarios as $dato):
                                  //obtenemos datos para mostrar
                                    $cedula = $dato->usuario_cedula;
                                    $nombre = $dato->usuario_nombre;
                                    $apellido = $dato->usuario_apellido;
                                    $id_usuario = $dato->id_usuario;
                                ?>
                                  <tr>
                                    <td><?php echo $cedula;?></td>
                                    <td><?php echo $nombre;?></td>
                                    <td><?php echo $apellido;?></td>
                                    <td>
                                      <a class="btn btn-default" href="?controller=front&action=detalles_usuario&id_usuario=<?php echo $id_usuario; ?>"><i class="glyphicon glyphicon-pencil"></i>  Detalles</a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" href="#eliminar_usuario" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i>  Eliminar</a>
                                    </td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                              </tbody>
                        </table>
                        </div>
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


<!--************* NUEVO USUARIO ************************-->
<div class="modal fade" id="nuevo_usuario">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Registrar Usuario </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form method="post" action="?controller=usuario&action=registrar_usuario" class="form-group" data-toggle="validator">
                        <div class="form-group col-sm-4">
                          <label for="cedula">Cedula:</label>
                          <input  name="cedula" class="form-control" type="tel" data-minlength="7" data-error="Debe ser mayor a 6 digitos." placeholder="Escriba..." onkeypress="return controltag(event)" required>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="nombre">Nombre:</label>
                          <input  name="nombre" class="form-control" type="text" data-error="Introduzca un nombre." placeholder="Escriba..." onkeypress="return controltext(event)" required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="apellido">Apellido:</label>
                          <input  name="apellido" class="form-control" data-error="Introduzca un apellido." type="text"  placeholder="Escriba..." onkeypress="return controltext(event)" required />
                        <div class="help-block with-errors"></div>
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="sexo">Sexo:</label>
                          <select class="form-control" size="1" name="sexo" >
                          <option value='0'>selecciona</option>
                            <option value="1">F</option>
                            <option value="2">M</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="telefono">Telefono:</label>
                          <input  name="telefono" onkeypress="return controltag(event)"  class="form-control" type="tel" data-minlength="11" data-error="El número debe ser mayor a 10 digitos" placeholder="Escriba...">
                        <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="inputEmail">Correo:</label>
                          <input type="email" class="form-control" id="correo" name="correo" placeholder="Email (Opcional)">
                    <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="direccion">Direccion:</label>
                          <textarea  name="direccion" class="form-control" rows="3" required /></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="rol">Rol de Usuario:</label>
                          <select name="rol" class="form-control">

                              <option value='0'>selecciona</option>
                              <?php foreach ($roles as $rol): ?>
                                <option value="<?php echo $rol->id_rol; ?>"><?php echo $rol->rol_nombre; ?></option>
                              <?php endforeach ?>
                          
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="departamento">Departamento:</label>

                          <select name="departamento" class="form-control">
                          
                                <option value='0'>selecciona</option>
                            <?php foreach ($departamentos as $departamento) :?>
                                <option value="<?php echo $departamento->id_departamento; ?>"><?php echo $departamento->departamento_nombre; ?></option>
                            <?php endforeach; ?>

                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="categoria_actual">Categoria Actual:</label>
                          <select name="categoria_actual" class="form-control">
                            <option value='0'>selecciona</option>
                            <?php foreach ($categorias as $categoria):?>  
                            <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->categoria_nombre; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                       <div class="form-group col-sm-4">
                          <label for="clave">Contraseña:</label>
                          <input type="password"  data-minlength="6" class="form-control" id="clave" placeholder="Password" required>
                          <div class="help-block">Míninmo 6 Carácteres</div>
                          </div>
                        <div class="form-group col-sm-4">
                          <label for="rclave">Confirmar Contraseña:</label>
                          <input type="password" class="form-control" id="clave" data-match="#clave" data-match-error="las contraseñas no coinciden" placeholder="Confirm" required>
                        <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="observacion">Observacion:</label>
                          <textarea id="observacion" class="form-control" data-error="Requerido." rows="3" required></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12">
                          <button type="submit" class="btn btn-info btn-block" ><i class="glyphicon glyphicon-ok" ></i>  Enviar</button>
                        </div>
                      </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL nuevo usuario-->
                  
<!--******************************************************************-->


<!--********************* Eliminar USUARIO ******************-->


                   <div class="modal fade" id="eliminar_usuario">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea Eliminar esta usuario?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=usuario&action=eliminar_usuario&id_usuario=<?php echo $id_usuario; ?>" class="btn btn-danger">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->




<!--******************************************************************-->