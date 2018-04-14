<?php if (!$_SESSION) header("location: ?controller=front&action=home");?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?php echo $titulo_de_la_vista; ?></title>
<!-- ******  ARCHIVO DONDE ESTAN TODOS LOS LLAMADOS A JAVASCRIPT Y CSS -->
<?php require_once "secciones/scripts.php"; ?>
<script type="text/javascript">
  

  $( function() {
    $( "#fecha_inicial" ).datepicker({ dateFormat: 'yy/mm/dd' });
  

    $( "#fecha_final" ).datepicker({ dateFormat: 'yy/mm/dd' });
  


    $( "#fecha_inicial_usuario" ).datepicker({ dateFormat: 'yy/mm/dd' });



    $( "#fecha_final_usuario" ).datepicker({ dateFormat: 'yy/mm/dd' });
      
       
  } );
 
</script>
<!--***********************************************************************-->
</head>
<body>
<?php 
include("secciones/navbar.php"); 
include("secciones/menu.php"); 
?>

<style type="text/css">
.nav-tabs-dropdown {
  display: none;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.nav-tabs-dropdown:before {
  content: "\e114";
  font-family: 'Glyphicons Halflings';
  position: absolute;
  right: 30px;
}

@media screen and (min-width: 769px) {
  #nav-tabs-wrapper {
    display: block!important;
  }
}
@media screen and (max-width: 768px) {
    .nav-tabs-dropdown {
        display: block;
    }
    #nav-tabs-wrapper {
        display: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        text-align: center;
    }
   .nav-tabs-horizontal {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
   }
    .nav-tabs-horizontal  > li {
        float: none;
    }
    .nav-tabs-horizontal  > li + li {
        margin-left: 2px;
    }
    .nav-tabs-horizontal > li,
    .nav-tabs-horizontal > li > a {
        background: transparent;
        width: 100%;
    } 
    .nav-tabs-horizontal  > li > a {
        border-radius: 4px;
    }
    .nav-tabs-horizontal  > li.active > a,
    .nav-tabs-horizontal  > li.active > a:hover,
    .nav-tabs-horizontal  > li.active > a:focus {
        color: #ffffff;
        background-color: #428bca;
    }
}
</style>
        <!-- contenido -->
        <div id="contenido">
            <div class="container-fluid" >
                    <div class="contenido_1 col-sm-12" >
                        <h3><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php echo $titulo_de_la_vista; ?></h3>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                                <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
                                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
                                  <li class="active"><a href="#htab1" data-toggle="tab"><i class="glyphicon glyphicon-print"></i>  Trabajos</a></li>
                                  <li><a href="#htab2" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i>   Usuarios</a></li>
                                  <li><a href="#htab3" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i>   Constancias</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="htab1">
                                        <div class="col-sm-12">
                                        <br><br>
                                          <div class="col-sm-12">
                                            <h4><i class="glyphicon glyphicon-print"></i>  Trabajos de Ascenso</h4>
                                          </div>
                                          <div class="col-sm-12">
                                            <form class="form-group" action="?controller=reporte&action=reporte_filtrado_trabajos" method="post" target="_blank" data-toggle="validator">

                                              <div class="form-group col-sm-12">
                                                <label>Seleccione una Linea de investigacion:</label>
                                                <select class="form-control" id="id_linea" name="id_linea"  data-error="seleccione un valor." required>
                                                  <option value="0">todas las lineas</option>
                                                  <?php foreach ($lineas as $linea): ?>
                                                    <option value="<?php echo $linea->id_linea; ?>"><?php echo $linea->linea_nombre; ?></option>
                                                  <?php endforeach ?>
                                                  
                                                </select>
                                                <div class="help-block with-errors"></div>
                                              </div>

                                               <div class="form-group col-sm-12">
                                                <label>Seleccione una fase:</label>
                                                <select class="form-control" id="id_fase" name="id_fase"  data-error="seleccione un valor." required>
                                                  <option value="0">todas las fases</option>
                                                  <?php foreach ($fases as $fase): ?>
                                                    <option value="<?php echo $fase->id_fase; ?>"><?php echo $fase->fase_nombre; ?></option>
                                                  <?php endforeach ?>
                                                  
                                                </select>
                                                <div class="help-block with-errors"></div>
                                              </div> 
                                               
                                             
                                                <div class="col-sm-6 form-group">
                                                  <label>Desde:</label>
                                                  <input type="text" id="fecha_inicial" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required name="desde">
                                                   <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                  <label>Hasta:</label>
                                                  <input type="text" id="fecha_final" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required name="hasta">
                                                   <div class="help-block with-errors"></div>
                                                </div>

                                              <div class="col-sm-12 form-group">
                                                  <input type="submit" name="" class="btn btn-info btn-block">
                                              </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="htab2">
                                        <br>
                                          <div class="col-sm-12">
                                             <h4><i class="fa fa-users" aria-hidden="true"></i>  Usuarios</h4>
                                          </div>
                                          <div class="col-sm-12">
                                            <form class="form-group" action="?controller=reporte&action=reporte_filtrado_usuarios" target="_blank" method="post"  data-toggle="validator">
                                             <div class="form-group col-sm-12">
                                                <label>Seleccione un departamento:</label>
                                                <select class="form-control" id="id_departamento" name="id_departamento"  data-error="seleccione un valor." required>
                                                  <option value="0">todos los departamentos</option>
                                                  <?php foreach ($departamentos as $departamento): ?>
                                                    <option value="<?php echo $departamento->id_departamento; ?>"><?php echo $departamento->departamento_nombre; ?></option>
                                                  <?php endforeach ?>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                              </div> 
                                              <div class="form-group col-sm-12">
                                                <label>Seleccione una categoria:</label>
                                                <select class="form-control" id="id_categoria" name="id_categoria"  data-error="seleccione un valor." required>
                                                  <option value="0">todas las categorias</option>
                                                  <?php foreach ($categorias as $categoria): ?>
                                                    <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->categoria_nombre; ?></option>
                                                  <?php endforeach ?>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                              </div> 
                                               <div class="col-sm-6 form-group">
                                                  <label>Desde:</label>
                                                  <input type="text" id="fecha_inicial_usuario" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required name="desde_usuario">
                                                   <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                  <label>Hasta:</label>
                                                  <input type="text" id="fecha_final_usuario" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required name="hasta_usuario">
                                                   <div class="help-block with-errors"></div>
                                                </div>
                                              <div class="col-sm-12 form-group">
                                                  <input type="submit" name="" class="btn btn-info btn-block">
                                              </div>
                                            </form>
                                          </div>
                                      </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="htab3">
                                        <h3><i class="fa fa-user" aria-hidden="true"></i>  Constancias</h3>
                                        <br>
                                       <div class="col-sm-12">
                                          <form class="form-group" action="?controller=reporte&action=constancia_usuarios" target="_blank" method="post" data-toggle="validator">
                                            <div class="form-group col-sm-12">
                                              <label>Escriba la C.I.:</label>
                                              <input type="text" class="form-control" id="cedula" type="tel" data-minlength="7" data-error="Debe ser mayor a 6 digitos." placeholder="Escriba..." onkeypress="return controltag(event)" required>
                                              <div class="help-block with-errors"></div>
                                            </div>
                                             <div class="form-group col-sm-12">
                                                <label>Seleccione el Tipo de constancia:</label>
                                                <select class="form-control" name="tipoConstancia" name="tipoConstancia" data-error="seleccione un valor." required>
                                                  <option value="">Seleccione</option>
                                                  <option value="tipo1">tipo1</option>
                                                  <option value="tipo2">tipo1</option>
                                                  <option value="tipo3">tipo1</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                              </div>  
                                            <div class="col-sm-12 form-group"> 
                                              <input type="submit" name="" class="btn btn-info btn-block" value="Mostrar">
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                      </div>
            </div>
        </div>
<div class="contenido_2">
    <ul id="minimenu">
      <li>
        <a href="#boton" class="ocultar" id="boton"><span class="glyphicon glyphicon-chevron-left"></span></a>
      </li>
    </ul> 
</div>
<script src="src/js/boton.js"></script>
</body>
</html>





<!--********************* VENTANAS MODALES ...  ******************-->

<!--******************************************************************-->