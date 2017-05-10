<?php 
/**
* controlador de fase
*/
require_once "app/modelo/fase.php";
require_once "app/modelo/trabajoFase.php";

class Controlador_Fase{
	
	private $obj_fase;
	private $obj_trabajo_fase;

	public function __construct()
	{
		$this->obj_fase = new Modelo_Fase();
		$this->obj_trabajo_fase = new Modelo_Trabajo_Fase();
	}

	public function registrar_fase(){

			$this->obj_fase->set_nombre($_POST['nombre']);
			$this->obj_fase->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_fase->insertar();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=fases');
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
					
			header("location: ?controller=front&action=detalles_fase&id_fase=$id_fase");	
	}

	public function eliminar_fase(){

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
	}

}
?>