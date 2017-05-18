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
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-4 trabajos">
                        <h3><i class="fa fa-tasks" aria-hidden="true"></i>  <?php echo $titulo_de_la_vista; ?></h3>
                      </div>
                       <div class="col-sm-8 grupobotones">
                        <div class="col-sm-4">
                            <a href="#nuevo_trabajo" data-toggle="modal" class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"></i>  Nuevo Trabajo</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="?controller=front&action=trabajos" class="btn btn-info btn-block"><i class="glyphicon glyphicon-refresh"></i>  Refrescar</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="?controller=reporte&action=reporte_de_trabajos_pdf" target="_blank" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-print"></i> Reporte PDF</a>
                        </div>
                      </div>
                    </div>
                      <div class="col-sm-12 tablas">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">Trabajos </div>
                            <!-- Table -->
                            <div class="table-responsive">
                              <?php if (!$trabajos): ?>
                                <p>No existen trabajos registrados en la base de datos <a href="#nuevo_trabajo" data-toggle="modal">  Registrar Nuevo</a></p>
                              <?php endif ?>
                              <?php if ($trabajos): ?>
                                <table class="table table-hover">
                                      <thead>
                                      <tr>
                                        <th >#</th>
                                        <th>Titulo</th>
                                        <th>Fecha de presentacion</th>
                                        <th>Resumen</th>
                                        <th colspan="3">Operaciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $contador = 1;
                                    foreach ($trabajos as $trabajo):
                                          
                                          $id_trabajo = $trabajo->id_trabajo;
                                    ?>
                                    <tr>
                                      <td><?php echo $contador;?></td>
                                      <td><?php echo $trabajo->trabajo_titulo;?></td>
                                      <td><?php echo $trabajo->trabajo_fecha_presentacion;?></td>
                                      <td><?php echo $trabajo->trabajo_resumen;?></td>
                                      <td>
                                          <a class="btn btn-info" href="?controller=front&action=detalles_trabajo&id_trabajo=<?php echo $trabajo->id_trabajo; ?>"> <i class="glyphicon glyphicon-pencil"></i>  Detalles
                                          </a>
                                      </td>
                                      <td>
                                        <a class="btn btn-danger" href="#eliminar_trabajo" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i>  Eliminar
                                        </a>
                                      </td>
                                      <td>
                                        <a class="btn btn-default" href="?controller=reporte&action=ver_estatus_trabajo&id_trabajo=<?php echo $trabajo->id_trabajo; ?>" target="_blank"> <i class="glyphicon glyphicon-stats"></i>  Estatus
                                        </a>
                                      </td>
                                    </tr>
                                    <?php 
                                    $contador++;
                                    endforeach;?>
                                  </tbody>
                                </table>
                              <?php endif ?>
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


<!--***********************  MODAL NUEVO TRABAJO  **********************-->



  

<div class="modal fade" id="nuevo_trabajo">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center"> Nuevo Trabajo </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                      <div class="modal-body col-sm-12">
                        <form method="post" action="?controller=trabajo&action=registrar_trabajo" class="form-group" data-toggle="validator" onsubmit="return validarSelect(this)">

                             <div class="form-group col-sm-4">
                              <label for="titulo">Titulo:</label>
                              <input class="form-control" data-error="Por favor introduzca un título." id="titulo" name="titulo" placeholder="Escriba..." type="text"   required />    
                                  <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="proceso">Proceso:</label>
                              <select id="proceso" name="proceso" id="proceso" size="1" class="form-control" >
                                <option value="0">Seleccione</option>
                                <option value="regular">Regular</option>
                                <option value="extraordinario">Extraordinario</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-4">
                              <label>Fecha de Presentacion Publica:</label>
                              <input type="text" name="fecha_pp" id="fecha_pp" class="form-control" data-error="Por favor introduzca una fecha." placeholder="YY/MM/DD" required /> 
                                  <div class="help-block with-errors"></div>
                            </div>

                             <div class="form-group col-sm-6">
                              <label for="">Linea de investigacion:</label>
                          <select name="linea" id="linea" class="form-control" class="form-control">
                            <option value="0">seleccione</option>
                                <?php foreach ($lineas as $linea): ?>
                                  <option value="<?= $linea->id_linea; ?>"><?= $linea->linea_nombre; ?></option>
                                <?php endforeach; ?>
                          </select>
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="">Fase:</label>
                              <select name="fase" id="fase" class="form-control" class="form-control">
                               <option value="0">seleccione</option>
                                <?php foreach ($fases as $fase): ?>
                                  <option value="<?= $fase->id_fase; ?>"><?= $fase->fase_nombre; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                             <div class="form-group col-sm-6">
                              <label for="categoria_ascenso">categoria de ascenso:</label>
                              <input class="form-control" data-error="Por favor introduzca un valor valido." id="categoria_ascenso" name="categoria_ascenso" placeholder="Escriba..." type="text"   required />    
                                  <div class="help-block with-errors"></div>
                            </div>
                             <div class="form-group col-sm-6">
                              <label for="mension">mension:</label>
                              <input class="form-control" data-error="Por favor introduzca un valor valido" id="mension" name="mension" placeholder="Escriba..." type="text"   required />    
                                  <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="">Resumen:</label>
                              <textarea name="resumen" class="form-control" rows="3" required/></textarea>
                              <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" value="Registrar">
                            </div>
                          </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL nuevo trabajo-->

                  <script type="text/javascript">
                    function validarSelect(f){
                      var proceso = f.elements["proceso"].value;
                      var linea = f.elements["linea"].value;
                      var fase = f.elements["fase"].value;

                      if (proceso == 0) {

                        alert("seleccione un proceso valido");
                        return false;
                      }else if (linea == 0) {

                        alert("seleccione un linea valido");
                        return false;
                      }else if (fase == 0) {

                        alert("seleccione una fase valida");
                        return false;
                      }else{
                       
                        return true;
                      }

                    }
                  </script>

<!--******************************************************************-->


<!--********************* Eliminar TRABAJO ******************-->


                   <div class="modal fade" id="eliminar_trabajo">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea Eliminar esta trabajo?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=trabajo&action=eliminar_trabajo&id_trabajo=<?php echo $id_trabajo; ?>" class="btn btn-danger">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->
<script type="text/javascript">
  
  var date = $("#fecha_pp").datepicker({ dateFormat: 'yy/mm/dd' }).val();
</script>


<!--******************************************************************-->