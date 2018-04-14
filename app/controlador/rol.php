<?php 
/**
* controlador de trabajos
*/

require_once "app/modelo/rol.php";
require_once "app/modelo/usuarioRol.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Rol{
	
	private $obj_rol;
	private $obj_rol_modulo;

	public function __construct()
	{
		$this->obj_rol = new Modelo_Rol();
		$this->obj_usuario_rol = new Modelo_Usuario_Rol();
		$this->obj_rol_modulo = new Modelo_Rol_Mod();	

	}

	public function nuevo_rol(){

		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

		if ($permiso) {
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			
			$this->obj_rol->set_nombre($nombre);
			$this->obj_rol->set_descripcion($descripcion);
			$registrar = $this->obj_rol->insertar();
			$ultimo_rol = $this->obj_rol->obtener_ultimo_rol();
			$id_rol = $ultimo_rol->ultimo;

			if (!$registrar) {
				echo '<script>alert("error en la operacion... no se pudo registrar el rol de usuario");</script>';
				echo '<script>window.location.href="?controller=front&action=roles;</script>';
			}else{

				$id_modulo = $_POST['modulos'];
				for($aux=0; $aux<count($id_modulo); $aux++){

					$this->obj_rol_modulo->set_fk_rol($id_rol);
					$this->obj_rol_modulo->set_fk_modulo($id_modulo[$aux]);
					$asignar_modulos = $this->obj_rol_modulo->asignar_modulo();
				}	
				echo '<script>alert("correcto... rol registrado con exito");</script>';
				echo '<script>window.location.href="?controller=front&action=roles";</script>';
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=roles";</script>';
		}
	}

	public function editar_rol(){

			$id_rol = $_POST['id_rol'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];

			if (!isset($_POST['modulos'])) {
				echo '<script>alert("Debe seleccionar por lo menos un modulo");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_rol&id_rol='.$id_rol.'";</script>';
			}else{
				$this->obj_rol->set_id($id_rol);
			$this->obj_rol->set_nombre($nombre);
			$this->obj_rol->set_descripcion($descripcion);
			$actualizar = $this->obj_rol->actualizar();

			//vaciamos la tabla rol_modulo para asignarle los nuevos permoisos
			$this->obj_rol_modulo->set_fk_rol($id_rol);
			$this->obj_rol_modulo->eliminar();

			$id_modulo = $_POST['modulos'];
			
			for($aux=0; $aux<count($id_modulo); $aux++){

				$this->obj_rol_modulo->set_fk_rol($id_rol);
				$this->obj_rol_modulo->set_fk_modulo($id_modulo[$aux]);
				$asignar_modulos = $this->obj_rol_modulo->asignar_modulo();
			}
			echo '<script>alert("correcto... datos del rol de usuario actualizados");</script>';
			echo '<script>window.location.href="?controller=front&action=detalles_rol&id_rol='.$id_rol.'";</script>';		
			}	
	}

	public function eliminar_rol(){

		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

		if ($permiso) {
			$id_rol = $_GET['id_rol'];
			//verificamos si hay usuarios vinculados

			$this->obj_usuario_rol->set_fk_rol($id_rol);
			$usuarios = $this->obj_usuario_rol->consultar_rol();

			//si hay trabajos vinculados a este linea no va a poder borrar
			if ($usuarios) {
				echo '<script>alert("no puede borrar este rol porque existen usuarios haciendo uso de el actualmente");</script>';
				echo '<script>window.location.href = "?controller=front&action=roles";</script>';
			}else{

				if ($id_rol == 1) {
					echo '<script>alert("no puede borrar este rol de usuario");</script>';
					echo '<script>window.location.href = "?controller=front&action=roles";</script>';
				}else{
					$this->obj_rol->set_id($id_rol);
					$rol = $this->obj_rol->eliminar();		
					header("location: ?controller=front&action=roles");
				}
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=roles";</script>';
		}		
	}
}
?>