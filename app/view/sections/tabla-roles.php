<?php if (!$db): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($db): ?>
<br><br>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Roles de Usuario</div>

  <!-- Table -->
  <div class="table-responsive">
    <table border="0" class="table table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Rol</th>
                                      <th align="center" >Descripcion</th>
                                      <th colspan="2">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($db as $dato):
                                  //obtenemos datos para mostrar
                                  $descripcion = $dato["descripcion"];
                                  $rol = $dato["rol"];
                                  $id_rol = $dato['id_rol'];
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $rol;?></td>
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
