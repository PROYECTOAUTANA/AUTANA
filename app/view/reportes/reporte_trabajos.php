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
            <th class="col-md-12"><p style="text-align:left; ">Emitido por: <?php echo $_SESSION['user']; ?></p></th>
        </tr>
        </thead>
    </table>

    <div class="col-md-6 col-md-offset-3">
      <hr><p style="text-align:center;">REPORTE GENERAL DE TRABAJOS DE ASCENSO</p><hr>
    </div>
    <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Trabajos (<?php echo $dbc; ?>)</div>
          <!-- Table -->
            <table class="table">
              <thead>
                <tr class="info">
                  <th class="col-md-3">Titulo</th>
                  <th class="col-md-3">Fecha de Presentacion</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach ($db as $dato):
                  $id = $dato->id_trabajo;
                  $titulo = $dato->trabajo_titulo; 
                  $fecha_pp = $dato->trabajo_fecha_presentacion;
                ?>
                <tr>
                  <td class="col-md-3"><p align="center"><?php echo $titulo;?></p></td>
                  <td class="col-md-3"><p align="center"><?php echo $fecha_pp;?></p></td>                       
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