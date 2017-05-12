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
          <div class="panel-heading">Usuarios</div>
          <!-- Table -->
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Categoria</th>
                  <th>Categoria</th>
                  <th>Rol</th>
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
                  <td><?php echo $numero;?></td>
                  <td><?php echo $cedula;?></td>
                  <td><?php echo $nombre;?></td>
                  <td><?php echo $apellido;?></td>
                  <td><?php echo $categoria;?></td>
                  <td><?php echo $departamento;?></td>
                  <td><?php echo $rol;?></td>    
                </tr>
                <?php 
                  $numero = $numero + 1;
                  endforeach;
                ?>
              </tbody>
            </table>
      </div>
    </div>
  </div><!--Termina div cuerpo-->

 </body>
</html>