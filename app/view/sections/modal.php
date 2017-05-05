

<style type="text/css">
  .modal-content {
    border-radius: 0px;
}
</style>


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
                            <form method="post" data-toggle="validator" role="form">


                        <div class="form-group col-sm-4">
                          <label for="cedula">Cedula:</label>
                          <input class="form-control" data-minlength="7" data-error="Debe ser mayor a 6 digitos." id="cedula" name="cedula" placeholder="Cédula"  type="text" required />
                          <div class="help-block with-errors"></div>
                         </div>

                        <div class="form-group col-sm-4">
                          <label for="nombre">Nombre:</label>
                          <input class="form-control" data-error="Introduzca un nombre." id="nombre" name="nombre" placeholder="Nombre"  onkeypress="return controltext(event)" type="text" required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="apellido">Apellido:</label>
                          <input class="form-control" data-error="Introduzca un apellido." id="apellido" placeholder="Apellido"  onkeypress="return controltext(event)" type="text" required />
                          <div class="help-block with-errors"></div>
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="sexo">Sexo:</label>
                          <select class="form-control" size="1" id="sexo" required>
                          <option value='0'>selecciona</option>
                            <option value="1">F</option>
                            <option value="2">M</option>
                          </select>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="telefono">Telefono:</label>
                          <input class="form-control" data-minlength="11" data-error="El número debe ser mayor a 10 digitos" id="telefono" name="telefono" placeholder="Telefono (Opcional)" type="text" onkeypress="return controltag(event)">
                          <div class="help-block with-errors"></div>
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="inputEmail">Correo:</label>
                          <input type="email" class="form-control" id="correo" placeholder="Email (Opcional)">
                    <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="direccion">Direccion:</label>
                          <textarea  id="direccion" class="form-control" rows="3" required /></textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="rol">Rol de Usuario:</label>
                          <select id="rol" class="form-control">

                              <option value='0'>selecciona</option>
                              <?php foreach ($roles as $rol): ?>
                                <option value="<?php echo $rol->id_rol; ?>"><?php echo $rol->rol_nombre; ?></option>
                              <?php endforeach ?>
                          
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="departamento">Departamento:</label>

                          <select id="departamento" class="form-control">
                          
                                <option value='0'>selecciona</option>
                            <?php foreach ($departamentos as $departamento) :?>
                                <option value="<?php echo $departamento->id_departamento; ?>"><?php echo $departamento->departamento_nombre; ?></option>
                            <?php endforeach; ?>

                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="categoria_actual">Categoria Actual:</label>
                          <select id="categoria_actual" class="form-control">
                            <option value='0'>selecciona</option>
                            <?php foreach ($categorias as $categoria):?>  
                            <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->categoria_nombre; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                       <div class="form-group col-sm-4">
                          <label for="usuario">Usuario:</label>
                          <input type="text" class="form-control" data-error="El nombre de Usuario es Requerido." id="usuario" placeholder="Usuario" required/>
                    <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="clave">Contraseña:</label>
                          <input type="password" data-minlength="6" class="form-control" id="clave" placeholder="Password" required>
                          <div class="help-block">Míninmo 6 Carácteres</div>
                          </div>
                        <div class="form-group col-sm-4">
                          <label for="rclave">Confirmar Contraseña:</label>
                          <input type="password" class="form-control" id="clave" data-match="#clave" data-match-error="las contraseñas no coinciden" placeholder="Confirm" required>
                        <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="observacion">Observacion:</label>
                          <textarea id="observacion" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                          <button type="submit" class="btn btn-info btn-block" onclick="registrarUsuario()"><i class="glyphicon glyphicon-ok" ></i>  Enviar</button>
                        </div>
                      </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        <div id="resultadoregistrarusuario"></div>
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
                        <form method="post" class="form-group" data-toggle="validator">

                              <div class="form-group col-sm-4">
                              <label for="titulo">Titulo:</label>
                              <input class="form-control" data-error="Por favor introduzca un título." id="titulo" placeholder="Escriba..." type="text"   required />    
                                  <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-sm-4">
                              <label for="proceso">Proceso:</label>
                              <select id="proceso" size="1" class="form-control" >
                                <option>Seleccione</option>
                                <option value="regular">Regular</option>
                                <option value="extraordinario">Extraordinario</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-4">
                              <label>Fecha de Presentacion Publica:</label>
                              <input type="text" id="fecha_pp" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required /> 
                                  <div class="help-block with-errors"></div>
                            </div>

                             <div class="form-group col-sm-12">
                              <label for="">Linea de investigacion:</label>
                          <select id="linea_t" class="form-control" class="form-control">
                            <option>seleccione</option>
                                <?php foreach ($lineas as $linea): ?>
                                  <option value="<?= $linea->id_linea; ?>"><?= $linea->linea_nombre; ?></option>
                                <?php endforeach; ?>
                          </select>
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="">Fase:</label>
                              <select id="fase_t" class="form-control" class="form-control">
                               <option>seleccione</option>
                                <?php foreach ($fases as $fase): ?>
                                  <option value="<?= $fase->id_fase; ?>"><?= $fase->fase_nombre; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group col-sm-12">
                              <label for="">Observacion:</label>
                              <textarea id="observacion" class="form-control" rows="3" required/></textarea>
                              <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-sm-12">
                              <input type="submit" class="btn btn-info btn-block" value="Registrar" id="botonregistrartrabajo" onclick="registrarTrabajo()">
                            </div>
                          </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                              <div id="respuestaregistrartrabajo"></div>
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

