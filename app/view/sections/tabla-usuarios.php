<?php if (!$db): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($db): ?>
<table border="0" class="table table-bordered table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Cedula</th>
                                      <th align="center" >Nombre</th>
                                      <th align="center" >Apellido</th>
                                      <th align="center" >Categoria</th>
                                      <th align="center" >Departamento</th>
                                      <th align="center" >Rol de Usuario</th>
                                      <th  align="center" colspan="3">Operaciones</th>
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
                                    <td align="center"><?php echo $cedula;?></td>
                                    <td align="center"><?php echo $nombre;?></td>
                                    <td align="center"><?php echo $apellido;?></td>
                                    <td align="center"><?php echo $categoria;?></td>
                                    <td align="center"><?php echo $departamento;?></td>
                                    <td align="center"><?php echo $rol;?></td>
                                    <td align="center">
                                      <a class="btn btn-default" href="?controller=front&action=detalles_usuario&id_usuario=<?php echo $id_usuario; ?>">Detalles</a>
                                    </td>
                                    <td align="center">
                                      <a class="btn btn-info" href="modificar-usuario&id=<?php echo $id; ?>">Modificar</a>
                                    </td>
                                    <td align="center">
                                      <a class="btn btn-danger" href='eliminar-usuario?id_usuario=<?php echo $id_usuario; ?>&id_categoria=<?php echo $id_categoria; ?>&id_departamento=<?php echo $id_departamento; ?>&id_rol=<?php echo $id_rol; ?>'>Eliminar
                                      </a>
                                    </td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
<?php endif ?>



