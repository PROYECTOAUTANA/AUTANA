<?php 
/**
* controlador de linea
*/
require_once "app/modelo/linea.php";
require_once "app/modelo/trabajoLinea.php";

class Controlador_Linea{
	
	private $obj_linea;
	private $obj_trabajo_linea;
	
	public function __construct()
	{
		$this->obj_linea = new Modelo_linea();
		$this->obj_trabajo_linea = new Modelo_Trabajo_Linea();
	}

	public function registrar_linea(){

			$this->obj_linea->set_nombre($_POST['nombre']);
			$this->obj_linea->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_linea->insertar();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=lineas');
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
					
			header("location: ?controller=front&action=detalles_linea&id_linea=$id_linea");	
	}

	public function eliminar_linea(){

			$id_linea = $_GET['id_linea'];
			//verificamos si haytrabajos vinculados

			$this->obj_trabajo_linea->set_fk_linea($id_linea);
			$trabajos = $this->obj_trabajo_linea->consultar_linea();

			//si hay trabajos vinculados a este linea no va a poder borrar
			if ($trabajos) {
				echo '<script>alert("no puede borrar esta linea porque hay trabajos aun vinculados");</script>';
				echo '<script>window.location.href = "?controller=front&action=lineas";</script>';
			}else{
				$this->obj_linea->set_id($id_linea);
				$eliminar = $this->obj_linea->eliminar();		
				header("location: ?controller=front&action=lineas");
			}
				
	}

}
?>