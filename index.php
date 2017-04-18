<?php 
/*
**Nuestro FrontController index.php 
**by: Juancho
      YordyJimenez
      YesikaBetancourt
      AlejandroGimenez
**
*/
if(empty($_GET)) {
    require_once "app/controller/front.php";
    $controller=new C_Front();
    $controller->home();

}elseif (isset($_GET['controller']) && $_GET['action']){

    $controller = strtolower($_GET['controller']);
    $action = strtolower($_GET['action']);

    if (file_exists("app/controller/$controller.php")) {
            
        require_once "app/controller/$controller.php";
        $controller = "C_".ucwords($controller);
        $obj_controller = new $controller();
        
            if (method_exists($obj_controller, $action)) {
                $obj_controller->$action();
            }else{
                header("location: ?controller=front&action=notFound");
            }
    }else{
        header("location: ?controller=front&action=notFound");
    }

}
?>



