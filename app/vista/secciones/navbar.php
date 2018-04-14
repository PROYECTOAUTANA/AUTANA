<header>
  <div class="container">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
              <span class="sr-only">Desplegar / Ocultar Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="?controller=front&action=home" class="navbar-brand ">A U T A N A</a>
        </div>
        <div class="collapse navbar-collapse" id="navegacion-fm">
          <ul class="nav navbar-nav navbar-left">
                <li class="nav-item">
                    <a target="_blank" id="item_nav" href="http://www.uptaeb.edu.ve/site/" class="nav-link"> WebSite  <span class="glyphicon glyphicon-globe"></span></a>
                </li> 
                 <li class="nav-item">
                    <a target="_blank" id="item_nav" href="#" class="nav-link"> Ayuda <span class="glyphicon glyphicon-exclamation-sign"></span></a>
                </li> 
          </ul> 
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
                <a href="#" id="contenedorfecha" class="nav-link"> </a>
            </li>
            <li class="nav-item active">
                <a href="#" id="contenedorhora" class="nav-link"> </a>
            </li>
            <li class="dropdown nav-item active">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" >
                <i class="fa fa-user-o" aria-hidden="true">  <?php echo $_SESSION['nombre']; ?></a></i>
              <ul class="dropdown-menu" role="menu">
                <li>          
                    <img src="src/img/usu1.png"  width="100%" height="150">
                </li>
                <li >
                    <a href="#ventana2" data-toggle="modal">Mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="?controller=front&action=mis_trabajos">Mis Trabajos</a>
                </li>
                <li>
                    <a href="#ventana1" data-toggle="modal">Cerrar</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>


<!--********************  MODAL DE MIS DATOS  ******************-->


                  <div class="modal fade" id="ventana2">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <!--HEADER DE LA VENTANA CON EL SIMBOLO DE CERRAR-->
                        <div class="modal-header">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h3 class="modal-title"><i>Mis Datos</i></h3> 
                        </div>
                      <!--TERMINA EL HEADER-->
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                            <div class="text-center">
                              <img src="src/img/usu1.png" alt="..." class="img-rounded" width="20%">
                            </div>
                            <h5>Cedula:  <?php echo $_SESSION['cedula']; ?></h5>
                            <h5>Nombre:  <?php echo $_SESSION['nombre']; ?></h5>
                            <h5>Apellido:  <?php echo $_SESSION['apellido']; ?></h5>
                            <h5>Correo:  <?php echo $_SESSION['correo']; ?></h5>
                        </div>
                      <!--TERMINA EL BODY DE LA VENTANA-->
                        <!--FOOTER DE LA VENTANA-->
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                                <a href="?controller=front&action=mi_perfil" class="btn btn-info">Modificar</a>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> <!--TERMINO EL DIV DEL MODAL MIS DATOS-->

<!--******************************************************************-->



<!--********************* MODAL DE CERRAR SESION******************-->


                   <div class="modal fade" id="ventana1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      <!--CUERPO O BODY DE LA VENTANA-->
                        <div class="modal-body col-sm-12">
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4><i>¿Seguro que desea cerrar sesion?</i></h4>
                        </div><!--TERMINA EL BODY DE LA VENTANA-->
                        <div class="modal-footer"><!--FOOTER DE LA VENTANA-->
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                              <a href="?controller=usuario&action=cerrar_sesion" class="btn btn-info">Si</a>
                            </div>
                          </form>
                        </div><!--TERMINA EL FOOTER-->
                      </div>
                    </div>
                  </div> 



<!--******************************************************************-->