<!--**********************  nuevo_rol  ***********************-->





                  <div class="modal fade" id="nuevo_rol">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> nuevo rol de usuario </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=rol&action=nuevo_rol" method="post" class="form-group col-sm-12"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombrerol">Nombre:</label>
                                  <input type="text" id="nombrerol" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-sm-4">
                                  <label>Permisos del rol:</label>
                                    <table width="100%" class="table table-hover">
                                      <?php foreach ($todos_los_modulos as $modulo): ?>
                                        <tr>
                                          <td>
                                            <?= $modulo->modulo_nombre ?>  
                                          </td>
                                          <td>
                                            <input type="checkbox" name="modulos[]" value="<?= $modulo->id_modulo ?>">
                                          </td>
                                        </tr>
                                      <?php endforeach ?>
                                    </table>
                                </div>
                                <div class="form-group col-sm-8">
                                  <label for="descripcionrol">Descripcion del rol:</label>
                                  <textarea  id="descripcionrol" name="descripcion" class="form-control" rows="14"></textarea>
                                </div>
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">

                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de envio de correo-->

<!--********************** nuevo departamento *********** -->
 <div class="modal fade" id="nuevo_departamento">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> nuevo departamento </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=departamento&action=registrar_departamento" method="post" class="form-group col-sm-12"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombre_departamento">Nombre:</label>
                                  <input type="text" id="nombre_departamento" class="form-control" name="nombre">
                                </div>
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">

                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de nuevo departamento-->
<!--*************************************************************************************-->

<!--********************** nueva linea de investigacion *********** -->
 <div class="modal fade" id="nueva_linea">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> nueva linea de investigacion</h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=linea&action=registrar_linea" method="post" class="form-group col-sm-12"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombre_linea">Nombre:</label>
                                  <input type="text" id="nombre_linea" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-sm-12">
                                  <label for="descripcionlinea">Descripcion:</label>
                                  <textarea  id="descripcionlinea" name="descripcion" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">

                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de nuevo departamento-->
<!--*************************************************************************************-->


<!--********************** nueva categoria*********** -->
 <div class="modal fade" id="nueva_categoria">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> nueva categoria</h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=categoria&action=registrar_categoria" method="post" class="form-group col-sm-12"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombre_categoria">Nombre:</label>
                                  <input type="text" id="nombre_categoria" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-sm-12">
                                  <label for="descripcioncategoria">Descripcion:</label>
                                  <textarea  id="descripcioncategoria" name="descripcion" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">

                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de nuevo departamento-->
