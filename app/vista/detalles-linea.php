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
                             <form action="?controller=linea&action=editar_linea" method="post" class="form-group" data-toggle="validator"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombre_linea">Nombre:</label>
                                   <input type="hidden" id="nombrelinea" class="form-contlinea" value="<?= $datos_linea->id_linea; ?>" name="id_linea"> 
                                  <input type="text" id="nombre_linea" class="form-control" data-error="Introduzca un nombre." name="nombre" value="<?php echo $datos_linea->linea_nombre; ?>" required>
                                <div class="help-block with-errors"></div>
                                  </div>
                                <div class="form-group col-sm-12">
                                  <label for="descripcionlinea">Descripción:</label>
                                  <textarea  id="descripcionlinea" name="descripcion" required class="form-control" rows="3" >
                                    <?php echo $datos_linea->linea_descripcion; ?>
                                  </textarea>
                                <div class="help-block with-errors"></div>
                                  </div>
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
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