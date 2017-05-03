<?php 
/**
* controlador de linea
*/
require_once "app/model/linea.php";

class C_Linea{
	
	private $obj_linea;
	public function __construct()
	{
		$this->obj_linea = new linea();
	}

	public function registrar_linea(){

			$this->obj_linea->set_nombre($_POST['nombre']);
			$resultados = $this->obj_linea->registrar_linea();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=lineas');
			}
	}

}
?>