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
                        <div class="modal-body">
                            <div class="imagen">
                <img src="src/img/passw.png" alt="...">
            </div>
            <h4 align="center" class="titulo"> Fase 1: Autenticacion</h4>
             
            <form class="form-group" method="post" action="?controller=usuario&action=verifica_email">
                <div class="input-group">
                <input type="text" name="email" class="form-control" autofocus placeholder="Escriba su correo..." maxlength="25">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-info btn-block boton">
                        <span class="glyphicon glyphicon-ok"></span>   
                        Enviar
                      </button>
                </div>
            </div>
            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Salir</button> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL MIS DATOS-->
