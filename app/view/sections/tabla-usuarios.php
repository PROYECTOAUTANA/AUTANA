<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Usuarios (<?php echo $numrows; ?>)</div>

  <!-- Table -->
  <div class="table-responsive">
     <table class="table table-hover">
                              <thead>
                                  <tr style="text-align:center;">
                                      <th>Cedula</th>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th>Categoria</th>
                                      <th>Rol de Usuario</th>
                                      <th colspan="3">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($usuarios as $dato):

                                  //obtenemos datos para mostrar
                                  $cedula = $dato["usuario_cedula"];
                                  $nombre = $dato["usuario_nombre"];
                                  $apellido = $dato["usuario_apellido"];
                                  $categoria = $dato["categoria_nombre"];
                                  $rol = $dato["rol"];
                                  
                                  $id_departamento = $dato["id_departamento"];
                                  $id_usuario = $dato["id_usuario"];
                                  $id_categoria = $dato["id_categoria"];
                                  $id_rol = $dato['id_rol'];
                                ?>
                                  <tr>
                                    <td><?php echo $cedula;?></td>
                                    <td><?php echo $nombre;?></td>
                                    <td><?php echo $apellido;?></td>
                                    <td><?php echo $categoria;?></td>
                                    <td><?php echo $rol;?></td>
                                    <td>
                                      <a class="btn btn-default" href="?controller=front&action=detalles_usuario&id_usuario=<?php echo $id_usuario; ?>"><i class="glyphicon glyphicon-cog"></i></a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" href="#correo_p" data-toggle="modal"><i class="glyphicon glyphicon-envelope"></i> </a>
                                    </td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
  </div>
  <div class="col-xs-10 col-xs-offset-1 table-pagination" style="text-align: center;">
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
  </div>
</div>



