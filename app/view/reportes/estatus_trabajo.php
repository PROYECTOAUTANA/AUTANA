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
      <hr><p style="text-align:center;">ESTATUS DEL TRABAJO DE ASCENSO</p><hr>
    </div>
    <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Datos del trabajo : <?php echo $array_db["trabajo_titulo"]; ?></div>
          <!-- Table -->
          <?php 
            $id = $array_db["id_trabajo"];
            $titulo = $array_db["trabajo_titulo"]; 
            $autor = $array_db["usuario_nombre"];
            $fecha_pp = $array_db["fecha_presentacion"];
            $fase = $array_db["fase_nombre"];
          ?>
            <table class="col-md-12 table" width="100%">
              <thead>
                <tr>
                  <th width="50%" class="col-md-6">Titulo</th>
                  <td width="50%" class="col-md-6"><p align="center"><?php echo $titulo;?></p></td>
                </tr>
                <tr>
                  <th width="50%" class="col-md-6">Autor</th>
                  <td width="50%" class="col-md-6"><p align="center"><?php echo $autor;?></td>
                </tr><tr>
                  <th width="50%" class="col-md-6">Fecha de Presentacion</th>
                  <td width="50%" class="col-md-6"><?php echo $fecha_pp;?></p></td>
                </tr><tr>
                  <th width="50%" class="col-md-6">Fase</th>
                  <td width="50%" class="col-md-6"><p align="center"><?php echo $fase;?></p></td>
                </tr>
              </thead>
            </table>
      </div>
    </div>
  </div><!--Termina div cuerpo-->

 </body>
</html>