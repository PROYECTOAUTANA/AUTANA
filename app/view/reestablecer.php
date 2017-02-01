<?php 
session_start();
$id = $_SESSION['id'];
//$nombre = $_SESSION['nombre'];
if(!$_SESSION){
    header("location: index.php");
} ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/autana_ico.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
   <link rel="stylesheet" type="text/css" href="src/css/carrousel.css">
</head>
<body>
<header>
  <div class="container menu1">
      <nav class="navbar navbar-inverse" role="navigation">
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
          <!-- Inicia Menu -->
          <div class="collapse navbar-collapse" id="navegacion-fm">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="#" class="nav-link">Acerca de</a>
                </li>
            </ul> 
          </div>
        </div>
      </nav>
      <section class="jumbotron">
          <div class="banner">
  <!-- Carousel==================== -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img class="first-slide" src="src/img/nuevo.jpg" width="100%" alt="First slide">
                </div>
                <div class="item">
                  <img class="second-slide" src="src/img/banderas.png" width="100%" alt="Second slide">
                </div>
                <div class="item">
                  <img class="third-slide" src="src/img/autana.jpg" width="100%" alt="Third slide">
                </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
    <!-- /.carousel -->  
          </div>
      </section>
  </div>
</header>
<div class="articulo col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3 class="titulo" align="center"><span class="glyphicon glyphicon-education"></span>   A U T A N A</h3>
        </div>
        <div class="col-md-6 col-md-offset-3"> 
          <div class="well login">
            <div class="imagen">
                <img src="src/img/birrete.svg" alt="...">
            </div>
            <h3 align="center" class="titulo"> Reestablecer contraseña</h3>
            <h5 align="center" class="titulo"> Fase 2: Cambio de Contraseña</h5>
             
            <form class="form-group" method="post" action="?controller=usuario&action=cambioClave&id=<?php echo $id; ?>">
                  <div class="form-group">
                    <input type="text" name="pass" class="form-control" autofocus placeholder="Escriba su nueva Contraseña..." maxlength="25">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block">
                        <span class="glyphicon glyphicon-ok"></span>   
                        Enviar
                      </button>
                  </div>  
            </form>
          </div>
        </div>
  </div><!--articulo-->
<!--**************************************************SOLO VENTANAS MODALES**********************************************************-->

<!--**************************************************SOLO VENTANAS MODALES**********************************************************-->
<script src="src/js/jquery.js"></script>
<script src="src/js/ajax.js"></script>
<script src="src/js/bootstrap.min.js"></script>
</body>
</html>