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
                        <div class="modal-body">
                            <form action="registrar-usuario" method="post" class="form-group">
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
                            <option value="4">Usuario Jurado</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="departamento">Departamento:</label>
                          <select name="departamento" id="departamento" class="form-control">
                          <option value='0'>selecciona</option>
                            <option value="pnfi">Informatica</option>
                            <option value="pnfa">Administracion</option>
                            <option value="pnfc">Contaduria</option>
                            <option value="pnfag">Agroalimentacion</option>
                            <option value="pnfci">Ciencias de la Informacion</option>
                            <option value="pnfhsl">Higiene y Seguridad Laboral</option>
                            <option value="pnfsca">Sistemas de Calidad y Ambiente</option>
                            <option value="pnft">Turismo</option>
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
                          <button type="submit" class="btn btn-info btn-block" name="registrar_usuario">Enviar</button>
                        </div>
                      </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                            <div class="col-sm-12">
                              <a href="#" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Salir</a> 
                            </div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL MIS DATOS-->
                  