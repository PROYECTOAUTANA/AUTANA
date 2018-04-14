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
<style type="text/css">
     
  .error{
        margin-top: 100px; 
  }
  .e404{
        padding: 10px 15px 80px 20px;
    text-align: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
   </style>
<header class="banner">
    <div class="barra_2">
      <div class="logo">
        <a href="?controller=front&action=home"><img src="src/img/lautana1.jpg" alt="..."></a>
      </div>   
      <nav>
        <a href="#">Acerca de</a>
      </nav>
    </div>
</header>

<div class="error col-sm-12">
	<div class="e404 col-sm-8 col-md-offset-2 well ">
    <h3 style="font-size:50px;"><strong>404 Error: </strong></h3><br>
    <h4 style="font-size:30px;"><strong>Pagina no disponible</strong></h4><br>
    <p>Lo sentimos, la pagina solicitada no existe o no se encuentra disponible</p>
    <a class="btn btn-primary" href="?controller=front&action=home">Pagina de Inicio</a>
	</div>
</div>

<footer>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-12">
        <p>Sistema Automatizado de Gestion de Trabajos de Ascenso</p>
    </div>
    <div class="col-sm-12">
        <p>Universidad Politecnica Territorial Andres Eloy Blanco</p>
    </div>
     <div class="col-sm-12">
        <p>&copy Autana 2017</p>
    </div>
    </div>
</footer>
</body>
</html>



<!--******************************************************************-->