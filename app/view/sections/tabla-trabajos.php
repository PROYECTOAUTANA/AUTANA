<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Trabajos (<?php echo $numrows; ?>)</div>

  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-hover">
            <thead>
            <tr>
              <th>Titulo</th>
              <th>Fecha de presentacion</th>
              <th>Fase</th>
              <th colspan="3">Operaciones</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($trabajos as $dato):
              $id = $dato["id_trabajo"];
              $titulo = $dato["trabajo_titulo"]; 
              $fecha_pp = $dato["fecha_presentacion"];
              $fase = $dato["fase_nombre"]; 
          ?>
          <tr>
            <td><?php echo $titulo?></td>
            <td><?php echo $fecha_pp?></td>
            <td><?php echo $fase?></td>
            <td>
                <a class="btn btn-info" href="?controller=front&action=detalles_trabajo&id_trabajo=<?php echo $id; ?>"> <i class="glyphicon glyphicon-cog"></i>
                </a>
            </td>
            <td>
              <a class="btn btn-danger" href="eliminar-trabajo?=<?php echo $id; ?>"><i class="glyphicon glyphicon-trash"></i> 
              </a>
            </td>
            <td>
              <a class="btn btn-default" href="?controller=reporte&action=estatus&id_trabajo=<?php echo $id; ?>" target="_blank"> <i class="glyphicon glyphicon-stats"></i>
              </a>
            </td>
          </tr>
          <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <div class="col-xs-10 col-xs-offset-1 table-pagination" style="text-align: center;">
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
  </div>
</div>