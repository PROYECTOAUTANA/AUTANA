<?php if (!$db): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($db): ?>
<div class="col-sm-12">
  <table border="0" class="table table-bordered table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >seleccionar</th>
                                      <th align="center" >Cedula</th>
                                      <th align="center" >Nombre</th>
                                      <th align="center" >Apellido</th>
                                      <th align="center" >Categoria</th>
                                      <th align="center" >Departamento</th>
                                      <th align="center" >Rol de Usuario</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($db as $dato):

                                  //obtenemos datos para mostrar
                                  $cedula = $dato["usuario_cedula"];
                                  $nombre = $dato["usuario_nombre"];
                                  $apellido = $dato["usuario_apellido"];
                                  $categoria = $dato["categoria_nombre"];
                                  $rol = $dato["rol"];
                                  $departamento = $dato["departamento_nombre"];
                                  
                                  $id_departamento = $dato["id_departamento"];
                                  $id_usuario = $dato["id_usuario"];
                                  $id_categoria = $dato["id_categoria"];
                                  $id_rol = $dato['id_rol'];
                                ?>
                                  <tr>
                                    <td align="center"><input id="radio" type="radio" name="seleccion" value="<?php echo $dato["id_usuario"]; ?>" /></td>
                                    <td align="center"><?php echo $cedula;?></td>
                                    <td align="center"><?php echo $nombre;?></td>
                                    <td align="center"><?php echo $apellido;?></td>
                                    <td align="center"><?php echo $categoria;?></td>
                                    <td align="center"><?php echo $departamento;?></td>
                                    <td align="center"><?php echo $rol;?></td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
</div>
<div class="col-sm-12 form-group">
                      <select id="vinculo" name="vinculo" class="form-control" onchange="$('#botonincluirdocente').removeAttr('disabled');">
                        <option value="autor">AUTOR</option>
                        <option value="tutor">TUTOR</option>
                        <option value="jurado">JURADO</option>
                      </select>
                    </div>
                    <div class="col-sm-12 form-group">
                      <button type="button" class="btn btn-info btn-block" id="botonincluirdocente" disabled="disabled" onclick="incluirdocente()">listo...</button>
                    </div>
<?php endif ?>



