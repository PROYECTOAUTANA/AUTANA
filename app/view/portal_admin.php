<?php 
session_start();
if(!$_SESSION){
    header("location: index.php");
} ?>
<!DOCTYPE html>
<html>
<head>
 <link rel="shortcut icon" type="image/x-icon" href="src/img/autana_ico.ico" />
  <meta charset="UTF-8">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
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
            <a  href="index.html" class="navbar-brand "><span class="glyphicon glyphicon-education"></span>  A U T A N A</a>
        </div>
        <div class="collapse navbar-collapse" id="navegacion-fm">
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
<section class="principal">
    <div class="col-md-12 contenedor">
      <div class="col-md-2 barra">
        <div class="menu">
            <ul>
              <li><img src="src/img/autana02.png" class="img-thumbnail uptaeb" width="100%"></li>
              <li><a href="#"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo Trabajo</a></li>
              <li class="boton_desplegable"><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Consultar Trabajos</a>
                  <div class="submenu">
                    <a href="#">Listar Todos</a>
                    <a href="#">Modificar Trabajo</a>
                    <a href="#">Estatus de Trabajos</a>
                  </div>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Eliminar Trabajo</a></li>
              <li class="boton_desplegable"><a href="#"><span class="glyphicon glyphicon-list"></span> Generar Reporte</a>
                <div class="submenu">
                  <a href="#">Constancia Tutor</a>
                  <a href="#">Constancia Jurado Simple</a>
                  <a href="#">Constancia Jurado Coordinador</a>
                  <a href="#">Constancia Autor</a>
                </div>
              </li>
              <li class="boton_desplegable"><a href="#"><span class="glyphicon glyphicon-check"></span> Consultar Docente</a>
                <div class="submenu">
                    <a href="#">Modificar Datos</a>
                    <a href="#">Listar Todos los Docentes</a>
                    <a href="#">Categorias Docentes</a>
                </div>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-education"></span> Autores de trabajos</a></li>
              <li class="boton_desplegable"><a href="#"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a>
                <div class="submenu">
                    <a href="#">Nuevo Administrador</a>
                    <a href="#">Nuevo Supervisor</a>
                    <a href="#">Nuevo Usuario Externo</a>
                </div>
              </li>
              <li class="boton_desplegable"><a href="#"><span class="glyphicon glyphicon-user"></span> Consultar Usuario</a>
                <div class="submenu">
                    <a href="#">Listar Todos</a>
                    <a href="#">Modificar datos</a>
                    <a href="#">Cambiar contraseña de un usuario</a>
                    <a href="#">Eliminar Cuenta de Usuario</a>
                </div>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Habilitar / Deshabilitar Usuario</a></li>
              <li class="boton_desplegable"><a href="#"><span class="glyphicon glyphicon-wrench"></span> Mantenimiento</a>
                <div class="submenu">
                    <a href="#">Recuperar Contraseña de Usuarios</a>
                    <a href="#">Copias de Seguridad</a>
                    <a href="#">Restaurar Base de Datos</a>
                </div>
              </li>
               <li><a href="#ventana1" data-toggle="modal"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
            </ul>
        </div>
      </div>
      <div class="col-md-10 panel">
        <div class="titulo">
              <div class="fecha">
                <p><strong>
                  <span class="glyphicon glyphicon-calendar"></span>   
                  <?php echo date("d")." / ".date("m")." / ".date("Y"); ?>
                </strong></p>
              </div>
              <div class="page-header">
                  <h3 align="rigth"><span class="glyphicon glyphicon-th-large"></span>  Bienvenido Administrador</h3>
              </div>
        </div>  
        <div class="col-md-12 operaciones">
            <div class="col-md-4">
                <a href="#">
                    <div class="polaroid polaroid-1">
                      <div class="icono">
                        <span class="glyphicon glyphicon-th-list"></span>
                      </div>
                      <div class="texto">
                        <h4>OPCION</h4>
                      </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="polaroid polaroid-2">
                      <div class="icono">
                        <span class="glyphicon glyphicon-refresh"></span>
                      </div>
                      <div class="texto">
                        <h4>OPCION</h4>
                      </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="polaroid polaroid-3">
                      <div class="icono">
                        <span class="glyphicon glyphicon-trash"></span>
                      </div>
                      <div class="texto">
                        <h4>OPCION</h4>
                      </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class=" polaroid polaroid-4">
                      <div class="icono">
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </div>
                      <div class="texto">
                        <h4>OPCION</h4>
                      </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class=" polaroid polaroid-5">
                      <div class="icono">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </div>
                      <div class="texto">
                        <h4>OPCION</h4>
                      </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <div class=" polaroid polaroid-6">
                  <div class="icono">
                        <span class="glyphicon glyphicon-off"></span>
                    </div>
                    <div class="texto">
                      <h4>OPCION</h4>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-md-12 usuarios">
          <div class="page-header">
            <h3 align="left"> <span class="glyphicon glyphicon-user"></span> En linea </h3>
          </div>
          <div class="col-md-12 usuario">
            <div class="alert alert-default alert-dismissible fade in" role="alert"> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button> 
               <a href="#" style="text-decoration:none;"><img src="src/img/nuevo.jpg" style="width:46px;height:46px; border-radius:46px;">  Juan1234</a>
            </div>
          </div>

          <div class="col-md-12 usuario">
            <div class="alert alert-default alert-dismissible fade in" role="alert"> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button> 
               <a href="#" style="text-decoration:none;"><img src="src/img/nuevo.jpg" style="width:46px;height:46px; border-radius:46px;">  Juan1234</a>
            </div>
          </div>

      </div>    
    </div>
</section>
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
<script src="src/js/ajax.js"></script>
</body>
</html> 