<?php 
session_start();
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
                        <h1><span class="glyphicon glyphicon-th-large"></span>  <?= $title_view ?></h1>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <?php include("sections/carrusell.php"); ?>
                    </div>
                    <div class="col-sm-12">
                         <h1><span class="glyphicon glyphicon-th-large"></span>  Noticias (0)</h1>
                        <hr>
                        <div class="panel panel-default">
                          <div class="panel-heading">Ultimas Noticias (0)</div>
                          <div class="panel-body">
                            <form class="form-group">
                                <div class="form-group col-sm-12">
                                    <textarea name="noticia" id="noticia" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group-btn col-sm-12">
                                    <button class="btn btn-info" onclick="noticia();" name="enviarnoticia" type="button"><i class="glyphicon glyphicon-picture"></i> Agregar Imagen </button>
                                    <button class="btn btn-default" onclick="noticia();" name="enviarnoticia" type="button"><i class="glyphicon glyphicon-share-alt"></i> Publicar </button>

                                </div>
                            </form><br>
                          </div>
                         </div>
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