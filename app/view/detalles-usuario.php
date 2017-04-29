<?php 
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}
require_once "sections/head.php"; 
?>
<body>
<?php 
include("sections/cargando.php");
include("sections/navbar.php"); 
include("sections/menu.php"); 
?>
        <!-- /#sidebar-wrapper -->
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6 trabajos">
                          <h1><span class="glyphicon glyphicon-th-large"></span>  <?= $title_view  ?></h1>
                        </div>
                        <div class="col-sm-6 grupobotones">
                          <div class="form-group col-sm-6">
                              <a  href="?controller=reporte&action=informacion_usuario&id_usuario=<?php echo $id; ?>" target="_blank" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-print"></i>  Informe</a>
                          </div>
                          <div class="form-group col-sm-6">
                              <a href="#cambiar_rol" data-toggle="modal" class="btn btn-success btn-block"><i class="glyphicon glyphicon-ok"></i> Cambiar Rol</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Datos del Usuario:</div>

                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover">
                              <tr>
                                <td class="col-sm-6">
                                  CEDULA
                                </td>
                                <td class="col-sm-6">
                                    <div class="input-group">
                                      <input  disabled="disabled" id="cedula" class="form-control" value="<?php echo $datos_usuario["usuario_cedula"];?>">
                                      <span class="input-group-addon" onclick="$('#cedula').removeAttr('disabled');" id="basic-addon1" style="background-color:#777;color:#fff;"><i class="glyphicon glyphicon-pencil"></i>
                                      </span>
                                    </div>
                                </td>
                              </tr> 
                              <tr>
                                <td class="col-sm-6">
                                 NOMBRE
                                </td>
                                <td class="col-sm-6">
                                  <div class="input-group">
                                      <input  disabled="disabled" id="nombre" class="form-control" type="text" value="<?php echo $datos_usuario["usuario_nombre"];?>">
                                      <span class="input-group-addon" onclick="$('#nombre').removeAttr('disabled');" id="basic-addon1" style="background-color:#777;color:#fff;"><i class="glyphicon glyphicon-pencil"></i>
                                      </span>
                                  </div>
                                </td>
                              </tr> 
                              <tr>
                                <td class="col-sm-6">
                                 APELLIDO
                                </td>
                                <td class="col-sm-6">
                                  <div class="input-group">
                                    <input  disabled="disabled" id="apellido" class="form-control" type="text" value="<?php echo $datos_usuario["usuario_apellido"];?>">
                                    <span class="input-group-addon" onclick="$('#apellido').removeAttr('disabled');" id="basic-addon1" style="background-color:#777;color:#fff;">
                                      <i class="glyphicon glyphicon-pencil"></i>
                                    </span>
                                  </div>
                                </td>
                              </tr> 
                              <tr>
                                <td class="col-sm-6">
                                 ROL ACTUAL
                                </td>
                                <td class="col-sm-6">
                                  <div class="input-group col-sm-12">
                                    <input  disabled="disabled" class="form-control " type="text" value="<?php echo $datos_usuario["rol"];?>">
                                  </div>
                                </td>
                              </tr> 
                          </table>
                        </div>
                      </div>    
                    </div>

                    <div class="col-sm-12">
                      <div class="btn-group">
                        <a href="#" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i>  Guardar Cambios</a>
                        <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i> Descartar Cambios</a>
                      </div>
                    </div>


                    <div class="col-sm-12">
                        <br><br>
                          <h1><span class="glyphicon glyphicon-th-large"></span>  Trabajos de Ascenso</h1>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                          <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Trabajos:</div>

                                <!-- Table -->
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <?php 
                                    if (!$trabajos):?>
                                    <tr>
                                        <td class="col-sm-12">
                                          No hay trabajos para este trabajo...
                                          <a href="#incluir_docente" data-toggle="modal">Asignar</a>
                                        </td>
                                    </tr> 
                                    <?php
                                    endif;
                                    if ($trabajos):
                                    ?>
                                    <tr>
                                      <td>Titulo del Trabajo </td>
                                      <td>Vinculo del Usuario </td>
                                      <td></td>
                                    </tr>
                                    <?php foreach ($trabajos as $trabajo):?>
                                      <tr>
                                        <td class="col-sm-6">
                                          <?php echo $trabajo["trabajo_titulo"]; ?>
                                        </td>
                                        <td class="col-sm-6">
                                          <?php echo $trabajo["vinculo"]; ?>
                                        </td>
                                        <td class="col-sm-6">
                                          <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-ok"></i> Quitar</a>
                                        </td>
                                      </tr> 
                                    <?php 
                                    endforeach; 
                                    endif;
                                    ?>
                                  </table>
                                </div>
                              </div>  
                            </div>
                       <div class="col-sm-12 form-group">
                          <a href="#incluir_trabajo" data-toggle="modal" class="btn btn-info btn-block"><i class="glyphicon glyphicon-plus"></i>  Asignar Trabajo</a>
                        </div>  
                  </div>
              </div>
            </div>
        <!-- /contenido -->
    </div>
    <!-- /#principal -->
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/minimenu.php");
include("sections/modal.php"); 
include("sections/footer2.php");
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/ajax.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/boton.js"></script>
<script src="src/js/fecha.js"></script>
<script src="src/js/hora.js"></script>
</body>
</html> 