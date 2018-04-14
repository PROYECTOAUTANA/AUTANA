<?php 
/**
* controlador de linea
*/
require_once "app/modelo/linea.php";
require_once "app/modelo/trabajoLinea.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Linea{

	private $obj_rol_modulo;
	private $obj_linea;
	private $obj_trabajo_linea;
	
	public function __construct()
	{
		$this->obj_linea = new Modelo_linea();
		$this->obj_trabajo_linea = new Modelo_Trabajo_Linea();
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
	}

	public function registrar_linea(){
		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

		if ($permiso) {
			$this->obj_linea->set_nombre($_POST['nombre']);
			$this->obj_linea->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_linea->insertar();
			
			if (!$resultados) {
				echo '<script>alert("error en la operacion... no se pudo registrar esta linea de investigacion");</script>';
				echo '<script>window.location.href = "?controller=front&action=lineas";</script>';
			}else{
				echo '<script>alert("operacion realizada con exito .. linea de investigacion registrada...");</script>';
				echo '<script>window.location.href = "?controller=front&action=lineas";</script>';				
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=lineas";</script>';
		}	
	}

	public function editar_linea(){

			$id_linea = $_POST['id_linea'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			
			$this->obj_linea->set_id($id_linea);
			$this->obj_linea->set_nombre($nombre);
			$this->obj_linea->set_descripcion($descripcion);
			$actualizar = $this->obj_linea->actualizar();
			
			echo '<script>alert("correcto... datos actualizados");</script>';
			echo '<script>window.location.href = "?controller=front&action=detalles_linea&id_linea='.$id_linea.'";</script>';		
	}

	public function eliminar_linea(){

		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

		if ($permiso) {
			$id_linea = $_GET['id_linea'];
			//verificamos si haytrabajos vinculados

			$this->obj_trabajo_linea->set_fk_linea($id_linea);
			$trabajos = $this->obj_trabajo_linea->consultar_linea();

			//si hay trabajos vinculados a este linea no va a poder borrar
			if ($trabajos) {
				echo '<script>alert("no puede borrar esta linea de investigacion porque hay trabajos aun vinculados");</script>';
				echo '<script>window.location.href = "?controller=front&action=lineas";</script>';
			}else{

				if ($id_linea == 1) {
					echo '<script>alert("no puede borrar esta linea de investigacion");</script>';
					echo '<script>window.location.href = "?controller=front&action=lineas";</script>';
				}else{
					$this->obj_linea->set_id($id_linea);
					$eliminar = $this->obj_linea->eliminar();		
					header("location: ?controller=front&action=lineas");
				}
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=lineas";</script>';
		}			
	}

}
?>