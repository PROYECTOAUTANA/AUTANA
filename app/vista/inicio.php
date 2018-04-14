<?php if (!$_SESSION) header("location: ?controller=front&action=home");?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>:::  <?php echo $titulo_de_la_vista; ?> :::</title>
<!-- ******  ARCHIVO DONDE ESTAN TODOS LOS LLAMADOS A JAVASCRIPT Y CSS -->
<?php require_once "secciones/scripts.php"; ?>
<!--***********************************************************************-->


</head>
<body>
<?php 
include("secciones/navbar.php"); 
include("secciones/menu.php"); 
?>
        <!-- /#sidebar-wrapper -->
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h3><span class="glyphicon glyphicon-th-large"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="carrusell" style=" box-shadow: 0px 0px 30px 0 rgb(14, 12, 12);">
                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner" role="listbox">
                            <div class="item active">
                              <img width="100%" height="100px" class="first-slide" src="src/img/BANNER.jpg" alt="First slide">
                              <div class="container">
                                <div class="carousel-caption">

                                  <!-- ********** CONTENIDO *************-->
                                </div>
                              </div>
                            </div>
                            <div class="item">
                            <img width="100%" height="100px" class="first-slide" src="src/img/carru2.jpg" alt="Second slide">
                              <div class="container">
                                <div class="carousel-caption">

                                  <!-- ********** CONTENIDO *************-->
                                </div>
                              </div>
                            </div>
                            <div class="item">
                            <img width="100%" height="100px" class="first-slide" src="src/img/papu.jpg" alt="Third slide">
                              <div class="container">
                                <div class="carousel-caption">

                                  <!-- ********** CONTENIDO *************-->
                                </div>
                              </div>
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
                    </div>
                        <!-- /.carousel -->  
                    </div>
           </div>
          </div>
    </div>
        <!-- /contenido -->
    <!-- /#principal -->
<div class="contenido_2">
    <ul id="minimenu">
      <li>
        <a href="#boton" class="ocultar" id="boton"><span class="glyphicon glyphicon-chevron-left"></span></a>
      </li>
    </ul> 
</div>
<script src="src/js/boton.js"></script>
</body>
</html> 

<!--********************* VENTANAS MODALES ...  ******************-->

<!--******************************************************************-->