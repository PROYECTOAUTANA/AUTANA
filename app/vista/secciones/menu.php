<div id="principal">
        <!-- Sidebar -->
        <div id="barra">
                    <ul class="menu">
                        <li class="logotipo">
                             <img src="src/img/lautana.jpg"  alt="...">
                        </li>
                        <li>
                            <a href="?controller=front&action=inicio"><span class="glyphicon glyphicon-home"></span> Inicio</a></a>
                        </li>
                <?php foreach ($_SESSION['modulos'] as $modulo): 

                        switch ($modulo->modulo_nombre) {
                    
                            case 'mis trabajos':
                                echo '<li><a href="?controller=front&action=mis_trabajos"><i class="fa fa-id-card-o" aria-hidden="true"></i> '.$modulo->modulo_nombre.'</a></li>';
                                break;

                            case 'gestionar trabajos':
                                echo '<li><a href="?controller=front&action=trabajos"><i class="fa fa-tasks" aria-hidden="true"></i> '.$modulo->modulo_nombre.'</a></li>';
                                break;
                            case 'gestionar reportes':
                                echo '<li><a href="?controller=front&action=reportes"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> '.$modulo->modulo_nombre.'</a></li>';
                                break;
                            case 'gestion basica':
                                 echo '<li class="boton_desplegable">
                                        <a href="#"><i class="glyphicon glyphicon-cog"></i> '.$modulo->modulo_nombre.'</a>
                                            <div class="submenu">
                                                <a href="?controller=front&action=departamentos">  Departamentos  <i class="fa fa-address-card" aria-hidden="true"></i></a>
                                                <a href="?controller=front&action=categorias">Categorias  <i class="glyphicon glyphicon-tasks"></i></a>
                                                <a href="?controller=front&action=lineas">Lineas de Investigacion  <i class="glyphicon glyphicon-pushpin"></i></a>
                                                <a href="?controller=front&action=fases">Fases  <i class="glyphicon glyphicon-stats"></i></a>
                                            </div>
                                        </li>';
                                break;    
                            case 'seguridad':
                                echo '<li class="boton_desplegable">
                                        <a href="#"><i class="glyphicon glyphicon-cog"></i> '.$modulo->modulo_nombre.'</a>
                                        <div class="submenu">
                                            <a href="?controller=front&action=bitacora">Bitacora  <i class="fa fa-history" aria-hidden="true"></i></a>
                                            <a href="?controller=front&action=usuarios">Usuarios  <i class="fa fa-users" aria-hidden="true"></i></a>
                                            <a href="?controller=front&action=roles">Roles  <i class="fa fa-user" aria-hidden="true"></i></a>
                                            <a href="?controller=front&action=mantenimiento">Mantenimiento  <i class="glyphicon glyphicon-wrench"></i></a>
                                        </div>
                                        </li>';
                                break;    
                        };

                    endforeach ?>
                        <li>
                            <a href="#ventana1" data-toggle="modal"><span class="glyphicon glyphicon-off"></span> Salir</a>
                        </li>
                    </ul>
        </div>