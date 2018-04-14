<?php 
/**
* controlador de departamento
*/
require_once "app/modelo/departamento.php";
require_once "app/modelo/usuarioDepartamento.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Departamento{
	
	private $obj_departamento;
	private $obj_usuario_departamento;
	private $obj_rol_modulo;

	public function __construct()
	{
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_departamento = new Modelo_Departamento();
		$this->obj_usuario_departamento = new Modelo_Usuario_Departamento();
	}

	public function registrar_departamento(){

		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

		if ($permiso) {

			$this->obj_departamento->set_nombre($_POST['nombre']);
			$this->obj_departamento->set_descripcion($_POST['descripcion']);
			$resultados = $this->obj_departamento->insertar();
				
			if (!$resultados) {
				echo '<script>alert("operacion exitosa...");</script>';
				echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
			}else{
				echo '<script>alert("error en la operacion.. no se pudo registrar este departamento");</script>';
				echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
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
			
			echo '<script>alert("correcto, datos actualizados");</script>';
			echo '<script>window.location.href="?controller=front&action=detalles_departamento&id_departamento='.$id_departamento.'";</script>';		
	}

	public function eliminar_departamento(){

		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

		if ($permiso) {

			$id_departamento = $_GET['id_departamento'];
			//verificamos si hay usuarios vinculados

			$this->obj_usuario_departamento->set_fk_departamento($id_departamento);
			$usuarios = $this->obj_usuario_departamento->consultar_departamento();

			//si hay usuarios vinculados a este departamento no va a poder borrar
			if ($usuarios) {
				echo '<script>alert("no puede borrar este departamento porque hay usuarios aun vinculados");</script>';
				echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
			}else{

				if ($id_departamento == 1) {
					echo '<script>alert("no puede borrar este departamento");</script>';
					echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
				}else{

					$this->obj_departamento->set_id($id_departamento);
					$eliminar = $this->obj_departamento->eliminar();		
					header("location: ?controller=front&action=departamentos");
				}
			}
		}else{
			echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
			echo '<script>window.location.href = "?controller=front&action=departamentos";</script>';
		}		
	}

}
?>