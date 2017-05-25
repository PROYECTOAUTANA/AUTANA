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

    <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-md-12">
                      <div class="col-md-6">
                        <h3><span class="glyphicon glyphicon-list"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                      </div>
                     <div class="col-sm-6 col-xs-12 grupobotones">
                        <div class="col-sm-6">
                            <a href="#nuevo_departamento" data-toggle="modal" class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"></i>  Nuevo departamento</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="?controlador=front&action=departamentos" class="btn btn-info btn-block"><i class="glyphicon glyphicon-refresh"></i>  Refrescar</a>
                        </div>
                      </div>    
                    </div><br><br>
                      <div class="col-sm-12">                           
                        <?php if (!$departamentos): ?>
                            <?php echo "No se encontraron registros..."; ?>
                          <?php endif ?>
                          <?php if ($departamentos): ?>
                          <br><br>
                          <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Departamentos</div>

                            <!-- Table -->
                            <div class="table-responsive">
                              <table border="0" class="table table-hover" align="center" >
                                   <thead>
                                    <tr style="text-align:center;">
                                        <th >Departamento</th>
                                        <th >Descripción</th>
                                        <th colspan="2">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  $contador=1;
                                  foreach ($departamentos as $departamento):
                                  //obtenemos departamentos para mostrar
                                  $descripcion = $departamento->departamento_descripcion;
                                  $nombre = $departamento->departamento_nombre;
                                  $id_departamento = $departamento->id_departamento;
                                ?>
                                  <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $nombre;?></td>
                                    <td><?php echo $descripcion;?></td>
                                    <td>
                                      <a class="btn btn-info" href="?controller=front&action=detalles_departamento&id_departamento=<?= $id_departamento ?>"> <i class="glyphicon glyphicon-pencil"></i>  Detalles</a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" href="#eliminar_departamento" data-toggle="modal" ><i class="glyphicon glyphicon-trash"></i>  Eliminar</a>
                                    </td>
                                  </tr>
                                <?php 
                                $contador++;
                                endforeach; ?>
                                    </tbody>
                              </table>
                            </div>
                          </div>                  
                          <?php endif ?>

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


<!--********************** nuevo departamento *********** -->

 <div class="modal fade" id="nuevo_departamento">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Nuevo Departamento </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=departamento&action=registrar_departamento" method="post" class="form-group col-sm-12" data-toggle="validator"> 
                               <div class="form-group col-sm-12">
                                  <label for="nombre_categoria">Nombre:</label>
                                  <input  type="text" id="nombre_categoria"  data-error="Introduzca un nombre." class="form-control"  name="nombre" required />   
                                  <div class="help-block with-errors"></div>
                                  </div> 
                                <div class="form-group col-sm-12">
                                  <label for="descripcioncategoria">Descripción:</label>
                                  <textarea  id="descripcioncategoria" name="descripcion" data-error="Requerido." class="form-control" rows="3" required></textarea>
                                 <div class="help-block with-errors"></div>
                                  </div> 
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">

                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 
<!--*************************************************************************************-->


<!--********************* Eliminar departamento ******************-->


                   <div class="modal fade" id="eliminar_departamento">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea Eliminar este departamento?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=departamento&action=eliminar_departamento&id_departamento=<?php echo $id_departamento; ?>" class="btn btn-danger">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->


<!--******************************************************************-->