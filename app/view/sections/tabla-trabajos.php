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
              <th colspan="3">Operaciones</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($trabajos as $trabajo):?>
          <tr>
            <td><?php echo $trabajo->trabajo_titulo?></td>
            <td><?php echo $trabajo->trabajo_fecha_presentacion?></td>
            <td>
                <a class="btn btn-info" href="?controller=front&action=detalles_trabajo&id_trabajo=<?php echo $trabajo->id_trabajo; ?>"> <i class="glyphicon glyphicon-cog"></i>
                </a>
            </td>
            <td>
              <a class="btn btn-danger" href="eliminar-trabajo?=<?php echo $trabajo->id_trabajo; ?>"><i class="glyphicon glyphicon-trash"></i> 
              </a>
            </td>
            <td>
              <a class="btn btn-default" href="?controller=reporte&action=estatus&id_trabajo=<?php echo $trabajo->id_trabajo; ?>" target="_blank"> <i class="glyphicon glyphicon-stats"></i>
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