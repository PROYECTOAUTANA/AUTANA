<?php 
/**
* controlador de trabajos
*/
require_once "app/model/rol.php";

class C_Rol{
	
	private $obj_rol;

	public function __construct()
	{
		$this->obj_rol= new Rol();			
	}

	
	
}
?>