<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}
require_once "sections/head.php"; 
?>
<body>
<?php 
include("sections/navbar.php"); 
include("sections/menu.php"); 
?>

    <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-md-12">
                      <div class="col-md-6">
                        <h2><span class="glyphicon glyphicon-list"></span>  <?= $title_view  ?></h2>
                      </div>   
                    </div><br><br><br>

                    <div class="col-sm-12"> 
                      <h3><i class="glyphicon glyphicon-cog"></i>  Bitacora de Usuarios</h3>
                      <?php require_once "app/view/sections/tabla-bitacora-usuarios.php"; ?>  
                    </div> 
                     <div class="col-sm-12"> 
                      <h3><i class="glyphicon glyphicon-cog"></i> Bitacora de Trabajos</h3>
                      <?php require_once "app/view/sections/tabla-bitacora-trabajos.php"; ?>  
                    </div> 
                </div>
            </div>
        </div>
        <!-- /contenido -->
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
