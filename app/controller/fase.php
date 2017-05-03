<?php 
/**
* controlador de fase
*/
require_once "app/model/fase.php";

class C_Fase{
	
	private $obj_fase;
	public function __construct()
	{
		$this->obj_fase = new fase();
	}

	public function registrar_fase(){

			$this->obj_fase->set_nombre($_POST['nombre']);
			$resultados = $this->obj_fase->registrar_fase();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=fases');
			}
	}

}
?>