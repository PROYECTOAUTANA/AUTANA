<?php if (!$db): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($db): ?>
  <table border="0" class="table table-bordered table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th>Titulo</th>
                                      <th>Autor</th>
                                      <th>Fecha de Presentacion</th>
                                      <th>Fase</th>
                                      <th colspan="3">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($db as $dato):
                                  $id = $dato["id_trabajo"];
                                  $titulo = $dato["trabajo_titulo"]; 
                                  $autor = $dato["usuario_nombre"];
                                  $fecha_pp = $dato["fecha_presentacion"];
                                  $fase = $dato["fase_nombre"]; 

                                ?>
                                  <tr>
                                    <td align="center"><?php echo $titulo;?></td>
                                    <td align="center"><?php echo $autor;?></td>
                                    <td align="center"><?php echo $fecha_pp;?></td>
                                    <td align="center"><?php echo $fase;?></td>
                                    <td align="center"><a class="btn btn-info" href="?controller=front&action=detalles_trabajo&id_trabajo=<?php echo $id; ?>"> <i class="glyphicon glyphicon-cog"></i></a></td>
                                    <td align="center"><a class="btn btn-danger" href="eliminar-trabajo?=<?php echo $id; ?>"><i class="glyphicon glyphicon-trash"></i> </a></td>
                                    <td align="center"><a class="btn btn-default" href="modificar-trabajo?=<?php echo $id; ?>"> <i class="glyphicon glyphicon-stats"></i></a></td>
                                    
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
<?php endif ?>
