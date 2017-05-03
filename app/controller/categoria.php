<?php 
/**
* controlador de categoria
*/
require_once "app/model/categoria.php";

class C_Categoria{
	
	private $obj_categoria;
	public function __construct()
	{
		$this->obj_categoria = new Categoria();
	}

	public function registrar_categoria(){

			$this->obj_categoria->set_nombre($_POST['nombre']);
			$this->obj_categoria->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_categoria->registrar_categoria();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=categorias');
			}
	}

}
?>