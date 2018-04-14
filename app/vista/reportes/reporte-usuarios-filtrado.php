<?php session_start();  ?>
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
            <th class="col-md-12"><p style="text-align:left; ">Emitido por: <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></p></th>
        </tr>
        <tr>
            <th class="col-md-12"><p style="text-align:left; ">Departamento:  <?php echo $_SESSION['departamento']; ?></p></th>
        </tr>
        </thead>
    </table>

    <div class="col-md-6 col-md-offset-3">
      <hr><p style="text-align:center;">REPORTE FILTRADO DE TRABAJOS DE ASCENSO</p><hr>
    </div>
    <div class="col-sm-12 contenido">
      <?php if (!$datos_usuario): ?>
        <p>No se encontraron sugerencias de usuarios del sistema...</p>
      <?php else: ?>
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Trabajos</div>
          <!-- Table -->
           <table class="table">
              <thead>
                <tr>
                  <th class="col-sm-2">#</th>
                  <th class="col-sm-2">Cedula</th>
                  <th class="col-sm-2">Nombre</th>
                  <th class="col-sm-2">Apellido</th>
                  <th class="col-sm-2">Categoria</th>
                  <th class="col-sm-2">Departamento</th>
                  <th class="col-sm-2">Rol</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $numero = 1;
                  foreach ($datos_usuario as $usuario):
                  //obtenemos usuarios para mostrar
                  $cedula = $usuario->usuario_cedula;
                  $nombre = $usuario->usuario_nombre;
                  $apellido = $usuario->usuario_apellido;
                  $categoria = $usuario->categoria_nombre;
                  $departamento = $usuario->departamento_nombre;
                  $rol = $usuario->rol_nombre;
                ?>
                <tr>
                  <td class="col-sm-2"><?php echo $numero;?></td>
                  <td class="col-sm-2"><?php echo $cedula;?></td>
                  <td class="col-sm-2"><?php echo $nombre;?></td>
                  <td class="col-sm-2"><?php echo $apellido;?></td>
                  <td class="col-sm-2"><?php echo $categoria;?></td>
                  <td class="col-sm-2"><?php echo $departamento;?></td>
                  <td class="col-sm-2"><?php echo $rol;?></td>    
                </tr>
                <?php 
                  $numero = $numero + 1;
                  endforeach;
                ?>
              </tbody>
            </table>
      </div>
      <?php endif ?>
    </div>
  </div><!--Termina div cuerpo-->

 </body>
</html>