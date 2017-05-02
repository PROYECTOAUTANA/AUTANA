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
		$descripcion = $_POST['descripcion'];
		
		$this->obj_rol->set_nombre($nombre);
		$this->obj_rol->set_descripcion($descripcion);
		$this->obj_rol->set_fecha_de_registro("fsddf");
		$registrar = $this->obj_rol->registrar_rol();
		$ultimo_rol = $this->obj_rol->ultimo_rol();
		$id_rol = $ultimo_rol->ultimo;

		if (!$registrar) {
			echo "error al registrar rol";
		}else{

			$id_modulo = $_POST['modulos'];
			for($aux=0; $aux<count($id_modulo); $aux++){

				$this->obj_rol_mod->set_fk_rol($id_rol);
				$this->obj_rol_mod->set_fk_modulo($id_modulo[$aux]);
				$this->obj_rol_mod->set_fecha_de_registro("gfd");
				$asignar_modulos = $this->obj_rol_mod->asignar_modulo();
			}	

			header("location: ?controller=front&action=roles");
		}
	}

	
	
}
?>