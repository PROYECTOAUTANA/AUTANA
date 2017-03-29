<div class="modal fade" id="consultar_usuario">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Consultar Usuario </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body">
                           <form class="form-group" action="consultar-usuario" method="post">
                              <div class="input-group">
                                    <input type="text" name="consulta" autofocus required placeholder="Escribe algo.." class="form-control">
                                  <span class="input-group-btn">
                                    <button class="btn btn-info" name="consultarDocente" type="submit"><i class="glyphicon glyphicon-search"></i>  Consultar</button>
                                    </span>
                                </div>
                          </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <div class="col-sm-12">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Salir</button> 
                              </div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL MIS DATOS-->