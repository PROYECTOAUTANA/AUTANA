<table class="busqueda table table-hover">
                                      <thead>
                                      <tr>
                                        <th >#</th>
                                        <th>Título</th>
                                        <th>Fecha de presentación</th>
                                        <th>Fase Actual</th>
                                        <th>Linea de investigacion</th>
                                        <th colspan="3">Operaciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $contador = 1;
                                    foreach ($resultado as $trabajo):
                                          
                                          $id_trabajo = $trabajo->id_trabajo;
                                    ?>
                                    <tr>
                                      <td><?php echo $contador;?></td>
                                      <td><?php echo $trabajo->trabajo_titulo;?></td>
                                      <td><?php echo $trabajo->trabajo_fecha_presentacion;?></td>
                                      <td><?php echo $trabajo->fase_nombre;?></td>
                                      <td><?php echo $trabajo->linea_nombre;?></td>
                                      <td>
                                          <a class="btn btn-info" href="?controller=front&action=detalles_trabajo&id_trabajo=<?php echo $trabajo->id_trabajo; ?>"> <i class="glyphicon glyphicon-pencil"></i>  Detalles
                                          </a>
                                      </td>
                                      <td>
                                        <a class="btn btn-danger" href="#eliminar_trabajo" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i>  Eliminar
                                        </a>
                                      </td>
                                      <td>
                                        <a class="btn btn-default" href="?controller=reporte&action=ver_estatus_trabajo&id_trabajo=<?php echo $trabajo->id_trabajo; ?>" target="_blank"> <i class="glyphicon glyphicon-stats"></i>  Estatus
                                        </a>
                                      </td>
                                    </tr>
                                    <?php 
                                    $contador++;
                                    endforeach;?>
                                  </tbody>
                                </table>