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
                        <h3><i class="fa fa-id-card-o" aria-hidden="true"></i>  <?php echo $titulo_de_la_vista; ?></h3>
                    </div>
                    <div class="col-sm-12">
                     <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Detalles </div>
                        <!-- Table -->
                        <div class="table-responsive" id="scroll">
                          <table class="tabla_inicial table table-hover">
                            <tbody>
                              <tr>
                                <td>tabla: </td>
                                <td><?php echo $datos_transaccion->tabla; ?></td>
                              </tr>
                              <tr>
                                <td>accion: </td>
                                <td><?php echo $datos_transaccion->accion; ?></td>
                              </tr>
                              <tr>
                                <td>fecha: </td>
                                <td><?php echo $datos_transaccion->fecha; ?></td>
                              </tr>
                              <tr>
                                <td>hora: </td>
                                <td><?php echo $datos_transaccion->hora; ?></td>
                              </tr>
                              <tr>
                                <td>observacion: </td>
                                <td><?php echo $datos_transaccion->observacion; ?></td>
                              </tr>
                            </tbody>
                           </table>
                        </div>
                      </div>   
                </div>

<?php 
  switch ($datos_transaccion->tabla) {
    case 'trabajo':
      $array_campo = array('id','titulo','mension','fecha de presentacion','proceso','resumen','fecha de registro','estado actual','fecha de cierre');
    break;
    case 'usuario':
      $array_campo = array('id','cedula','nombre','apellido','sexo','telefono','correo','direccion','clave','fecha de registro','categoria','fecha de asignacion de categoria','estado');
    break;
    case 'categoria':
      $array_campo = array('id','nombre','descripcion','fecha de registro');
    break;
    case 'departamento':
      $array_campo = array('id','nombre','descripcion','fecha de registro');
    break;
    case 'fase':
      $array_campo = array('id','nombre','descripcion','fecha de registro');
    break;
    case 'linea':
      $array_campo = array('id','nombre','descripcion','fecha de registro');
    break;
    case 'rol':
      $array_campo = array('id','nombre','descripcion','fecha de registro');
    break;
  }
?>
      <div class="col-sm-12">
          <h3><i class="fa fa-id-card-o" aria-hidden="true"></i> Detalles en los campos:</h3>
      </div>
      <div class="col-sm-12">
        <div class="panel panel-primary">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Detalles </div>
                  <!-- Table -->
                  <div class="table-responsive" id="scroll">
                      <table class="tabla_inicial table table-hover">
                          <thead>
                            <tr>
                              <th>campo</th>
                              <th>valor antiguo</th>
                              <th>valor nuevo</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 

                          switch ($datos_transaccion->accion) {
                            case "INSERTAR":
                              $datos_transaccion->nuevo = str_replace("(", "", $datos_transaccion->nuevo,$variable);
                              $datos_transaccion->nuevo = str_replace(")", "", $datos_transaccion->nuevo,$variable);
                              $array_new = explode(",", $datos_transaccion->nuevo);
                              $cantidad_de_campos = count($array_new);

                              for ($i=0; $i < $cantidad_de_campos; $i++):
                                  echo '<tr>
                                      <td>'.$array_campo[$i].'</td>
                                      <td></td>
                                      <td>'.$array_new[$i].'</td>
                                      </tr>';
                              endfor;

                            break;
                            case "MODIFICAR":
                              $datos_transaccion->nuevo = str_replace("(", "", $datos_transaccion->nuevo,$variable);
                              $datos_transaccion->nuevo = str_replace(")", "", $datos_transaccion->nuevo,$variable);
                              $datos_transaccion->viejo = str_replace("(", "", $datos_transaccion->viejo,$variable);
                              $datos_transaccion->viejo = str_replace(")", "", $datos_transaccion->viejo,$variable);
                              $array_new = explode(",", $datos_transaccion->nuevo);
                              $array_old = explode(",", $datos_transaccion->viejo);
                              $cantidad_de_campos = count($array_new);

                              for ($i=0; $i < $cantidad_de_campos; $i++):
                                  echo '<tr>
                                      <td>'.$array_campo[$i].'</td>
                                      <td>'.$array_old[$i].'</td>
                                      <td>'.$array_new[$i].'</td>
                                      </tr>';
                              endfor; 

                            break;
                            case "ELIMINAR":
                              $datos_transaccion->viejo = str_replace("(", "", $datos_transaccion->viejo,$variable);
                              $datos_transaccion->viejo = str_replace(")", "", $datos_transaccion->viejo,$variable);
                              $array_old = explode(",", $datos_transaccion->viejo);
                              $cantidad_de_campos = count($array_old);
                              
                                for ($i=0; $i < $cantidad_de_campos; $i++):
                                  echo '<tr>
                                      <td>'.$array_campo[$i].'</td>
                                      <td>'.$array_old[$i].'</td>
                                      </tr>';
                                endfor; 
                            break;
                          }
                          ?>
                          </tbody>
                        </table>
                  </div>
                </div> 
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