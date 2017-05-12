<?php 
/*
**
**by: Juancho
      YordyJimenez
      YesikaBetancourt
      AlejandroGimenez
**
*/

//En caso de que venga no venga ningun valor por request
//cargamos el controlador front lo instanciamos y ejecutamos la accion home
if(empty($_REQUEST)) {
    require_once "app/controlador/front.php";
    $controlador=new Controlador_Front();
    $controlador->home();

}elseif (isset($_REQUEST['controller']) && isset($_REQUEST['action'])){

    //de lo contrario capturamos la variable controlador y la variable accion ponemos todo en minuscula para evitar errores  
    //y guardamos en una variable a cada uno 
    
    $controlador = strtolower($_REQUEST['controller']);
    $accion = strtolower($_REQUEST['action']);
    
    //revisamos si el archivo con el nombre del controlador existe dentro de la carpeta controlador

    if (file_exists("app/controlador/$controlador.php")) {
        
        //cargamos el archivo
        require_once "app/controlador/$controlador.php";
        //ponemos Controlador_ porque todos los controladores comienzan de esa manera
        $controlador = "Controlador_".ucwords($controlador);
        //creamos el objeto controlador
        $obj_controlador = new $controlador();
            //si existe la accion como un metodo dentro de la clase la ejecutamos
            if (method_exists($obj_controlador, $accion)) {
                $obj_controlador->$accion();
            }else{
                //si la accion no existe cargamos la pagina 404
                header("location: ?controller=front&action=notFound");
            }
    }else{

        //si el archivo controlador no existe dentro de la carpeta cargamos la pagina 404
        header("location: ?controller=front&action=notFound");
    }
}

?>



