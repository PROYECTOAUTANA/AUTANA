<?php 
/**
* controlador de categoria
*/
require_once "app/modelo/categoria.php";

class Controlador_Categoria{
	
	private $obj_categoria;
	public function __construct()
	{
		$this->obj_categoria = new Modelo_Categoria();
	}

	public function registrar_categoria(){

			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];

			$this->obj_categoria->set_nombre($nombre);
			$this->obj_categoria->set_descripcion($descripcion);
			$resultados = $this->obj_categoria->insertar();
			
			if (!$resultados) {
				echo "error";
			}else{
				header('location: ?controller=front&action=categorias');
			}
	}

	public function editar_categoria(){

			$id_categoria = $_POST['id_categoria'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			
			$this->obj_categoria->set_id($id_categoria);
			$this->obj_categoria->set_nombre($nombre);
			$this->obj_categoria->set_descripcion($descripcion);
			$actualizar = $this->obj_categoria->actualizar();
					
			header("location: ?controller=front&action=detalles_categoria&id_categoria=$id_categoria");	
	}

	public function eliminar_categoria(){

			$id_categoria = $_GET['id_categoria'];
			
			//verificamos si esta categoria tiene usuarios que dependen de ella

			$this->obj_categoria->set_id($id_categoria);
			$usuarios = $this->obj_categoria->ver_usuarios();

			//si hay usuarios que dependen de ella no la eliminara
			if ($usuarios) {
				echo '<script>alert("no puede borrar esta categoria porque hay usuarios aun vinculados a ella");</script>';
				echo '<script>window.location.href = "?controller=front&action=categorias";</script>';
			}else{

				if ($id_categoria == 1) {
					echo '<script>alert("no puede borrar esta categoria!");</script>';
					echo '<script>window.location.href = "?controller=front&action=categorias";</script>';
				}else{

					$this->obj_categoria->set_id($id_categoria);
					$eliminar = $this->obj_categoria->eliminar();		
					header("location: ?controller=front&action=categorias");
				}
			}		
	}

}
?>