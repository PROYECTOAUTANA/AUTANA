<?php 
/**
* controlador de bitacora
*/
require_once "app/modelo/bitacora.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Bitacora{
	
	private $obj_bitacora;
	private $obj_rol_modulo;
	
	public function __construct()
	{
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_bitacora = new Modelo_Bitacora();
	}

	public function eliminar_transaccion(){

			session_start();
			$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

			if ($permiso) {
				$id_bitacora = $_GET['id_transaccion'];
				$this->obj_bitacora->set_id($id_bitacora);
				
				$eliminar = $this->obj_bitacora->eliminar();		
				header("location: ?controller=front&action=bitacora");		
			}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=bitacora";</script>';
			}
	}

	public function eliminar_historial(){

			session_start();
			$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

			if ($permiso) {
				
				$eliminar = $this->obj_bitacora->eliminar_todo();		
				header("location: ?controller=front&action=bitacora");		
			}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=bitacora";</script>';
			}
	}

}
?>