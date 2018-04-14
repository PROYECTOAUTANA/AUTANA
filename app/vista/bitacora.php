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
<style type="text/css">
  #scroll {
   overflow-y: scroll;
  height:600px;
  width:100%;

}

#scroll table {
  width:100%;
}

</style>
    <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-md-12">
                      <div class="col-md-6">
                        <h3><span class="glyphicon glyphicon-list"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                      </div>
                      <div class="col-sm-6 grupobotones">
                        <div class="col-sm-6">
                            <a href="#" class="btn btn-info btn-block"><i class="glyphicon glyphicon-refresh"></i>  Refrescar</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#eliminar_todo" data-toggle="modal" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-trash"></i>  Borrar historial</a>
                        </div>
                      </div>
                    </div><br>
                      <div class="col-sm-12"> 
                         <?php if (!$transacciones): ?>
                            <?php echo "No se encontraron registros..."; ?>
                          <?php else: ?>
                        
                          <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Transacciones del sistema</div>

                            <!-- Table -->
                            <div class="table-responsive" id="scroll">
                              <table border="0" class="table table-hover" align="center" >
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>tabla</th>
                                    <th>accion</th>
                                    <th>fecha</th>
                                    <th colspan="2">operaciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <?php
                                    $c = 1; 
                                    foreach ($transacciones as $transaccion): 
                                  ?>
                                  <tr>
                                    <td><?php echo $c; ?></td>
                                    <td><?php echo $transaccion->tabla; ?></td>
                                    <td><?php echo $transaccion->accion; ?></td>
                                    <td><?php echo $transaccion->fecha; ?></td>
                                    <td><a class="btn btn-success" href="?controller=front&action=transaccion&id=<?php echo $transaccion->id; ?>">Ver transaccion</a></td>
                                    <td><a class="btn btn-danger" href="#eliminar_transaccion" data-toggle="modal">eliminar</a></td>
                                  </tr>
                                  <?php 
                                    $c++;
                                    endforeach;
                                  ?>
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



<!--********************* VENTANAS MODALES ...  ******************-->



<!--********************* Eliminar transaccion ******************-->


                   <div class="modal fade" id="eliminar_transaccion">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea Eliminar esta transaccion?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=bitacora&action=eliminar_transaccion&id_transaccion=<?php echo $transaccion->id; ?>" class="btn btn-danger">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->


<!--********************* Eliminar todo el historial ******************-->


                   <div class="modal fade" id="eliminar_todo">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea Eliminar todo el historial?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=bitacora&action=eliminar_historial" class="btn btn-danger">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->



<!--******************************************************************-->