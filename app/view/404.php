<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
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
</head>
<body>
<?php 
include("sections/cargando.php"); 
include("sections/banner.php"); 
?>
<div class="error col-sm-12">
	<div class="e404 col-sm-8 col-md-offset-2 well ">
    <h3 style="font-size:50px;"><strong>404 Error: </strong></h3><br>
    <h4 style="font-size:30px;"><strong>Pagina no disponible</strong></h4><br>
    <p>Lo sentimos, la pagina solicitada no existe o no se encuentra disponible</p>
    <a class="btn btn-primary" href="index.php">Pagina de Inicio</a>
	</div>
</div>
<?php include("sections/footer.php");?>
<script src="src/js/jquery.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/boton.js"></script>
</body>
</html>