<div class="formulario1 col-sm-12">
                      <form class="form-group" action="?controller=trabajo&action=registrar" method="post" id="form1">
                        <div class="form-group col-sm-4">
                          <label for="nombre">Titulo:</label>
                          <input  id="nombre" class="form-control" type="text" name="titulo" placeholder="Escriba..." >
                        </div>
                        <div class="form-group col-sm-3">
                          <label for="">Linea de Investigacion:</label>
                          <select name="linea" size="1" class="form-control" >
                            <option value="linea1">linea 1</option>
                            <option value="linea1">linea 2</option>
                            <option value="linea1">linea 3</option>
                          </select>
                        </div>
                          <div class="form-group col-sm-3">
                          <label for="">Numero de Consejo:</label>
                          <input  id="" class="form-control" type="text" name="n_consejo" >
                        </div>
                         <div class="form-group col-sm-2">
                          <label for="">Proceso:</label>
                          <select name="proceso" size="1" class="form-control">
                            <option value="regular">Regular</option>
                            <option value="extraordinario">Extraordinario</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Fecha de Presentacion Publica:</label>
                          <input type="text" name="fecha_pp" class="form-control" placeholder="DD/MM/AAAA" />
                        </div>
                         <div class="form-group col-sm-4">
                          <label for="">Categoria de Ascenso:</label>
                          <input  id=""  class="form-control" type="text" name="categoria_ascenso" placeholder="Escriba...">
                        </div>
                        <div class="form-group col-sm-4">
                          <label for="">Fase:</label>
                          <select name="fase" size="1" class="form-control">
                            <option value="recepcion">Recepcion</option>
                            <option value="seguimiento">Seguimiento</option>
                            <option value="aprobacion">Aprobacion</option>
                          </select>
                        </div>
                        <div class="col-sm-12 form-group">
                          <a href="#ventana4" data-toggle="modal" class="btn btn-primary">Agregar un docente al trabajo</a>
                        </div>
                        <div id="autor">
                          
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="">Observacion:</label>
                          <textarea name="observacion" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                          <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                      </form>
                    </div>