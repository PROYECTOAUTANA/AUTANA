<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/autana_ico.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>:::  SISTEMA DE USUARIOS  :::</title>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="src/css/estilo.css">
</head>
<body>
<?php include("sections/header.php"); ?>

<div class="home col-md-10 col-md-offset-1">
        <div class="col-md-6 col-md-offset-3"> 
          <div class="well login">
            <div class="imagen">
                <img src="src/img/passw.png" alt="...">
            </div>
            <h3 align="center" class="titulo"> Reestablecer contraseña</h3>
            <h4 align="center" class="titulo"> Fase 1: Autenticacion</h4>
             
            <form class="form-group" method="post" action="?controller=usuario&action=verificaEmail">
                  <div class="form-group">
                    <input type="text" name="email" class="form-control" autofocus placeholder="Escriba su correo..." maxlength="25">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block boton">
                        <span class="glyphicon glyphicon-ok"></span>   
                        Enviar
                      </button>
                  </div>  
            </form>
          </div>
        </div>
  </div>
  <?php include("sections/footer.php"); ?>
<script src="src/js/jquery.js"></script>
<script src="src/js/bootstrap.min.js"></script>
</body>
</html>
