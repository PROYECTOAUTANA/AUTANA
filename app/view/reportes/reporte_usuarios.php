<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="src/css/estilo_reporte.css">
</head>
<body>
  <div class="col-md-12 cuerpo">
        <table class="col-md-12" width="100%">
        <thead>
          <tr>
            <th class="col-md-6"><p style="text-align:left; ">Universidad Politécnica Territorial Andrés Eloy Blanco (UPTAEB)</p></th>
            <th class="col-md-6"><p style="text-align:right;">Fecha: <?php echo date("d/m/Y"); ?></p></th>
        </tr>
        <tr>
            <th class="col-md-12"><p style="text-align:left; ">Sistema Web para Gestion de Trabajos de Ascenso (AUTANA)</p></th>
        </tr>
        <tr>
            <th class="col-md-12"><p style="text-align:left; ">Emitido por: <?php echo $_SESSION['nombre']; ?></p></th>
        </tr>
        </thead>
    </table>

    <div class="col-md-6 col-md-offset-3">
      <hr><p style="text-align:center;">REPORTE GENERAL DE USUARIOS DEL SISTEMA</p><hr>
    </div>
    <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Usuarios (<?php echo $dbc; ?>)</div>
          <!-- Table -->
            <table class="table">
              <thead>
                <tr class="info">
                  <th class="col-md-3">Cedula</th>
                  <th class="col-md-3">Nombre</th>
                  <th class="col-md-3">Apellido</th>
                  <th class="col-md-3">Categoria</th>
                  <th class="col-md-3">Rol</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($db as $dato):
                  //obtenemos datos para mostrar
                  $cedula = $dato["usuario_cedula"];
                  $nombre = $dato["usuario_nombre"];
                  $apellido = $dato["usuario_apellido"];
                  $categoria = $dato["categoria_nombre"];
                  $rol = $dato["rol"];
                ?>
                <tr>
                  <td class="col-md-3"><?php echo $cedula;?></td>
                  <td class="col-md-3"><?php echo $nombre;?></td>
                  <td class="col-md-3"><?php echo $apellido;?></td>
                  <td class="col-md-3"><?php echo $categoria;?></td>
                  <td class="col-md-3"><?php echo $rol;?></td>    
                </tr>
                <?php 
                  endforeach;
                ?>
              </tbody>
            </table>
      </div>
    </div>
  </div><!--Termina div cuerpo-->

 </body>
</html>