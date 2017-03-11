 <div class="modal fade" id="ventana4">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h5><b>Escriba el numero de Cedula:</b></h5>
                        </div>
                        <div class="modal-body"> 
                         <div class="col-md-12">
                          <form class="form-group" action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="cedula" id="cedula" autofocus required placeholder="Escribe un numero de cedula.." class="form-control">
                            <span class="input-group-btn">
                              <button class="btn btn-default" name="consultar" type="submit"><i class="glyphicon glyphicon-user"></i>  Consultar</button>
                            </span>
                            </div>
                          </form>
                        </div>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                          <p align="left">Nota: El docente debe estar registrado en el sistema, si no esta registrado <a href="?controller=index&action=nuevoDocente">click aqui</a></p>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 