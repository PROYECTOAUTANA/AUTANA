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
      <hr><p style="text-align:center;">REPORTE GENERAL DE TRABAJOS DE ASCENSO</p><hr>
    </div>
    <div class="col-sm-12 contenido">
      <?php if (!$datos_trabajo): ?>
        <p>Ningun trabajo de ascenso registrado hasta ahora....</p>ç
      <?php else: ?>
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Trabajos</div>
          <!-- Table -->
            <table class="table">
              <thead>
                <tr class="info">
                  <th class="2">#</th>
                  <th class="2">titulo</th>
                  <th class="2">fecha de presentacion publica</th>
                  <th class="2">proceso</th>
                  <th class="2">fase actual</th>
                  <th class="2">linea</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $numero = 1;
                  foreach ($datos_trabajo as $trabajo):
                  
                  $titulo = $trabajo->trabajo_titulo; 
                  $fecha_pp = $trabajo->trabajo_fecha_presentacion;
                  $proceso = $trabajo->trabajo_proceso;
                  $fase = $trabajo->fase_nombre; 
                  $linea = $trabajo->linea_nombre;
                ?>
                <tr>
                  <td class="col-sm-2" ><?php echo $numero; ?></td>
                  <td class="col-sm-2"><p><?php echo $titulo;?></p></td>
                  <td class="col-sm-2"><p><?php echo $fecha_pp;?></p></td>
                  <td class="col-sm-2"><p><?php echo $proceso;?></p></td>
                  <td class="col-sm-2"><p><?php echo $fase;?></p></td>
                  <td class="col-sm-2"><p><?php echo $linea;?></p></td>                      
                </tr>
                <?php 
                  $numero = $numero+1;
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