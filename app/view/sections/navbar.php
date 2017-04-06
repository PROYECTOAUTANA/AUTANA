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
                    <a href="gestionar-trabajos" class="nav-link"><span class="glyphicon glyphicon-asterisk"></span> Trabajos</a>
                </li>
                <li class="nav-item">
                    <a href="gestionar-usuarios" class="nav-link"><span class="glyphicon glyphicon-education"></span> Usuarios</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" href="http://www.uptaeb.edu.ve/site/" class="nav-link"><span class="glyphicon glyphicon-globe"></span> WebSite</a>
                </li>
          </ul> 
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown nav-item active">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" >
                <span class="glyphicon glyphicon-user"/> <?php echo $_SESSION['user']; ?></a>
              <ul class="dropdown-menu" role="menu">
                <li>          
                    <img src="src/img/usu1.png"  width="100%" height="150">
                </li>
                <li >
                    <a href="#ventana2" data-toggle="modal">Ver Mis datos</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">Modificar Datos</a>
                </li>
                <li>
                    <a href="#">Cambiar contraseña</a>
                </li>
                <li>
                    <a href="#">Cambiar Foto de Perfil</a>
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