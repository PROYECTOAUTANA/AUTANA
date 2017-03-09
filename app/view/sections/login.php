<div class="home col-sm-10 col-sm-offset-1">
        <div class="col-sm-6 col-sm-offset-3"> 
          <div class="well login">
            <div class="imagen">
                <img src="src/img/u.png" alt="...">
            </div>
            <h4 class="titulo" align="center">INICIAR SESION</h4> 
            <form class="form-group" method="post" action="index.php?controller=usuario&action=validarSesion">
                  <div class="form-group">
                    <input type="text" name="usuario" class="form-control" autofocus placeholder="Escriba su usuario..." maxlength="25">
                  </div>
                  <div class="form-group">
                    <input type="password"  name="password" class="form-control" placeholder="Escriba su contraseña..." minlength="4" maxlength="10">
                  </div>
                  <div class="form-group">
                    <a href="?controller=index&action=resetClave">¿Olvido su Contraseña?</a>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block boton">
                        <span class="glyphicon glyphicon-ok"></span>   
                        ENTRAR
                      </button>
                  </div>  
            </form>
          </div>
        </div>
  </div>