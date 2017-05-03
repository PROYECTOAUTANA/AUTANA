
<?php if (!$bitacora_trabajo): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($bitacora_trabajo): ?>
<br><br>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Bitacora de Trabajos</div>

  <!-- Table -->
  <div class="table-responsive">
    <table border="0" class="table table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >Trabajo</th>
                                      <th>Observacion</th>
                                      <th>Fecha</th>
                                      <th>Hora</th>
                                      <th align="center" >Usuario Gestor</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($bitacora_trabajo as $bitacora):
                                  //obtenemos categorias para mostrar
                                  $usuario = $bitacora->fk_usuario_gestor;
                                  $trabajo = $bitacora->fk_trabajo;
                                  $observacion = $bitacora->observacion;
                                  $fecha = $bitacora->fecha;
                                  $hora = $bitacora->hora;
                                ?>
                                  <tr>
                                    <td align="center"><?php echo $trabajo;?></td>
                                    <td align="center"><?php echo $observacion;?></td>
                                    <td align="center"><?php echo $fecha;?></td>
                                    <td align="center"><?php echo $hora;?></td>
                                    <td align="center"><?php echo $usuario;?></td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
  </div>
</div>                  
<?php endif ?>