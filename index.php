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
    require_once "app/controller/home.php";
}elseif (isset($_GET['controller'])){

    $controller = strtolower($_GET['controller']);

    if (file_exists("app/controller/$controller.php")) {
            
            require_once "app/controller/$controller.php";
    }else{
        header("location: 404");
    }
}
?>


