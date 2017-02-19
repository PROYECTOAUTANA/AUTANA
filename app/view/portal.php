<?php 
session_start();
if(!$_SESSION){
    header("location: index.php");
}elseif ($_SESSION['tipo'] != 2) {
  header("location: index.php");
}else{ ?>
<!DOCTYPE html>
<html>
<head>
 <link rel="shortcut icon" type="image/x-icon" href="src/img/autana_ico.ico" />
  <meta charset="UTF-8">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
</head>
<body >
<header>
  <div class="container">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
              <span class="sr-only">Desplegar / Ocultar Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="?controller=usuario&action=cerrarSesion" class="navbar-brand ">A U T A N A</a>
        </div>
        <div class="collapse navbar-collapse" id="navegacion-fm">
          <ul class="nav navbar-nav navbar-left">
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="glyphicon glyphicon-asterisk"></span> Nuevo Trabajo</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="glyphicon glyphicon-globe"></span> WebSite</a>
                </li>
          </ul> 
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown nav-item active">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" >
                <span class="glyphicon glyphicon-user"/> <?php echo $_SESSION['user']; ?></a>
              <ul class="dropdown-menu" role="menu">
                <li>          
                    <img src="src/img/usu1.png"  width="100%" height="150">
                </li>
                <li >
                    <a href="#ventana2" data-toggle="modal">Ver Mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">Modificar Datos</a>
                </li>
                <li>
                    <a href="#">Cambiar contraseña</a>
                </li>
                <li>
                    <a href="#">Cambiar Foto de Perfil</a>
                </li>
                <li>
                    <a href="#ventana1" data-toggle="modal">Cerrar</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
<div id="principal">
        <!-- Sidebar -->
        <div id="barra">
            <ul class="menu">
                <li class="logotipo">
                     <img src="src/img/lautana.png"  alt="...">
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-home"></span> Inicio</a></a>
                </li>
                <li class="boton_desplegable">
                    <a href="#"><span class="glyphicon glyphicon-th-list"></span> Gestionar Trabajos</a>
                    <div class="submenu">
                      <a href="#">Nuevo Trabajo</a>
                      <a href="#">Listar Todos</a>
                    </div>
                </li>
                <li class="boton_desplegable">
                    <a href="#"><span class="glyphicon glyphicon-education"></span> Gestionar Docentes</a>
                    <div class="submenu">
                      <a href="#">Listar Todos</a>
                      <a href="#">Ver por Categoria</a>
                    </div>
                </li>
                <li class="boton_desplegable">
                    <a href="#"><span class="glyphicon glyphicon-list"></span> Reportes</a>
                    <div class="submenu">
                      <a href="#">Reporte por correo</a>
                      <a href="#">Constancias</a>
                    </div>
                </li>
                <li class="boton_salir">
                    <a href="#ventana1" data-toggle="modal"><span class="glyphicon glyphicon-off"></span> Salir</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="contenido_1 col-sm-12">
                        <h1><span class="glyphicon glyphicon-th-large"></span>  Bienvenido Supervisor</h1>
                        <hr>
                    </div>
                    <div class="tabla col-md-12">
                       <table border="0" class="table table-bordered table-hover" align="center">
                        <thead>
                            <tr>
                                <th style="text-align:center;">#</th>
                                <th style="text-align:center;">Nombre</th>
                                <th style="text-align:center;">Apellido</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;" colspan="3">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>juancho</td>
                                <td>perez</td>
                                <td>juaneliezer13@gmail.com</td>
                                <td><a class="btn btn-default btn-lg btn-block" href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a class="btn btn-danger btn-lg btn-block" href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                             <tr>
                                <td>2</td>
                                <td>juancho</td>
                                <td>perez</td>
                                <td>juaneliezer13@gmail.com</td>
                                <td><a class="btn btn-default btn-lg btn-block" href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a class="btn btn-danger btn-lg btn-block" href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>juancho</td>
                                <td>perez</td>
                                <td>juaneliezer13@gmail.com</td>
                                <td><a class="btn btn-default btn-lg btn-block" href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a class="btn btn-danger btn-lg btn-block" href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>juancho</td>
                                <td>perez</td>
                                <td>juaneliezer13@gmail.com</td>
                                <td><a class="btn btn-default btn-lg btn-block" href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a class="btn btn-danger btn-lg btn-block" href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                  </div>

                </div>
                <div class="contenido_2">
                  <ul id="minimenu">
                    <li>
                      <a href="#boton" class="ocultar" id="boton"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
                    </li>
                    <li>
                      <a href="#" class="trabajos"><span class="glyphicon glyphicon-list-alt"></span></a>
                    </li>
                    <li>
                      <a href="#" class="docentes"><span class="glyphicon glyphicon-user"></span></a>
                    </li>
                    <li>
                      <a href="#" class="reportes"><span class="glyphicon glyphicon-envelope"></span></a>
                    </li>
                  </ul> 
                </div>
            </div>
        </div>
        <!-- /contenido -->

    </div>
    <!-- /#principal -->
<!--*****************************************SOLO MODALS*********************************************************-->
<!--COMENZO EL DIV DONDE ESTARA EL MODAL CERRAR SESION-->
                  <div class="modal fade" id="ventana1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3><i>¿Seguro que desea cerrar sesion?</i></h3>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=usuario&action=cerrarSesion" class="btn btn-info">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 
                  <!--TERMINO EL DIV DEL MODAL CERRAR SESION-->
                  <!--COMENZO EL DIV DONDE ESTARA EL MODAL MIS DATOS-->
                  <div class="modal fade" id="ventana2">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 class="modal-title"><i>Mis Datos</i></h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body">
                            <div class="text-center">
                              <img src="src/img/usu1.png" alt="..." class="img-rounded" width="20%">
                            </div>
                            <h5>Nombre:  <?php echo $_SESSION['nombre']; ?></h5>
                            <h5>Cedula:  <?php echo $_SESSION['cedula']; ?></h5>
                            <h5>Correo:  <?php echo $_SESSION['correo']; ?></h5>
                            <h5>Usuario:  <?php echo $_SESSION['user']; ?></h5>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                                <a href="#" class="btn btn-success">Modificar</a>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL MIS DATOS-->
<script src="src/js/jquery.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script>
    $("#boton").click(function(e) {
        $("#principal").toggleClass("cambiado");
    });
    </script>
</body>
</html> 

<?php 
}
?>