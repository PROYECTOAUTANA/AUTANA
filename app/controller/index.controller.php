<?php
class IndexController{
    function Index(){
    	require_once 'app/view/home.html';
    }

    function portalAdmin(){
    	require_once 'app/view/portal_admin.php';
    }

    function Portal(){
    	require_once 'app/view/portal.php';
    }

    function resetClave(){
    	require_once 'app/view/validar.php';
    }

    function reestablecer(){
    	require_once 'app/view/reestablecer.php';
    }
}
?>