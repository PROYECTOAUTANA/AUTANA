<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}

if($_SESSION['rol'] == 'administrador'){ 
    $barra = "barra_admin";
}elseif ($_SESSION['rol'] == 'supervisor') {
    $barra = "barra_usuario";
}else{

    header("location: ?controller=front&action=home");
}

require_once "sections/head.php"; 
?>
<body >
<?php 
include("sections/cargando.php");
include("sections/navbar.php"); 
include("sections/$barra.php"); 
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
                              <a  href="?controller=reporte&action=estatus&id_trabajo=<?php echo $id_trabajo; ?>" target="_blank" class="btn btn-danger btn-block"><i class="glyphicon glyphicon-print"></i>  Estatus</a>
                          </div>
                          <div class="form-group col-sm-6">
                              <a href="#cambiar_fase" data-toggle="modal" class="btn btn-success btn-block"><i class="glyphicon glyphicon-ok"></i> Cambiar de fase</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Datos del trabajo:</div>

                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover">
                              <tr>
                                <td class="col-sm-6">
                                  FECHA DE PRESENTACION PUBLICA
                                </td>
                                <td class="col-sm-6">
                                    <div class="input-group">
                                      <input  disabled="disabled" class="form-control" value="<?php echo $datos_trabajo["fecha_presentacion"];?>">
                                      <span class="input-group-addon" onclick="$('#').removeAttr('disabled');" id="basic-addon1" style="background-color:#777;color:#fff;"><i class="glyphicon glyphicon-pencil"></i>
                                      </span>
                                    </div>
                                </td>
                              </tr> 
                              <tr>
                                <td class="col-sm-6">
                                 TITULO 
                                </td>
                                <td class="col-sm-6">
                                  <div class="input-group">
                                      <input  disabled="disabled" class="form-control" type="text" value="<?php echo $datos_trabajo["trabajo_titulo"];?>">
                                      <span class="input-group-addon" id="basic-addon1" style="background-color:#777;color:#fff;"><i class="glyphicon glyphicon-pencil"></i>
                                      </span>
                                  </div>
                                </td>
                              </tr> 
                              <tr>
                                <td class="col-sm-6">
                                 PROCESO 
                                </td>
                                <td class="col-sm-6">
                                  <div class="input-group">
                                    <input  disabled="disabled" class="form-control" type="text" value="<?php echo $datos_trabajo["proceso"];?>">
                                    <span class="input-group-addon" id="basic-addon1" style="background-color:#777;color:#fff;">
                                      <i class="glyphicon glyphicon-pencil"></i>
                                    </span>
                                  </div>
                                </td>
                              </tr> 
                              <tr>
                                <td class="col-sm-6">
                                 FASE ACTUAL
                                </td>
                                <td class="col-sm-6">
                                  <div class="input-group">
                                    <input  disabled="disabled" class="form-control" type="text" value="<?php echo $datos_trabajo["fase_nombre"];?>">
                                    <span class="input-group-addon" id="basic-addon1" style="background-color:#777;color:#fff;">
                                      <i class="glyphicon glyphicon-pencil"></i>
                                    </span>
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
                          <h1><span class="glyphicon glyphicon-th-large"></span>  Docentes</h1>
                        <hr>
                    </div>
                    <div class="col-sm-12">

                        <div class="col-sm-4">
                          <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Autores:</div>

                                <!-- Table -->
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <?php 
                                    if (!$autores):?>
                                    <tr>
                                        <td class="col-sm-12">
                                          No hay autores para este trabajo...
                                          <a href="#incluir_docente" data-toggle="modal">Asignar</a>
                                        </td>
                                    </tr> 
                                    <?php
                                    endif;
                                    if ($autores):
                                    ?>
                                    <?php foreach ($autores as $autor):?>
                                      <tr>
                                        <td class="col-sm-6">
                                          <?php echo $autor["usuario_nombre"]; ?>
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
                            
                        

                        <div class="col-sm-4">
                          <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Jurados:</div>

                                <!-- Table -->
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <?php 
                                    if (!$jurados):?>
                                    <tr>
                                        <td class="col-sm-12">
                                          No hay jurados para este trabajo...
                                          <a href="#incluir_docente" data-toggle="modal">Asignar</a>
                                        </td>
                                    </tr> 
                                    <?php
                                    endif;
                                    if ($jurados):
                                    ?>
                                    <?php foreach ($jurados as $jurado):?>
                                      <tr>
                                        <td class="col-sm-6">
                                          <?php echo $jurado["usuario_nombre"]; ?>
                                        </td>
                                        <td class="col-sm-6">
                                          <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-ok"></i> Quitar</a>
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
                            

                            <div class="col-sm-4">
                              <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Tutores:</div>

                                <!-- Table -->
                                <div class="table-responsive">
                                  <table class="table table-hover">
                                    <?php 
                                    if (!$tutores):?>
                                    <tr>
                                        <td class="col-sm-12">
                                          No hay tutores para este trabajo...
                                          <a href="#incluir_docente" data-toggle="modal">Asignar</a>
                                        </td>
                                    </tr> 
                                    <?php
                                    endif;
                                    if ($tutores):
                                    ?>
                                    <?php foreach ($tutores as $tutor):?>
                                      <tr>
                                        <td class="col-sm-6">
                                          <?php echo $tutor["usuario_nombre"]; ?>
                                        </td>
                                        <td class="col-sm-6">
                                          <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-ok"></i> Quitar</a>
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
                       </div> 
                       <div class="col-sm-12 form-group">
                          <a href="#incluir_docente" data-toggle="modal" class="btn btn-info btn-block"><i class="glyphicon glyphicon-plus"></i>  Asignar Docentes</a>
                        </div>  
                  </div>
              </div>
            </div>
        <!-- /contenido -->
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