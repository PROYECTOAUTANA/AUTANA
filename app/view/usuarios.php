<?php 
session_start();
if(!$_SESSION){
    header("location: home");
}elseif($_SESSION['rol'] == 'admin'){ 
$barra = "barra_admin";
}elseif ($_SESSION['rol'] == 'supervisor') {
$barra = "barra_usuario";
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
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                      <div class="col-sm-12 fecha">
                          <p align="right"><strong><span class="glyphicon glyphicon-calendar"></span>   <?php echo date("d")." / ".date("m")." / ".date("Y"); ?></strong></p>
                      </div>
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Gestion de  Usuarios</h1>
                        <hr>
                    </div>
                    <div class="col-md-12 contenido_4">
                       <div class="col-sm-12 btn-group btn-group-justified" >
                          <div class="btn-group">
                            <a href="#nuevo_usuario" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i>  Nuevo Usuario</a>
                          </div>
                          <div class="btn-group">
                            <a href="#consultar_usuario" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-upload"></i>  Consultar Usuario</a>
                          </div>
                          <div class="btn-group">
                            <a href="#" data-toggle="modal" class="btn btn-info"><i class="glyphicon glyphicon-trash"></i>  Busqueda con Filtros</a>
                          </div>
                        </div> <br><br><br> 
                    </div>
                     <div class="contenido_5 col-sm-12">
                      <div class="tabla col-sm-12">
                      <form class="form-group" action="buscar-usuario" method="post">
                              <div class="input-group">
                                    <input type="text" name="filtro" autofocus required placeholder="Escribe algo.." class="form-control">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" name="buscarUsuario" type="submit"><i class="glyphicon glyphicon-search"></i>  Buscar</button>
                                    </span>
                                </div>
                    </form><br>
                    <?php 
                          if (!$db) {
                            if ($controller == "buscar") {
                                  echo "no se encontraron registros para: <strong>".$filtro."</strong>";
                              }else{
                                echo "no se encontraron registros.... :(";
                              }
                          }else{
                          ?>
                            <table border="0" class="table table-bordered table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Cedula</th>
                                      <th align="center" >Nombre</th>
                                      <th align="center" >Apellido</th>
                                      <th align="center" >Categoria</th>
                                      <th align="center" >Departamento</th>
                                      <th align="center" >Rol de Usuario</th>
                                      <th  align="center" colspan="3">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($db as $dato):

                                  //obtenemos datos para mostrar
                                  $cedula = $dato["usuario_cedula"];
                                  $nombre = $dato["usuario_nombre"];
                                  $apellido = $dato["usuario_apellido"];
                                  $categoria = $dato["categoria_nombre"];
                                  $rol = $dato["rol"];
                                  $departamento = $dato["departamento_nombre"];


                                  //obtenemos las pk
                                  
                                  $id_departamento = $dato["id_departamento"];
                                  $id_usuario = $dato["id_usuario"];
                                  $id_categoria = $dato["id_categoria"];
                                  $id_rol = $dato['id_rol'];
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $cedula;?></td>
                                    <td align="center"><?php echo $nombre;?></td>
                                    <td align="center"><?php echo $apellido;?></td>
                                    <td align="center"><?php echo $categoria;?></td>
                                    <td align="center"><?php echo $departamento;?></td>
                                    <td align="center"><?php echo $rol;?></td>
                                    <td align="center">
                                      <a class="btn btn-default" href='eliminar-usuario?id_usuario=<?php echo $id_usuario; ?>&id_categoria=<?php echo $id_categoria; ?>&id_departamento=<?php echo $id_departamento; ?>&id_rol=<?php echo $id_rol; ?>'>Eliminar
                                      </a>
                                    </td>
                                    <td align="center"><a class="btn btn-info" href="modificar-usuario&id=<?php echo $id; ?>">Modificar</a></td>
                                    <td align="center"><a class="btn btn-danger" href="#">Mensaje</a></td>
                                  </tr>
                                <?php 
                                endforeach;
                              }
                                ?>
                                 </tbody>
                            </table>
                    </div> 
                    </div>
                <?php include("sections/minimenu.php"); ?>
                </div>
            </div>
        <!-- /contenido -->
        </div>
<!--*****************************************SOLO MODALS*********************************************************-->
<?php 
include("sections/modal.salir.php"); 
include("sections/modal.datos.php");
include("sections/modal.nuevo.usuario.php");
include("sections/modal.consultar.usuario.php");
?>
<script src="src/js/inputs.js"></script>
<script src="src/js/jquery.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html> 