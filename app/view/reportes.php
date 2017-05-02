<?php 
session_start();
if(!$_SESSION){
    header("location: ?controller=front&action=home");
}
require_once "sections/head.php"; 
?>
<body>
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
                                          <div class="col-sm-8">
                                             <h4><i class="glyphicon glyphicon-print"></i>  Reporte de Trabajos de Ascenso</h4>
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="dropdown">
                                              <button class="btn btn-info btn-block dropdown-toggle" type="button" data-toggle="dropdown">Organizar Por
                                              <span class="caret"></span></button>
                                              <ul class="dropdown-menu">
                                                <li><a href="#" id="fecha">Fecha</a></li>
                                                <li><a href="#" id="fase">Fase</a></li>
                                                <li><a href="#" id="autor">Autor</a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1" >

                                          <div class="tipo1" style="margin-top:70px;text-align:center;display:none;">
                                            <form class="form-inline col-sm-12" >
                                              <div class="form-group">
                                                <label for="desde">Desde:</label>
                                                <input type="date" class="form-control" id="desde">
                                              </div>
                                              <div class="form-group">
                                                <label for="hasta">Hasta:</label>
                                                <input type="date" class="form-control" id="hasta">
                                              </div>
                                              <button type="button" class="btn btn-info">Mostrar</button>
                                            </form>
                                          </div>  
                                          
                                           <div class="tipo2" style="margin-top:70px;display:none;">
                                            <form class="form-group col-sm-12" >
                                              <div class="form-group">
                                                <label for="desde">Seleccione una Fase:</label>
                                                <select id="fases" class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="fases1">fases1</option>
                                                  <option value="fases2">fases2</option>
                                                  <option value="fases3">fases3</option>
                                                </select>
                                              </div>
                                              <button type="button" class="btn btn-info">Mostrar</button>
                                            </form>
                                          </div>  

                                           <div class="tipo3" style="margin-top:70px;display:none;">
                                            <form class="form-group col-sm-12" >
                                              <div class="form-group">
                                                <label for="desde">Escriba la C.I. del autor:</label>
                                                <input type="text" class="form-control" id="desde">
                                              </div>
                                              <button type="button" class="btn btn-info">Mostrar</button>
                                            </form>
                                          </div>  


                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="htab2">
                                        <br>
                                          <div class="col-sm-8">
                                             <h4><i class="glyphicon glyphicon-print"></i>  Usuarios</h4>
                                          </div>
                                          <div class="col-sm-4">
                                            <div class="dropdown">
                                              <button class="btn btn-info btn-block dropdown-toggle" type="button" data-toggle="dropdown">Organizar Por
                                              <span class="caret"></span></button>
                                              <ul class="dropdown-menu">
                                                <li><a href="#" id="fecha2">Fecha</a></li>
                                                <li><a href="#" id="categoria">Categorias</a></li>
                                                <li><a href="#" id="departamento">Departamentos</a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1" >

                                          <div class="tipo1" style="margin-top:70px;text-align:center;display:none;">
                                            <form class="form-inline col-sm-12" >
                                              <div class="form-group">
                                                <label for="desde">Desde:</label>
                                                <input type="date" class="form-control" id="desde">
                                              </div>
                                              <div class="form-group">
                                                <label for="hasta">Hasta:</label>
                                                <input type="date" class="form-control" id="hasta">
                                              </div>
                                              <button type="button" class="btn btn-info">Mostrar</button>
                                            </form>
                                          </div>  
                                          
                                           <div class="tipo2" style="margin-top:70px;display:none;">
                                            <form class="form-group col-sm-12" >
                                              <div class="form-group">
                                                <label for="desde">Seleccione un Categoria</label>
                                                <select id="categoria" class="form-control">
                                                  <option>Seleccione</option>
                                                  <option value="Categoria1">Categoria1</option>
                                                  <option value="Categoria2">Categoria2</option>
                                                  <option value="Categoria3">Categoria3</option>
                                                </select>
                                              </div>
                                              <button type="button" class="btn btn-info">Mostrar</button>
                                            </form>
                                          </div>  

                                           <div class="tipo3" style="margin-top:70px;display:none;">
                                            <form class="form-group col-sm-12" >
                                              <div class="form-group">
                                                <label for="desde">Escriba la C.I. del autor:</label>
                                                <input type="text" class="form-control" id="desde">
                                              </div>
                                              <button type="button" class="btn btn-info">Mostrar</button>
                                            </form>
                                          </div>  

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="htab3">
                                        <h3>Constancias</h3>
                                        <form class="form-group col-sm-12">
                                          <div class="col-sm-6 form-group"> 
                                            <label> Cedula:</label>
                                            <input type="text" name="" class="form-control">
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
<script src="src/js/ajax.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/cargando.js"></script>
<script src="src/js/boton.js"></script>
<script src="src/js/fecha.js"></script>
<script src="src/js/hora.js"></script>
<script src="src/js/menuHorizontal.js"></script>
</body>
</html> 

<script type="text/javascript">
  $(document).ready(function() {
    
    $("#fecha").click(function(event) {
      
      $(".tipo1").fadeIn();
      $(".tipo2").hide();
      $(".tipo3").hide();
      
    });
    $("#fase").click(function(event) {
      
      $(".tipo2").fadeIn();
      $(".tipo1").hide();
      $(".tipo3").hide();
      
    });
    $("#autor").click(function(event) {
      
      $(".tipo3").fadeIn();
      $(".tipo1").hide();
      $(".tipo2").hide();
      
    });

    $("#fecha2").click(function(event) {
      
      $(".tipo1").fadeIn();
      $(".tipo2").hide();
      $(".tipo3").hide();
      
    });
    $("#categoria").click(function(event) {
      
      $(".tipo2").fadeIn();
      $(".tipo1").hide();
      $(".tipo3").hide();
      
    });
    $("#departamento").click(function(event) {
      
      $(".tipo3").fadeIn();
      $(".tipo1").hide();
      $(".tipo2").hide();
      
    });

  });
</script>