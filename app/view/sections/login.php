<div class="home col-sm-10 col-sm-offset-1">
        <div class="col-sm-6 col-sm-offset-3"> 
          <div class="well login">
            <div class="imagen">
                <img src="src/img/u.png" alt="...">
            </div>
            <h4 class="titulo" align="center">INICIAR SESION</h4> 
            <form class="form-group" method="post">
                  <div class="form-group">
                    <input type="text" id="user"  class="form-control" placeholder="Escriba su usuario..." maxlength="25">
                  </div>
                  <div class="form-group">
                    <input type="password"  id="password" class="form-control" placeholder="Escriba su contraseña..." minlength="4" maxlength="10">
                  </div>
                  <div class="form-group">
                    <a href="#validar" data-toggle="modal">¿Olvido su Contraseña?</a>
                  </div>
                  <div class="form-group">
                      <button type="button" class="btn btn-info btn-block boton" onclick="log()">
                        <span class="glyphicon glyphicon-ok" ></span>   
                        ENTRAR
                      </button>
                  </div>  
            </form>
          </div>
        </div>
        <div class="col-sm-12" id="resultados"></div>
  </div>