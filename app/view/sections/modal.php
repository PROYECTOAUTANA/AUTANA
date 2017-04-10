<!--nuevo usuario-->
<div class="modal fade" id="nuevo_usuario">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Registrar Usuario </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=usuario&action=registrar_usuario" method="post" class="form-group">
                        <div class="form-group col-sm-4">
                          <label for="cedula">Cedula:</label>
                          <input  id="cedula" class="form-control" type="text" name="cedula" placeholder="Escriba..." autofocus>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="nombre">Nombre:</label>
                          <input  id="nombre" class="form-control" type="text" name="nombre" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="apellido">Apellido:</label>
                          <input  id="apellido" class="form-control" type="text" name="apellido" placeholder="Escriba...">
                        </div>
                          <div class="form-group col-sm-3">
                          <label for="edad">Edad:</label>
                          <input  id="edad" class="form-control" type="number" name="edad" >
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="sexo">Sexo:</label>
                          <select class="form-control" size="1" id="sexo" name="sexo">
                          <option value='0'>selecciona</option>
                            <option value="1">F</option>
                            <option value="2">M</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="telefono">Telefono:</label>
                          <input  id="telefono"  class="form-control" type="text" name="telefono" placeholder="Escriba...">
                        </div>
                         <div class="form-group col-sm-3">
                          <label for="correo">Correo:</label>
                          <input  id="correo"  class="form-control" type="mail" name="correo" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="direccion">Direccion:</label>
                          <textarea name="direccion" id="direccion" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="tipo">Tipo de Usuario:</label>
                          <select onchange="habilitar(this.value);" size="1" name="tipo" id="tipo" class="form-control">
                          <option value='0'>selecciona</option>
                            <option value="1">Usuario Administrador</option>
                            <option value="2">Usuario Supervisor</option>
                            <option value="3">Usuario Docente</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="departamento">Departamento:</label>
                          <select name="departamento" id="departamento" class="form-control">
                          <option value='0'>selecciona</option>
                            <option value="informatica">Informatica</option>
                            <option value="administracion">Administracion</option>
                            <option value="contaduria">Contaduria</option>
                            <option value="agroalimentacion">Agroalimentacion</option>
                            <option value="ciencias de la informacion">Ciencias de la Informacion</option>
                            <option value="higiene y seguridad laboral">Higiene y Seguridad Laboral</option>
                            <option value="sistemas de calidad y ambiente">Sistemas de Calidad y Ambiente</option>
                            <option value="turismo">Turismo</option>
                            <option value="deporte">Deporte</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="categoria_actual">Categoria Actual:</label>
                          <select name="categoria_actual" id="categoria_actual" class="form-control">
                          <option value='0'>selecciona</option>
                            <option value="titular">Titular</option>
                            <option value="agregado">Agregado</option>
                            <option value="asociado">Asociado</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="observacion">Observacion:</label>
                          <textarea name="observacion" id="observacion" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="usuario">Usuario:</label>
                          <input  id="usuario"  class="form-control" type="text" name="usuario" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="clave">Contraseña:</label>
                          <input  id="clave"  class="form-control" type="password" name="clave" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="rclave">Confirmar Contraseña:</label>
                          <input  id="rclave"  class="form-control" type="password" name="rclave" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-12">
                          <button type="submit" class="btn btn-info btn-block" name="registrar_usuario"><i class="glyphicon glyphicon-ok"></i>  Enviar</button>
                        </div>
                      </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL nuevo usuario-->
                  
<!--******************************************************************-->



<!--********************* cerrar sesion ******************-->


                   <div class="modal fade" id="ventana1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea cerrar sesion?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=usuario&action=cerrar_sesion" class="btn btn-info">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->


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
             
            <form class="form-group" method="post">
                <div class="input-group">
                <input type="text" id="email" class="form-control" autofocus placeholder="Escriba su correo..." maxlength="25">
              <div class="input-group-btn">
                <button type="button" class="btn btn-info btn-block boton" onclick="validar()">
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
                        <div class="col-sm-12" id="result"></div> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL validar correo-->

<!--******************************************************************-->
<!--***********************  nuevo trabajo  **********************-->



