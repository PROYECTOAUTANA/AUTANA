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
        <!-- /#sidebar-wrapper -->
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="noticias col-sm-12">
                        <div class="col-sm-12 fecha">
                            <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                        </div>
                          <h1><span class="glyphicon glyphicon-th-large"></span>  Detalles del Trabajo</h1>
                        <hr>
                      </div>
                    <div class="noticias col-sm-12">
                    <form action="registrar-usuario" method="post" class="form-group">
                        <div class="form-group col-sm-4">
                          <label for="cedula">Titulo:</label>
                          <input  id="cedula" class="form-control" type="text" value="<?php echo $datos_trabajo["trabajo_titulo"];?>" disabled="disabled" name="cedula" placeholder="Escriba..." autofocus>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="nombre">Fecha de Presentacion Publica:</label>
                          <input  id="nombre" class="form-control" type="text" value="<?php echo $datos_trabajo["fecha_presentacion"];?>" disabled="disabled" name="nombre" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="apellido">proceso:</label>
                          <input  id="apellido" class="form-control" type="text" value="<?php echo $datos_trabajo["proceso"];?>" disabled="disabled" name="apellido" placeholder="Escriba...">
                        </div>
                          <div class="form-group col-sm-3">
                          <label for="edad">Categoria de Ascenso:</label>
                          <input  id="edad" class="form-control" type="text" value="<?php echo $datos_trabajo["categoria_de_ascenso"];?>" disabled="disabled" name="edad" >
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="sexo">Observacion:</label>
                          <input class="form-control" type="text" value="<?php echo $datos_trabajo["trabajo_observacion"];?>" disabled="disabled" disabled="disabled" id="" name="">
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="telefono">Nombre del Autor:</label>
                          <input  id="telefono"  class="form-control" type="text" value="<?php echo $datos_trabajo["usuario_nombre"];?>" disabled="disabled" name="telefono" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="telefono">Fase Actual:</label>
                          <input  id="telefono"  class="form-control" type="text" value="<?php echo $datos_trabajo["fase_nombre"];?>" disabled="disabled" name="telefono" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-12">
                          <a href="editar-usuario?id_usuario=<?php echo $id_usuario; ?>&id_categoria=<?php echo $id_categoria; ?>&id_departamento=<?php echo $id_departamento; ?>&id_rol=<?php echo $id_rol; ?>" class="btn btn-info btn-block" name="#">Editar</a>
                        </div>
                      </form>
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
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 