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
                <?php foreach ($modulos as $modulo): 

                        switch ($modulo['modulo_nombre']) {
                        
                            case 'gestionar trabajos':
                                echo '<li><a href="'.$modulo["url"].'"><span class="glyphicon glyphicon-th-list"></span> '.$modulo["modulo_nombre"].'</a></li>';
                                break;
                            case 'gestionar reportes':
                                echo '<li><a href="'.$modulo["url"].'"><span class="glyphicon glyphicon-print"></span> '.$modulo["modulo_nombre"].'</a></li>';
                                break;
                            case 'mis trabajos':
                                echo '<li><a href="#"><span class="glyphicon glyphicon-th-list"></span> '.$modulo["modulo_nombre"].'</a></li>';
                                break;
                            case 'mis tutorados':
                                echo '<li><a href="#"><span class="glyphicon glyphicon-th-list"></span> '.$modulo["modulo_nombre"].'</a></li>';
                                break;
                            case 'mis trabajos evaluados':
                                echo '<li><a href="#"><span class="glyphicon glyphicon-th-list"></span> '.$modulo["modulo_nombre"].'</a></li>';
                                break;
                            case 'sistema y seguridad':
                                echo '<li class="boton_desplegable">
                                        <a href="#"><i class="glyphicon glyphicon-cog"></i> '.$modulo['modulo_nombre'].'</a>
                                <div class="submenu">
                                    <a href="?controller=front&action=usuarios">Gestionar Usuarios</a>
                                    <a href="?controller=front&action=roles">Gestionar Roles</a>
                                    <a href="?controller=front&action=departamentos">Gestionar Departamentos</a>
                                    <a href="?controller=front&action=categorias">Gestionar Categorias</a>
                                    <a href="?controller=front&action=lineas">Gestionar Lineas de Investigacion</a>
                                    <a href="?controller=front&action=mantenimiento">Mantenimiento</a>
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