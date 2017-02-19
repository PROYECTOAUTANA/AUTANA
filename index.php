<?php
$controller = 'index';
if(!isset($_GET['controller'])) {
    require_once "app/controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Home();    
}else{
    $controller = strtolower($_GET['controller']);
    if (isset($_GET['action'])){
        $accion = $_GET['action'];
    } 
    else{
        $accion = 'Home';
    } 
    require_once "app/controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $objeto_controller = new $controller;
    //aqui para cargar la clase de manera automatica con su accion lo hacemos con call_user_function
    call_user_func(array($objeto_controller,$accion));
}
?>
