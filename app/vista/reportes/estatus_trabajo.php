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
            <th class="col-md-12"><p style="text-align:left; ">Emitido por: <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></p></th>
        </tr>
        <tr>
            <th class="col-md-12"><p style="text-align:left; ">Departamento:  <?php echo $_SESSION['departamento']; ?></p></th>
        </tr>
        </thead>
    </table>

    <div class="col-md-6 col-md-offset-3">
      <hr><p style="text-align:center;"><b>ESTATUS DEL TRABAJO DE ASCENSO</b></p><hr>
    </div>
    <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Datos del trabajo :</div>
          <!-- Table -->
          <?php 
            $titulo = $trabajo_datos->trabajo_titulo;
            $fecha_pp = $trabajo_datos->trabajo_fecha_presentacion;
            $titulo = $trabajo_datos->trabajo_titulo;
            $proceso = $trabajo_datos->trabajo_proceso;
            $fecha_de_registro = $trabajo_datos->trabajo_fecha_registro;
          ?>
            <table class="table" width="100%">
              <thead>
              <tr>
                <th class="col-sm-6">
                 titulo
                </th>
                <th class="col-sm-6">
                  <?php echo $titulo; ?>
                </th>
              </tr>
              <tr>
                <th class="col-sm-6">
                  fecha de presentacion publica
                </th>
                <th class="col-sm-6">
                  <?php echo $fecha_pp; ?>
                </th>
              </tr>
              <tr>
                <th class="col-sm-6">
                  proceso
                </th>
                <th class="col-sm-6">
                  <?php echo $proceso; ?>
                </th>
              </tr>
              <tr>
                <th class="col-sm-6">
                  fecha del registro
                </th>
                <th class="col-sm-6">
                  <?php echo $fecha_de_registro; ?>
                </th>
              </tr>
              </thead>
            </table>
      </div>
    </div>

      <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Fase Actual del Trabajo:</div>
          <!-- Table -->
          <?php 
            $nombre = $fase_datos->fase_nombre;
            $descripcion = $fase_datos->fase_descripcion;
            $fecha_de_asignacion = $fase_datos->trabajo_fase_fecha_registro;
          ?>
            <table class="table" width="100%">
              <thead>
              <tr>
                <th class="col-sm-6">
                  nombre
                </th>
                <th class="col-sm-6">
                  <?php echo $nombre; ?>
                </th>
              </tr>
              <tr>
                <th class="col-sm-6">
                  fecha de asignacion
                </th>
                <th class="col-sm-6">
                  <?php echo $fecha_de_asignacion; ?>
                </th>
              </tr>
              </thead>
            </table>
      </div>
    </div>


      <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Linea de investigacion del Trabajo:</div>
          <!-- Table -->
          <?php 
            $nombre = $linea_datos->linea_nombre;
            $descripcion = $linea_datos->linea_descripcion;
            $fecha_de_asignacion = $linea_datos->trabajo_linea_fecha_registro;
          ?>
            <table class="table" width="100%">
              <thead>
              <tr>
                <th class="col-sm-6">
                  nombre
                </th>
                <th class="col-sm-6">
                  <?php echo $nombre; ?>
                </th>
              </tr>
              <tr>
                <th class="col-sm-6">
                  fecha de asignacion
                </th>
                <th class="col-sm-6">
                  <?php echo $fecha_de_asignacion; ?>
                </th>
              </tr>
              </thead>
            </table>
      </div>
    </div>

    <div class="col-sm-12 contenido">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Docentes del trabajo:</div>
          <!-- Table -->
          <?php if (!$usuarios): ?>
             <p>No hay usuarios asignados a este trabajo aun...</p>
          <?php else: ?>
            <table class="table" width="100%" cellpadding="20px">
              <thead>
                <tr>
                  <th class="col-sm-2">
                    #
                  </th>
                  <th class="col-sm-2">
                   vinculo
                  </th>
                  <th class="col-sm-2">
                  fecha de asignacion
                    
                  </th>
                  <th class="col-sm-2">
                    cedula
                  </th>
                  <th class="col-sm-2">
                    nombre
                  </th>
                  <th class="col-sm-2">
                    apellido
                  </th>
                  <th class="col-sm-2">
                    categoria
                  </th>
                  <th class="col-sm-2">
                    departamento
                  </th>
                </tr>
              </thead>
               <?php 
                  $contador=1;
                  foreach ($usuarios as $usuario):

                  $nombre = $usuario->usuario_nombre;
                  $cedula = $usuario->usuario_cedula;
                  $apellido = $usuario->usuario_apellido;
                  $categoria = $usuario->categoria_nombre;
                  $vinculo = $usuario->vinculo;
                  $fecha_asignacion = $usuario->fecha_de_asignacion;
                  $departamento = $usuario->departamento_nombre;
                ?>
              <tbody>
                <tr>
                  <td class="col-sm-2">
                    <?php echo $contador; ?>
                  </td>
                  <td>
                    <?php echo $vinculo; ?>
                  </td>
                  <td class="col-sm-2">
                  <?php echo $fecha_asignacion; ?>
                    
                  </td>
                  <td class="col-sm-2">
                    <?php echo $cedula; ?>
                  </td>
                  <td class="col-sm-2">
                    <?php echo $nombre; ?>
                  </td>
                  <td class="col-sm-2">
                    <?php echo $apellido; ?>
                  </td>
                  <td>
                    <?php echo $categoria; ?>
                  </td>
                  <td class="col-sm-2">
                    <?php echo $departamento; ?>
                  </td>
                </tr>
              <?php 
              $contador++; 
              endforeach;
              ?>
              </tbody>
            </table>
            <?php endif; ?>
      </div>
    </div>
    <div class="col-sm-12">
        <h5>Observaciones:</h5>
       <?php if ($trabajo_datos->trabajo_estado_actual == "cerrado"): ?>
          
            <p>Este trabajo ha sido cerrado por el sistema , porque llego a su fase de aprobacion y todos los docentes AUTORES que participan en el han sido ascendidos a sus respectivas categorias</p>
            <p>FECHA DEL CIERRE: <?php echo $trabajo_datos->trabajo_fecha_de_cierre; ?></p>
          
       <?php endif ?>
       <?php if ($trabajo_datos->trabajo_estado_actual == ""): ?>
         <p>Sin observaciones, este trabajo aun no esta cerrado... </p>
       <?php endif ?>
   </div>
  </div><!--Termina div cuerpo-->

 </body>
</html>