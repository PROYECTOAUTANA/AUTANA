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
<header class="banner">
    <div class="barra_2">
      <div class="logo">
        <a href="index.php"><img src="src/img/lautana.png" alt="..."></a>
      </div>   
      <nav>
        <a href="#">Acerca de</a>
      </nav>
    </div>
</header>

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
<script src="src/js/jquery.js"></script>
<script src="src/js/bootstrap.min.js"></script>
</body>
</html>
