
<?php if (!$todos_los_departamentos): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($todos_los_departamentos): ?>
<br><br>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Departamentos</div>

  <!-- Table -->
  <div class="table-responsive">
    <table border="0" class="table table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Departamento</th>
                                      <th colspan="2">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($todos_los_departamentos as $departamento):
                                  //obtenemos departamentos para mostrar
                                  $nombre = $departamento->departamento_nombre;
                                  $id_departamento = $departamento->id_departamento;
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $nombre;?></td>
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
