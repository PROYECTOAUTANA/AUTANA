<?php 
/**
* controlador de usuarios
*/
require_once "app/model/usuario-rol.php";

class C_UsuarioRol{
	
	private $obj_usuario_rol;

	public function __construct()
	{
		$this->obj_usuario_rol = new Usuario_Rol();
			
	}

	public function cambiar_rol(){
		
		$id_usuario = $_POST['id_usuario'];
		$id_rol = $_POST['rol'];
	
		$operacion = $this->obj_usuario_rol->cambiar_de_rol($id_usuario,$id_rol);

		if ($operacion) {
			header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
		}else{

			echo "error";
		}
	}

}
?>