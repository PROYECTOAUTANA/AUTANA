<?php session_start(); ?>
<?php if (!$_SESSION) header("location: ?controller=front&action=home");?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="src/img/iautana.ico" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- ******  ARCHIVO DONDE ESTAN TODOS LOS LLAMADOS A JAVASCRIPT Y CSS -->
<?php require_once "secciones/scripts.php"; ?>
<script type="text/javascript">
  
  $( function() {
    $( "#fecha_inicial" ).datepicker();
  } );


  $( function() {
    $( "#fecha_final" ).datepicker();
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
                        <h3><span class="glyphicon glyphicon-th-large"></span>  <?php echo $titulo_de_la_vista; ?></h3>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                                <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
                                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
                                  <li class="active"><a href="#htab1" data-toggle="tab"><i class="glyphicon glyphicon-print"></i>  Trabajos</a></li>
                                  <li><a href="#htab2" data-toggle="tab"><i class="glyphicon glyphicon-print"></i>   Usuarios</a></li>
                                  <li><a href="#htab3" data-toggle="tab"><i class="glyphicon glyphicon-print"></i>   Constancias</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="htab1">
                                        <div class="col-sm-12">
                                        <br><br>
                                          <div class="col-sm-12">
                                            <h4><i class="glyphicon glyphicon-print"></i>  Trabajos de Ascenso</h4>
                                          </div>
                                          <div class="col-sm-12">
                                            <form class="form-group">

                                              <div class="form-group col-sm-12">
                                                <label>Seleccione una Linea:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="lineas1">linea1</option>
                                                  <option value="lineas2">linea2</option>
                                                  <option value="lineas3">linea3</option>
                                                </select>
                                              </div>

                                              <div class="form-group col-sm-12">
                                                <label>Seleccione una Fase:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="fase1">Fase1</option>
                                                  <option value="fase2">Fase2</option>
                                                  <option value="fase3">Fase3</option>
                                                </select>
                                              </div>  
                                               
                                                
                                              <div class="form-group col-sm-12">
                                                <div class="col-sm-6">
                                                  <label>Desde:</label>
                                                  <input type="text" id="fecha_inicial" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required id="desde">
                                                   <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="col-sm-6">
                                                  <label>Hasta:</label>
                                                  <input type="text" id="fecha_final" class="form-control" data-error="Por favor introduzca una fecha." placeholder="DD/MM/AAAA" required id="hasta">
                                                   <div class="help-block with-errors"></div>
                                                </div>
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
                                             <h4><i class="glyphicon glyphicon-print"></i>  Usuarios</h4>
                                          </div>
                                          <div class="col-sm-12">
                                            <form class="form-group">
                                              <div class="form-group col-sm-12">
                                                <label>Seleccione el Rol:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="rol1">Rol1</option>
                                                  <option value="rol2">Rol2</option>
                                                  <option value="rol3">Rol3</option>
                                                </select>
                                              </div>  
                                              <div class="form-group col-sm-12">
                                                <label>Seleccione el Departamento:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="dpto1">dpto1</option>
                                                  <option value="dpto2">dpto2</option>
                                                  <option value="dpto3">dpto3</option>
                                                </select>
                                              </div> 
                                              <div class="form-group col-sm-12">
                                                <label>Seleccione la categoria:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="categoria1">categoria1</option>
                                                  <option value="categoria2">categoria2</option>
                                                  <option value="categoria3">categoria3</option>
                                                </select>
                                              </div>  
                                              <div class="form-group col-sm-12">
                                                <div class="col-sm-6">
                                                  <label>Desde:</label>
                                                  <input type="text" placeholder="dd/mm/aaaa" class="form-control" id="desde1">
                                                </div>
                                                <div class="col-sm-6">
                                                  <label>Hasta:</label>
                                                  <input type="text" placeholder="dd/mm/aaaa"  class="form-control" id="hasta1">
                                                </div>
                                              </div>
                                              <div class="col-sm-12 form-group">
                                                  <input type="submit" name="" class="btn btn-info btn-block">
                                              </div>
                                            </form>
                                          </div>
                                      </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="htab3">
                                        <h3>Constancias</h3>
                                        <br>
                                       <div class="col-sm-12">
                                          <form class="form-group">
                                            <div class="form-group col-sm-12">
                                              <label>Escriba la C.I.:</label>
                                              <input type="text" class="form-control" id="cedula">
                                            </div>
                                             <div class="form-group col-sm-12">
                                                <label>Seleccione el Tipo de constancia:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="tipo">tipo1</option>
                                                  <option value="tipo">tipo1</option>
                                                  <option value="tipo">tipo1</option>
                                                </select>
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