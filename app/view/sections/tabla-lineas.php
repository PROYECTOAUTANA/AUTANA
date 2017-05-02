
<?php if (!$lineas): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($lineas): ?>
<br><br>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lineas de Investigacion de trabajos de ascenso</div>

  <!-- Table -->
  <div class="table-responsive">
    <table border="0" class="table table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Linea de investigacion</th>
                                      <th align="center" >Descripcion</th>
                                      <th colspan="2">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($lineas as $linea):
                                  //obtenemos lineas para mostrar
                                  $descripcion = $linea->linea_descripcion;
                                  $nombre = $linea->linea_nombre;
                                  $id_linea = $linea->id_linea;
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $nombre;?></td>
                                    <td align="center"><?php echo $descripcion;?></td>
                                    <td>
                                        <a class="btn btn-info" href="#"> <i class="glyphicon glyphicon-cog"></i>
                                        </a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" href="#"><i class="glyphicon glyphicon-trash"></i> 
                                      </a>
                                    </td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
  </div>
</div>                  
<?php endif ?>
