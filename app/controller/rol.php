<?php 
/**
* controlador de trabajos
*/
require_once "app/model/rol.php";
require_once "app/model/rol_modulo.php";

class C_Rol{
	
	private $obj_rol;

	public function __construct()
	{
		$this->obj_rol= new Rol();
		$this->obj_rol_mod = new Rol_Mod();			
	}

	public function nuevo_rol()
	{
		$nombre = $_POST['nombre'];
		
		$id_rol = rand();
		$registrar = $this->obj_rol->registrar_rol($id_rol,$nombre);

		if (!$registrar) {
			echo "error al registrar rol";
		}else{

			$modulo = $_POST['modulos'];
			for($aux=0; $aux<count($modulo); $aux++){
				$id_rol_mod = rand();
				$asignar_modulos = $this->obj_rol_mod->asignar_modulos($id_rol_mod,$id_rol,$modulo[$aux]);
			}	

			header("location: ?controller=front&action=roles");
		}
	}

	
	
}
?>