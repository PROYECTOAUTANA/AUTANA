<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>:::  <?php echo $titulo_de_la_vista; ?> :::</title>
<link rel="stylesheet" href="src/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="src/css/estilo.css">
<link rel="stylesheet" type="text/css" href="src/css/alert.css">

<link rel="stylesheet" href="src/css/font-awesome.min.css">
<script src="src/js/jquery.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/jquery-ui.js"></script>
<script src="src/js/validar.js"></script>
<script src="src/js/alert_personalizado.js"></script>
</head>
<body>
<header class="banner">
    <div class="barra_2">
      <div class="logo">
        <a href="?controller=front&action=home"><img src="src/img/lautana1.jpg" alt="..."></a>
      </div>   
      <nav>
        <a href="#">Ayuda</a>
      </nav>
    </div>
</header>
<div class="social">
    <ul>
      <li class="boton2">
        <a href="https://twitter.com/uptdelara" target="_blank" class="twitter"><i class="fa fa-twitter-square"></i></a>
      </li>
      <li class="boton4">
        <a href="http://www.uptaeb.edu.ve/site/" target="_blank" class="website"><i class="fa fa-globe" aria-hidden="true"></i></a>
      </li>
      <li class="boton1">
        <a href="https://www.facebook.com/uptdelara" target="_blank" class="facebook"><i class="fa fa-facebook-square"></i></a>
      </li>
      <li class="boton3">
        <a href="https://www.instagram.com/uptdelara/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
      </li>
      
      <li class="boton5">
        <a href="http://www.github.com/PROYECTOAUTANA/" target="_blank" class="github"><i class="fa fa-github"></i></a>
      </li>
    </ul>
  </div>  



<div class="home col-md-10 col-md-offset-1">
        <div class="col-md-6 col-md-offset-3"> 
          <div class="well login">
            <div class="imagen">
                <img src="src/img/u.png" alt="...">
            </div>
            <h4 class="titulo" align="center">INICIAR SESION</h4> 
            <form class="form-group" action="?controller=usuario&action=login" method="post" data-toggle="validator">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" name="nombre" data-error="Introduzca su nombre de Usuario." class="form-control" placeholder="Escriba su usuario..." maxlength="25" required />   
                    </div> 
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                      <input type="password"  name="clave" class="form-control" data-error="Introduzca su contraseña." placeholder="Escriba su contraseña..." minlength="4" maxlength="10" required>
                    </div>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <a href="#validar" data-toggle="modal">¿Olvido su Contraseña?</a>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block" value="Entrar" name="botonloguear" autofocus>
                  </div>  
            </form>
          </div>
        </div>
        <div class="col-sm-12" id="resultados"></div>
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



<!--********************* VENTANAS MODALES ...  ******************-->


<!--********************  validar correo  ****************-->


                  <div class="modal fade" id="validar">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Reestablecer contraseña</h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <div class="imagen">
                <img src="src/img/passw.png" alt="...">
            </div>
            <h4 align="center" class="titulo"> Fase 1: Autenticacion</h4>
             
          <form class="form-group col-sm-12" method="post" data-toggle="validator">
              <div class="input-group col-sm-12">
                  <span class="input-group-addon" id="basic-addon1">@</span>
                  <input type="email"  class="form-control" autofocus placeholder="Escriba su correo..." maxlength="25" required>


                <div class="input-group-btn">
                  <button type="submit" class="btn btn-info boton" ><span class="glyphicon glyphicon-ok"></span>   Enviar</button>
                </div>
              </div>
              <div class="help-block with-errors"></div>
          </form>
                        </div>

                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        <div class="col-sm-12" id="result"></div> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL validar correo-->

<!--******************************************************************-->


<!--******************************************************************-->

