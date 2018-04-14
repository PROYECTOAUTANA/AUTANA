<table class="busqueda table table-hover ">
                              <thead>
                                  <tr style="text-align:center;">
                                      <th >#</th>
                                      <th>Cédula</th>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th>Departamento</th>
                                      <th>Categoria</th>
                                      <th colspan="2">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                               <?php 
                                  $contador=1;
                                  foreach ($resultado as $dato):
                                  //obtenemos datos para mostrar
                                    $cedula = $dato->usuario_cedula;
                                    $nombre = $dato->usuario_nombre;
                                    $apellido = $dato->usuario_apellido;
                                    $departamento = $dato->departamento_nombre;
                                    $categoria = $dato->categoria_nombre;
                                    $id_usuario = $dato->id_usuario;
                                ?>
                                  <tr>
                                    <td><?php echo $contador;?></td>
                                    <td><?php echo $cedula;?></td>
                                    <td><?php echo $nombre;?></td>
                                    <td><?php echo $apellido;?></td>
                                    <td><?php echo $departamento;?></td>
                                    <td><?php echo $categoria;?></td>
                                    <?php if ($id_usuario == 1): ?>
                                      <td>
                                      <a class="btn btn-default" href="#"><i class="glyphicon glyphicon-pencil"></i>  Detalles</a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-trash"></i>  Eliminar</a>
                                    </td>
                                    <?php else: ?>
                                      <td>
                                      <a class="btn btn-default" href="?controller=front&action=detalles_usuario&id_usuario=<?php echo $id_usuario; ?>"><i class="glyphicon glyphicon-pencil"></i>  Detalles</a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" href="#eliminar_usuario" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i>  Eliminar</a>
                                    </td>
                                    <?php endif; ?>
                                  </tr>
                                <?php 
                                $contador++;
                                endforeach;
                                ?>
                              </tbody>
                        </table>