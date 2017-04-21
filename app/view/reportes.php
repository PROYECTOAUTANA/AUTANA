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
<body>
<?php 
include("sections/cargando.php"); 
include("sections/navbar.php"); 
include("sections/$barra.php"); 
?>
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid" >
                    <div class="contenido_1 col-sm-12" >
                        <h1><span class="glyphicon glyphicon-th-large"></span>  <?= $title_view  ?></h1>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                      <form class="form-group">
                        <div class="form-group">
                          <label for="reporte">Seleccione el tipo de reporte:</label>
                            <select onchange="tipodereporte(this)" id="tipo" name="tipo" class="form-control">
                              <option value="0">seleccione</option>
                              <option value="trabajos">trabajos de ascenso</option>
                              <option value="usuarios">usuarios</option>
                              <option value="constancia">constancia</option>
                            </select>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-12">
                      <form class="form-group ">
                        <div class="reporte_respuesta"></div>
                        
                        <div class="form-group col-sm-12">
                            <button type="button" id="verReporte" name="boton" disabled="disabled" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> VER REPORTE</button>
                        </div>
                      </form>
                    </div>
            </div>
        </div>
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
