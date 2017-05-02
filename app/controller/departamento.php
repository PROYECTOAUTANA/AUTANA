<?php 
/**
* controlador de departamento
*/
require_once "app/model/departamento.php";

class C_Departamento{
	
	private $obj_departamento;
	public function __construct()
	{
		$this->obj_departamento = new departamento();
	}

	public function registrar_departamento(){

			$this->obj_departamento->set_nombre($_POST['nombre']);
			$this->obj_departamento->set_fecha_de_registro("02/05/2017");
			$resultados = $this->obj_departamento->registrar_departamento();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=departamentos');
			}
	}

}
?>