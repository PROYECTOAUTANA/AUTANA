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
                            <form action="?controller=rol&action=editar_rol" method="post" class="form-group col-sm-12" data-toggle="validator">
                                <div class="form-group col-sm-12">
                                <input type="hidden" value="<?= $datos_rol->id_rol; ?>" name="id_rol"> 
                                  <label for="nombrerol">Nombre:</label>
                                  <input type="text" id="nombrerol" data-error="Introduzca un nombre." class="form-control" value="<?= $datos_rol->rol_nombre; ?>" name="nombre" required >
                                  <div class="help-block with-errors"></div>
                            </div>
                                <div class="form-group col-sm-12">
                                  <label >Descripción del rol:</label>
                                  <textarea rows="3" name="descripcion" required class="form-control"><?= $datos_rol->rol_descripcion; ?></textarea>
                                  <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-sm-6">
                                  <label>Permisos Actuales del rol:</label>
                                    <table width="100%" class="table table-hover">
                                      <?php foreach ($modulos as $modulo): ?>
                                        <tr>
                                          <td>
                                            <?= $modulo->modulo_nombre ?>  
                                          </td>
                                          <td>
                                            <input type="checkbox" name="modulos[]" value="<?= $modulo->id_modulo ?>" checked>
                                          </td>
                                        </tr>
                                      <?php endforeach ?>
                                    </table>
                                </div>

                                 <div class="form-group col-sm-6">
                                  <label>Permisos deshabilitados:</label>
                                    <table width="100%" class="table table-hover">
                                      <?php foreach ($modulos_deshabilitados as $deshabilitado): ?>
                                        <tr>
                                          <td>
                                            <?= $deshabilitado->modulo_nombre ?>  
                                          </td>
                                          <td>
                                            <input type="checkbox" name="modulos[]" value="<?= $deshabilitado->id_modulo ?>">
                                          </td>
                                        </tr>
                                      <?php endforeach ?>
                                    </table>
                                </div>
                                
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>

                    
                    <div class="col-sm-12">

                       
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