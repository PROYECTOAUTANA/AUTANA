<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}

if($_SESSION['rol'] == 'administrador'){ 
    $barra = "barra_admin";
    $titulo = "Administrador";
}elseif ($_SESSION['rol'] == 'supervisor') {
    $barra = "barra_usuario";
    $titulo = "Supervisor";
}else{

    header("location: ?controller=front&action=home");
}

?>
<!DOCTYPE html>
<html>
<head>

 <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">-->
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
   <script src="src/js/fecha_y_hora.js"></script>
</head>
<body onload="javascript:hora()">
<?php 
include("sections/cargando.php"); 
include("sections/navbar.php"); 
include("sections/$barra.php"); 
?>
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-md-12">
                      <div class="col-md-6 trabajos">
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Gestion de  Trabajos</h1>
                      </div>
                       <div class="col-md-6 col-xs-12 btn-group btn-group grupobotones">
                        <div class="col-xs-3">
                            <a href="#nuevo_trabajo" data-toggle="modal" class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="?controller=front&action=trabajos" class="btn btn-info btn-block"><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="?controller=reportes&action=trabajos_pdf"  class="btn btn-danger btn-block"><i class="glyphicon glyphicon-print"></i> PDF</a>
                        </div>
                        <div class="col-xs-3">
                            <a href="?controller=reportes&action=trabajos_excel"  class="btn btn-success btn-block"><i class="glyphicon glyphicon-print"></i> Excel</a>
                        </div>
                      </div>
                    </div><br><br><br>
                     <div class="contenido_5 col-md-12">
                        <form>
                                <div class="form-group">
                                      <input type="text" name="filtro" id= "bus" autofocus onkeyup="buscar2();" autocomplete="off" required placeholder="Escribe algo.." class="form-control">
                                </div>
                          </form>
                        </div>
                      <div class="col-sm-12 tablas">
                        <div class="trabajos_paginados"></div>    
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
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 

 <script>
  $(document).ready(function(){
    load(1);
  });

  function load(page){
    var parametros = {"accion":"ajax","page":page};
    $.ajax({
      url:'?controller=paginador&action=paginar_trabajos',
      data: parametros,
      success:function(data){
        $(".trabajos_paginados").html(data).fadeIn('slow');
      }
    })
  }
</script>