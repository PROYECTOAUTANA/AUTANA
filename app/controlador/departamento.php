<?php 
/**
* controlador de departamento
*/
require_once "app/modelo/departamento.php";
require_once "app/modelo/usuarioDepartamento.php";

class Controlador_Departamento{
	
	private $obj_departamento;
	private $obj_usuario_departamento;

	public function __construct()
	{
		$this->obj_departamento = new Modelo_Departamento();
		$this->obj_usuario_departamento = new Modelo_Usuario_Departamento();
	}

	public function registrar_departamento(){

			$this->obj_departamento->set_nombre($_POST['nombre']);
			$this->obj_departamento->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_departamento->insertar();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=departamentos');
			}
	}

	public function editar_departamento(){

			$id_departamento = $_POST['id_departamento'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			
			$this->obj_departamento->set_id($id_departamento);
			$this->obj_departamento->set_nombre($nombre);
			$this->obj_departamento->set_descripcion($descripcion);
			$actualizar = $this->obj_departamento->actualizar();
					
			header("location: ?controller=front&action=detalles_departamento&id_departamento=$id_departamento");	
	}

	public function eliminar_departamento(){

			$id_departamento = $_GET['id_departamento'];
			//verificamos si hay usuarios vinculados

			$this->obj_usuario_departamento->set_fk_departamento($id_departamento);
			$usuarios = $this->obj_usuario_departamento->consultar_departamento();

			//si hay usuarios vinculados a este departamento no va a poder borrar
			if ($usuarios) {
				echo '<script>alert("no puede borrar este departamento porque hay usuarios aun vinculados");</script>';
				echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
			}else{
				$this->obj_departamento->set_id($id_departamento);
				$eliminar = $this->obj_departamento->eliminar();		
				header("location: ?controller=front&action=departamentos");
			}
				
	}

}
?>