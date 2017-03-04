<?php
class IndexController{
    public function Home(){
    	require_once 'app/view/home.php';
    }

    public function Portal(){
    	require_once 'app/view/portal.php';
    }

    public function resetClave(){
    	require_once 'app/view/validar.php';
    }

    public function reestablecer(){
    	require_once 'app/view/reestablecer.php';
    }

    public function nuevoTrabajo(){
        require_once 'app/view/nuevo.trabajo.php';
    }

    public function listarTrabajos(){
        require_once 'app/view/listar.trabajos.php';
    }

    public function editarTrabajo(){
        require_once 'app/view/editar.trabajo.php';
    }
}
?>