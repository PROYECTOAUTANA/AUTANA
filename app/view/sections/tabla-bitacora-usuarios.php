
<?php if (!$bitacora_usuario): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($bitacora_usuario): ?>
<br><br>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Bitacora de Usuarios</div>

  <!-- Table -->
  <div class="table-responsive">
    <table border="0" class="table table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Usuario</th>
                                      <th align="center" >Fecha de entrada</th>
                                      <th>Hora de entrada</th>
                                      <th>Fecha de salida</th>
                                      <th>Hora de salida</th>
                                      <th>Estado del Usuario</th>

                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($bitacora_usuario as $bitacora):
                                  //obtenemos categorias para mostrar
                                  $usuario = $bitacora->fk_usuario;
                                  $fecha_de_entrada = $bitacora->fecha_de_entrada;
                                  $fecha_de_salida = $bitacora->fecha_de_salida;
                                  $hora_de_entrada = $bitacora->hora_de_entrada;
                                  $hora_de_salida = $bitacora->hora_de_salida;
                                  $estado = $bitacora->estado;
                                  if ($estado == 1) {
                                    $estado = "conectado";
                                  }else{
                                    $estado = "desconectado";
                                  }
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $usuario;?></td>
                                    <td align="center"><?php echo $fecha_de_entrada;?></td>
                                    <td align="center"><?php echo $hora_de_entrada;?></td>
                                    <td align="center"><?php echo $fecha_de_salida;?></td>
                                    <td align="center"><?php echo $hora_de_salida;?></td>
                                    <td align="center"><?php echo $estado;?></td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
  </div>
</div>                  
<?php endif ?>