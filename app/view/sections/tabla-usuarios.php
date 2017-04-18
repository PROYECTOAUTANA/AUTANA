<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Usuarios (<?php echo $numrows; ?>)</div>

  <!-- Table -->
  <div class="table-responsive">
     <table class="table table-hover">
                              <thead>
                                  <tr style="text-align:center;">
                                      <th>Cedula</th>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th>Categoria</th>
                                      <th>Rol de Usuario</th>
                                      <th colspan="3">Operaciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  foreach ($usuarios as $dato):

                                  //obtenemos datos para mostrar
                                  $cedula = $dato["usuario_cedula"];
                                  $nombre = $dato["usuario_nombre"];
                                  $apellido = $dato["usuario_apellido"];
                                  $categoria = $dato["categoria_nombre"];
                                  $rol = $dato["rol"];
                                  
                                  $id_departamento = $dato["id_departamento"];
                                  $id_usuario = $dato["id_usuario"];
                                  $id_categoria = $dato["id_categoria"];
                                  $id_rol = $dato['id_rol'];
                                  $correo = $dato['usuario_correo'];
                                ?>
                                  <tr>
                                    <td><?php echo $cedula;?></td>
                                    <td><?php echo $nombre;?></td>
                                    <td><?php echo $apellido;?></td>
                                    <td><?php echo $categoria;?></td>
                                    <td><?php echo $rol;?></td>
                                    <td>
                                      <a class="btn btn-default" href="?controller=front&action=detalles_usuario&id_usuario=<?php echo $id_usuario; ?>"><i class="glyphicon glyphicon-cog"></i></a>
                                    </td>
                                    <td>
                                      <a class="btn btn-info" href=''><i class="glyphicon glyphicon-lock"></i></a>
                                    </td>
                                    <td>
                                      <a class="btn btn-danger" class="dialog_link" data-gid="<?php echo $id_usuario; ?>"><i class="glyphicon glyphicon-envelope"></i> </a>
                                    </td>
                                  </tr>
                                <?php 
                                endforeach;
                                ?>
                                 </tbody>
                            </table>
  </div>
  <div class="col-xs-10 col-xs-offset-1 table-pagination" style="text-align: center;">
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
  </div>
</div>

<script type="text/javascript">
  
  $( document ).ready(function() {
  // Asociar un evento al botón que muestra la ventana modal
  $('#correo_p').click(function() {
    $.ajax({
        // la URL para la petición
        url : '',
 
        // la información a enviar
        data : { 'correo' : <?php echo $correo; ?> },
 
        // especifica si será una petición POST o GET
        type : 'GET',
 
        // el tipo de información que se espera de respuesta
        dataType : 'html',
 
        // código a ejecutar si la petición es satisfactoria;
        success : function(respuesta) {
            $('#respuestacorreo').html(respuesta);
        },
 
        // código a ejecutar si la petición falla;
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
  });
});
</script>

