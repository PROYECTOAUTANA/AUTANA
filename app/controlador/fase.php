<?php 
/**
* controlador de fase
*/
require_once "app/modelo/fase.php";
require_once "app/modelo/trabajoFase.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Fase{
	
	private $obj_fase;
	private $obj_trabajo_fase;
	private $obj_rol_modulo;

	public function __construct()
	{
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_fase = new Modelo_Fase();
		$this->obj_trabajo_fase = new Modelo_Trabajo_Fase();
	}

	public function registrar_fase(){
		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

		if ($permiso) {
			$this->obj_fase->set_nombre($_POST['nombre']);
			$this->obj_fase->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_fase->insertar();
			
			if (!$resultados) {
				echo '<script>alert("hubo un error... no se pudo insertar esta fase");</script>';
				echo '<script>window.location.href="?controller=front&action=fases";</script>';	
			}else{
				echo '<script>alert("operacion exitosa! registrada con exito...");</script>';
				echo '<script>window.location.href="?controller=front&action=fases";</script>';	
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=fases";</script>';
		}	
	}

	public function editar_fase(){

			$id_fase = $_POST['id_fase'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			
			$this->obj_fase->set_id($id_fase);
			$this->obj_fase->set_nombre($nombre);
			$this->obj_fase->set_descripcion($descripcion);
			$actualizar = $this->obj_fase->actualizar();

			echo '<script>alert("operacion exitosa! datos actualizados...");</script>';
			echo '<script>window.location.href="?controller=front&action=detalles_fase&id_fase='.$id_fase.'";</script>';		
	}

	public function eliminar_fase(){
		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

		if ($permiso) {
			$id_fase = $_GET['id_fase'];
			//verificamos si hay trabajos vinculados

			$this->obj_trabajo_fase->set_fk_fase($id_fase);
			$trabajos = $this->obj_trabajo_fase->consultar_fase();

			//si hay trabajos vinculados a este fase no va a poder borrar
			if ($trabajos) {
				echo '<script>alert("no puede borrar esta fase porque hay trabajos aun vinculados");</script>';
				echo '<script>window.location.href = "?controller=front&action=fases";</script>';
			}else{
				if ($id_fase == 1) {
					echo '<script>alert("no puede borrar esta fase");</script>';
					echo '<script>window.location.href = "?controller=front&action=fases";</script>';
				}else{

					$this->obj_fase->set_id($id_fase);
					$eliminar = $this->obj_fase->eliminar();		
					header("location: ?controller=front&action=fases");
				}
			}		
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=fases";</script>';
		}		
	}

}
?>