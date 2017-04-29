<div class="home col-md-10 col-md-offset-1">
        <div class="col-md-6 col-md-offset-3"> 
          <div class="well login">
            <div class="imagen">
                <img src="src/img/u.png" alt="...">
            </div>
            <h4 class="titulo" align="center">INICIAR SESION</h4> 
            <form class="form-group" method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" id="user"  class="form-control" placeholder="Escriba su usuario..." maxlength="25">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                      <input type="password"  id="password" class="form-control" placeholder="Escriba su contraseña..." minlength="4" maxlength="10">
                    </div>
                  </div>
                  <div class="form-group">
                    <a href="#validar" data-toggle="modal">¿Olvido su Contraseña?</a>
                  </div>
                  <div class="form-group">
                    <input type="button" id="botonloguear" class="btn btn-info btn-block boton" autofocus onclick="log()" value="Entrar">                  
                  </div>  
            </form>
          </div>
        </div>
        <div class="col-sm-12" id="resultados"></div>
  </div>