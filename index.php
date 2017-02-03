<?php
$controller = 'index';
if(!isset($_GET['controller'])) {
    require_once "app/controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}else{
    $controller = strtolower($_GET['controller']);
    if (isset($_GET['action'])) $accion = $_GET['action']; else $accion = 'Index';
    require_once "app/controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $objeto_controller = new $controller;
    call_user_func(array($objeto_controller,$accion));
}
?>
