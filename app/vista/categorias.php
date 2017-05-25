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
                            <a href="#nueva_categoria" data-toggle="modal" class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"></i>  Nueva categoria</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="?controlador=front&action=categorias" class="btn btn-info btn-block"><i class="glyphicon glyphicon-refresh"></i>  Refrescar</a>
                        </div>
                      </div> 
                    </div><br><br>  
                      <div class="col-sm-12"> 
                          
                      <?php if (!$categorias): ?>
                        <?php echo "No se encontraron registros..."; ?>
                      <?php endif ?>
                      <?php if ($categorias): ?>
                      <br><br>
                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Categorias de Docentes</div>

                        <!-- Table -->
                        <div class="table-responsive">
                          <table border="0" class="table table-hover" align="center" >
                            <thead>
                                <tr style="text-align:center;">
                                    <th>#</th>
                                    <th>Categoria</th>
                                    <th>Descripción</th>
                                    <th colspan="2">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $contador = 1;
                              foreach ($categorias as $categoria):
                              //obtenemos categorias para mostrar
                              $descripcion = $categoria->categoria_descripcion;
                              $nombre = $categoria->categoria_nombre;
                              $id_categoria = $categoria->id_categoria;
                            ?>
                              <tr>
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $nombre;?></td>
                                <td><?php echo $descripcion;?></td>
                                <td>
                                  <a class="btn btn-info" href="?controller=front&action=detalles_categoria&id_categoria=<?= $id_categoria ?>"> <i class="glyphicon glyphicon-pencil"></i>  Detalles</a>
                                </td>
                                <td>
                                  <a class="btn btn-danger" href="#eliminar_categoria" data-toggle="modal" ><i class="glyphicon glyphicon-trash"></i>  Eliminar</a>
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


<!--********************** nueva categoria*********** -->
 <div class="modal fade" id="nueva_categoria">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Nueva Categoria</h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=categoria&action=registrar_categoria" method="post" class="form-group col-sm-12" data-toggle="validator"> 
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
                  </div> <!--TERMINO EL DIV DEL MODAL de nuevo departamento-->
<!--*************************************************************************************-->


<!--********************* Eliminar Cataegoria ******************-->


                   <div class="modal fade" id="eliminar_categoria">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea Eliminar esta categoria?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=categoria&action=eliminar_categoria&id_categoria=<?php echo $id_categoria; ?>" class="btn btn-danger">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->





<!--******************************************************************-->