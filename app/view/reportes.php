<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}
require_once "sections/head.php"; 
?>
<body>
  <link rel="stylesheet" type="text/css" href="src/css/jquery-ui-data.css">
<?php 
include("sections/cargando.php"); 
include("sections/navbar.php"); 
include("sections/menu.php"); 
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
                        <h1><span class="glyphicon glyphicon-th-large"></span>  <?= $title_view  ?></h1>
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
                                        <br>
                                          <div class="col-sm-12">
                                             <h4><i class="glyphicon glyphicon-print"></i>  Reporte de Trabajos de Ascenso</h4>
                                             </div></br>

                                         <div class="col-sm-4">
                                            <form class="form-group col-sm-8" >
                                              <div class="form-group">
                                                <label>Seleccione una Linea:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="lineas1">linea1</option>
                                                  <option value="lineas2">linea2</option>
                                                  <option value="lineas3">linea3</option>
                                                </select>
                                              </div>
                                            </form>
                                          </div>  

                                          <div class="col-sm-4">
                                            <form class="form-group col-sm-8" >
                                              <div class="form-group">
                                                <label>Seleccione una Fase:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="fase1">Fase1</option>
                                                  <option value="fase2">Fase2</option>
                                                  <option value="fase3">Fase3</option>
                                                </select>
                                              </div>
                                            </form>
                                          </div>  



                                          <div class="col-sm-12">
                                            <form class="form-inline col-sm-12" >
                                              <div class="form-group">
                                              <label>Seleccione La Fecha:</label>
                                                </br>
                                                <label>Desde:</label>
                                                <input type="text" placeholder="dd/mm/aaaa" class="form-control" id="desde">
                                              <div class="form-group">
                                                <label>Hasta:</label>
                                                <input type="text" placeholder="dd/mm/aaaa"  class="form-control" id="hasta">
                                              </div>
                                              <button type="button" class="btn btn-success">Generar Reporte</button>
                                            </form>
                                          </div> </div>



                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="htab2">
                                        <br>
                                          <div class="col-sm-12">
                                             <h4><i class="glyphicon glyphicon-print"></i>  Usuarios</h4>
                                          </div></br>

                                          <div class="col-sm-4">
                                            <form class="form-group col-sm-8" >
                                              <div class="form-group">
                                                <label>Escriba la C.I. del autor:</label>
                                                <input type="text" onkeypress="return controltag(event)" class="form-control" id="cedula">
                                              </div>
                                            </form>
                                          </div>  

                                          <div class="col-sm-4">
                                            <form class="form-group col-sm-8" >
                                              <div class="form-group">
                                                <label>Seleccione el Rol:</label>
                                                <select class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="rol1">Rol1</option>
                                                  <option value="rol2">Rol2</option>
                                                  <option value="rol3">Rol3</option>
                                                </select>
                                              </div>
                                            </form>
                                          </div>  



                                          <div class="col-sm-12">
                                            <form class="form-inline col-sm-12" >
                                              <div class="form-group">
                                              <label>Seleccione La Fecha:</label>
                                                </br>
                                                <label>Desde:</label>
                                                <input type="text" placeholder="dd/mm/aaaa" class="form-control" id="desde1">
                                              <div class="form-group">
                                                <label>Hasta:</label>
                                                <input type="text" placeholder="dd/mm/aaaa"  class="form-control" id="hasta1">
                                              </div>
                                              <button type="button" class="btn btn-success">Generar Reporte</button>
                                            </form>
                                          </div> </div>

                                           

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="htab3">
                                        <h3>Constancias</h3>
                                        <form class="form-group col-sm-12">
                                          <div class="col-sm-6 form-group"> 
                                            <label> Cedula:</label>
                                            <input type="text" onkeypress="return controltag(event)" class="form-control">
                                          </div>
                                          <div class="col-sm-12 form-group"> 
                                            <input type="submit" name="" class="btn btn-info" value="Mostrar">
                                          </div>
                                          
                                        </form>
                                    </div>
                                </div>
                      </div>
            </div>
        </div>
<?php 
include("sections/minimenu.php");
include("sections/modal.php"); 
include("sections/footer2.php");
?>
<script src="src/js/jquery.js"></script>
<script src="src/js/jquery-ui.js"></script>
<script src="src/js/ajax.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/boton.js"></script>
<script src="src/js/fecha.js"></script>
<script src="src/js/hora.js"></script>
<script src="src/js/menuHorizontal.js"></script>



  
  <script>
  $( function() {
    $( "#desde" ).datepicker();
  } );
  </script>

  <script>
  $( function() {
    $( "#hasta" ).datepicker();
  } );
  </script>

  <script>
  $( function() {
    $( "#desde1" ).datepicker();
  } );
  </script>

  <script>
  $( function() {
    $( "#hasta1" ).datepicker();
  } );
  </script>

  <script type="text/javascript">
  function controltag(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        patron =/[0-9\s]/;// -> solo letras
       // patron =/[0-9\s]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
</script>