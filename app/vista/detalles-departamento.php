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
                    </div>
                    <div class="col-sm-12">
                             <form action="?controller=departamento&action=editar_departamento" method="post" class="form-group" data-toggle="validator"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombre_departamento">Nombre:</label>
                                   <input type="hidden"  value="<?= $datos_departamento->id_departamento; ?>"  name="id_departamento"> 
                                   
                                  <input type="text" id="nombre_departamento" data-error="Introduzca un nombre." class="form-control" name="nombre" value="<?php echo $datos_departamento->departamento_nombre; ?>" required />   
                                  <div class="help-block with-errors"></div>
                                  </div>
                                <div class="form-group col-sm-12">
                                  <label for="descripciondepartamento">Descripción:</label>
                                  <textarea  id="descripciondepartamento" name="descripcion" class="form-control" rows="3" required >
                                    <?php echo $datos_departamento->departamento_descripcion; ?>
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