<div class="modal fade" id="nuevo_trabajo">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center"> Nuevo Trabajo </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                      <div class="modal-body col-sm-12">
                        <form method="post" class="form-group">
                              <div class="form-group col-sm-4">
                              <label for="titulo">Titulo:</label>
                              <input class="form-control" type="text" id="titulo" placeholder="Escriba..." >
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="proceso">Proceso:</label>
                              <select id="proceso" size="1" class="form-control">
                                <option>Seleccione</option>
                                <option value="regular">Regular</option>
                                <option value="extraordinario">Extraordinario</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="fecha_pp">Fecha de Presentacion Publica:</label>
                              <input type="text" id="fecha_pp" class="form-control" placeholder="DD/MM/AAAA" />
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="">Linea de Investigacion:</label>

                             <textarea id="linea" class="form-control" rows="3"></textarea>
                            </div>
                             <div class="form-group col-sm-6">
                             <label for="categoria_ascenso">Categoria de Ascenso</label>
                               <select onchange="habilitar(this.value);" size="1" id="categoria_ascenso" class="form-control">
                              <option>seleccione</option>
                                <option value="titular">Titular</option>
                                <option value="agregado">Agregado</option>
                                <option value="asociado">Asociado</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="">Fase:</label>
                              <select id="fase" size="1" class="form-control">
                                <option>Seleccione</option>
                                <option value="recepcion">Recepcion</option>
                                <option value="seguimiento">Seguimiento</option>
                                <option value="aprobacion">Aprobacion</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="">Observacion:</label>
                              <textarea id="observacion" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group col-sm-12">
                              <input type="button" class="btn btn-info btn-block" value="Registrar" id="botonregistrartrabajo" onclick="registrartrabajo()">
                            </div>
                          </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <div id="respuesta"></div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL nuevo trabajo-->

<!--******************************************************************-->


<!--******************  eliminar trabajo  *********************-->






                  <div class="modal fade" id="eliminar_trabajo">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> modal </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Salir</button> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL eliminar-->

<!--******************************************************************-->

<!--*********************** mis datos **********************-->


                  <div class="modal fade" id="ventana2">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 class="modal-title"><i>Mis Datos</i></h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <div class="text-center">
                              <img src="src/img/usu1.png" alt="..." class="img-rounded" width="20%">
                            </div>
                            <h5>Nombre:  <?php echo $_SESSION['nombre']; ?></h5>
                            <h5>Cedula:  <?php echo $_SESSION['cedula']; ?></h5>
                            <h5>Correo:  <?php echo $_SESSION['correo']; ?></h5>
                            <h5>Usuario:  <?php echo $_SESSION['user']; ?></h5>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
                                <a href="#" class="btn btn-success">Modificar</a>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL MIS DATOS-->

<!--******************************************************************-->



<!--****************  consultar usuario  ******************-->

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
                        <div class="modal-body col-sm-12">
                           <form class="form-group" action="consultar-usuario" method="post">
                              <div class="input-group">
                                    <input type="text" id="consulta" autofocus required placeholder="Ingrese un numero de cedula..." class="form-control">
                                  <span class="input-group-btn">
                                    <button class="btn btn-info" id="consultarDocente" type="submit"><i class="glyphicon glyphicon-search"></i>  Consultar</button>
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
                  </div> <!--TERMINO EL DIV DEL MODAL consultar-->


<!--******************************************************************-->

<!--**********************  consultar trabajo  ***********************-->





                  <div class="modal fade" id="consultar_trabajo">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> modal </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Salir</button> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL consultar-->



<!--******************************************************************-->

<!--**********************  consultar trabajo  ***********************-->





                  <div class="modal fade" id="correo_p">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> modal </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Salir</button> 
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de envio de correo-->



<!--*****************   asignar docentes  *********************-->

 <div class="modal fade" id="incluirdocente"  data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <h3 align="center" class="titulo"> incluir docente </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form method="post" class="form-group">
                            <div class="col-sm-12 form-group" id="inputoculto"></div>
                        
                              <div class="col-sm-12 form-group">
                              <label for="">Autor del Trabajo:</label>
                                <input type="search" id="docentet" onkeyup='consultardocente()' class="form-control" placeholder="Escribe un nombre de autor...">
                              </div>
                              
                                <div id="docentelist"></div>
                                
                      </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        <div class="col-sm-12 form-group" id="respuestadocentes"></div>
                        <div class="col-sm-12 form-group">
                          <button type="button" onclick="cancelarRegistro()" class="btn btn-danger">Cancelar y Salir</button>
                          <a href="?controller=front&action=trabajos" class="btn btn-info">Guardar y Salir</a>
                        </div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de incluir docente-->


