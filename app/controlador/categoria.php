<?php 
/**
* controlador de categoria
*/
require_once "app/modelo/categoria.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Categoria{
	
	private $obj_categoria;
	private $obj_rol_modulo;
	
	public function __construct()
	{
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_categoria = new Modelo_Categoria();
	}

	public function registrar_categoria(){

			session_start();
			$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

			if ($permiso) {
				
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];

				$this->obj_categoria->set_nombre($nombre);
				$this->obj_categoria->set_descripcion($descripcion);
				$resultados = $this->obj_categoria->insertar();
				
				if (!$resultados) {
					echo '<script>alert("hubo un error en la operacion y no se pudo registrar");</script>';
					echo '<script>window.location.href = "?controller=front&action=categorias";</script>';
				}else{
					echo '<script>alert("operacion exitosa, registrada con exito");</script>';
					echo '<script>window.location.href = "?controller=front&action=categorias";</script>';
				}

			}else{

				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=categorias";</script>';
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

			echo '<script>alert("correcto, datos actualizados");</script>';
			echo '<script>window.location.href = "?controller=front&action=detalles_categoria&id_categoria='.$id_categoria.'";</script>';
	}

	public function eliminar_categoria(){

			session_start();
			$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

			if ($permiso) {
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

						$eliminar = $this->obj_categoria->eliminar();		
						header("location: ?controller=front&action=categorias");
					}
				}		
			}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=categorias";</script>';
			}
	}

}
?>