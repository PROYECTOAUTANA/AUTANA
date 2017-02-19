<?php
class IndexController{
    public function Home(){
    	require_once 'app/view/home.html';
    }

    public function portalAdmin(){
    	require_once 'app/view/portal_admin.php';
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
}
?>