<!--*************************************************************************************-->


<!--********************** nueva fase*********** -->
 <div class="modal fade" id="nueva_fase">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> nueva fase</h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form action="?controller=fase&action=registrar_fase" method="post" class="form-group col-sm-12"> 
                                <div class="form-group col-sm-12">
                                  <label for="nombre_fase">Nombre:</label>
                                  <input type="text" id="nombre_fase" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-sm-12">
                                  <label for="descripcionfase">Descripcion:</label>
                                  <textarea  id="descripcionfase" name="descripcion" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="col-sm-12 form-group">
                                  <input type="submit" class="btn btn-info btn-block" name="">
                                </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">

                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de nuevo departamento-->
<!--*************************************************************************************-->



<!--*****************   asignar docentes  *********************-->

                  <div class="modal fade" id="incluir_docente" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Incluir Docente </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form method="post" class="form-group">
                              <div class="col-sm-12 form-group">
                                <select id="vinculo" name="vinculo" class="form-control" onchange="$('#docentet').removeAttr('disabled');">
                                  <option onclick="$('#docentet').attr('disabled', 'disabled');">Seleccione..</option>
                                  <option value="autor">AUTOR</option>
                                  <option value="tutor">TUTOR</option>
                                  <option value="jurado">JURADO</option>
                                </select>
                              </div>
                              <input type="hidden" id="id_trabajo" value="<?php echo $id_trabajo; ?>">
                              <div class="col-sm-12 form-group">
                              <input type="search" id="docentet" disabled onkeyup='consultardocente()' class="form-control" placeholder="Escribe un nombre de un docente...">
                              </div>
                              <div id="docentelist"></div> 
                              <div class="col-sm-12 form-group">
                                  <button type="button" class="btn btn-info btn-block" id="botonincluirdocente" onclick="incluirdocente()">listo...</button>
                              </div>
                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                        <div class="col-sm-12 form-group" id="respuestadocentes"></div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de incluir docente-->


<!--Cambiar fase-->
  <div class="modal fade" id="cambiar_fase">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Cambiar fase del Trabajo </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form class="form-group">

                            
                              <div class="form-group col-sm-12">
                            
                                <input type="hidden" id="id_trabajo2" value="<?php echo $id_trabajo; ?>">
                            
                                <select id="id_fase2" class="form-control">
                            
                                   <option>Seleccione..</option> 
                                  <?php foreach ($fases as $fase):?>
                                    <option value="<?php echo $fase->id_fase; ?>"><?php echo $fase->fase_nombre; ?></option>
                                  <?php endforeach;?>
                            
                                </select>
                            
                              </div>
                            
                              <div class="form-group col-sm-12">
                                <input type="button" id="botoncambiarfase" class="btn btn-info btn-block" value="Cambiar fase" onclick="cambiarFase()">
                              </div>
                            

                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                          <div class="col-sm-12 form-group" id="respuestacambiarfase"></div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de cambio de fase-->

<!--cambio de rol-->

<!--Cambiar fase-->
  <div class="modal fade" id="cambiar_rol">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 align="center" class="titulo"> Cambiar rol de usuario </h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <form class="form-group col-sm-12" action="?controller=usuarioRol&action=cambiar_rol" method="post">

                              <div class="form-group col-sm-12">
                            
                                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>">
                            
                                <select id="rol" name="rol" class="form-control">
                            
                                   <option>Seleccione..</option> 
                                  <?php foreach ($todos_los_roles as $rol):?>
                                    <option value="<?php echo $rol->id_rol; ?>"><?php echo $rol->rol_nombre; ?></option>
                                  <?php endforeach;?>
                            
                                </select>
                            
                              </div>
                            
                              <div class="form-group col-sm-12">
                                <input type="submit" id="botoncambiarrol" class="btn btn-info btn-block" value="Cambiar rol">
                              </div>
                            

                            </form>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                          <div class="col-sm-12 form-group" id="respuestacambiarfase"></div>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL de cambio de rol-->

