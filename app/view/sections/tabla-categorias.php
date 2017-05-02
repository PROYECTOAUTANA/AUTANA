
<?php if (!$todas_las_categorias): ?>
  <?php echo "No se encontraron registros..."; ?>
<?php endif ?>
<?php if ($todas_las_categorias): ?>
<br><br>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Categorias de Docentes</div>

  <!-- Table -->
  <div class="table-responsive">
    <table border="0" class="table table-hover" align="center" >
                              <thead>
                                  <tr style="text-align:center;">
                                      <th align="center" >categoria</th>
                                      <th align="center" >Descripcion</th>
                                      <th colspan="2">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($todas_las_categorias as $categoria):
                                  //obtenemos categorias para mostrar
                                  $descripcion = $categoria->categoria_descripcion;
                                  $nombre = $categoria->categoria_nombre;
                                  $id_categoria = $categoria->id_categoria;
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
