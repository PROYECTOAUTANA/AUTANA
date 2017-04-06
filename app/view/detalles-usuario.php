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
}

?>
<!DOCTYPE html>
<html>
<head>
 <link rel="shortcut icon" type="image/x-icon" href="src/img/autana_ico.ico" />
  <meta charset="UTF-8">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">-->
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">

</head>
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
                    <div class="noticias col-sm-12">
                        <div class="col-sm-12 fecha">
                            <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                        </div>
                          <h1><span class="glyphicon glyphicon-th-large"></span>  Detalles del usuario <?php echo $datos_usuario["usuario_nombre"]; ?></h1>
                        <hr>
                      </div>
                    <div class="noticias col-sm-12">
                    <form action="registrar-usuario" method="post" class="form-group">
                        <div class="form-group col-sm-4">
                          <label for="cedula">Cedula:</label>
                          <input  id="cedula" class="form-control" type="text" value="<?php echo $datos_usuario["usuario_cedula"];?>" disabled="disabled" name="cedula" placeholder="Escriba..." autofocus>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="nombre">Nombre:</label>
                          <input  id="nombre" class="form-control" type="text" value="<?php echo $datos_usuario["usuario_nombre"];?>" disabled="disabled" name="nombre" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="apellido">Apellido:</label>
                          <input  id="apellido" class="form-control" type="text" value="<?php echo $datos_usuario["usuario_apellido"];?>" disabled="disabled" name="apellido" placeholder="Escriba...">
                        </div>
                          <div class="form-group col-sm-3">
                          <label for="edad">Categoria:</label>
                          <input  id="edad" class="form-control" type="text" value="<?php echo $datos_usuario["categoria_nombre"];?>" disabled="disabled" name="edad" >
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="sexo">Rol:</label>
                          <input class="form-control" type="text" value="<?php echo $datos_usuario["rol"];?>" disabled="disabled" disabled="disabled" id="" name="">
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="telefono">Departamento:</label>
                          <input  id="telefono"  class="form-control" type="text" value="<?php echo $datos_usuario["departamento_nombre"];?>" disabled="disabled" name="telefono" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="telefono">Numero de Trabajos:</label>
                          <input  id="telefono"  class="form-control" type="text" value="<?php echo $n_trabajos;?>" disabled="disabled" name="telefono" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-12">
                          <a href="editar-usuario?id_usuario=<?php echo $id_usuario; ?>&id_categoria=<?php echo $id_categoria; ?>&id_departamento=<?php echo $id_departamento; ?>&id_rol=<?php echo $id_rol; ?>" class="btn btn-info btn-block" name="#">Editar</a>
                        </div>
                      </form>
                    </div>
                </div>
                <?php include("sections/minimenu.php"); ?>
              </div>
            </div>
        <!-- /contenido -->
    </div>
    <!-- /#principal -->
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/modal.php"); 
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 