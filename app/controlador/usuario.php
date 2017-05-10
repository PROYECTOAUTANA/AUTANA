<?php 
/**
* controlador de usuarios
*/
require_once "app/modelo/usuarioDepartamento.php";
require_once "app/modelo/usuarioRol.php";
require_once "app/modelo/usuarioTrabajo.php";
require_once "app/modelo/rolModulo.php";
require_once "app/modelo/usuario.php";
require_once "app/modelo/rol.php";
require_once "libs/phpmailer/class.phpmailer.php";
require_once "libs/phpmailer/class.smtp.php";

class Controlador_Usuario{
	
	private $obj_usuario;
	private $obj_usuario_departamento;
	private $obj_usuario_rol;
	private $obj_usuario_trabajo;
	private $obj_rol_modulo;
	private $obj_mail;
	private $obj_rol;

	public function __construct()
	{
		$this->obj_usuario = new Modelo_Usuario();
		$this->obj_usuario_departamento = new Modelo_Usuario_Departamento();
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_usuario_rol = new Modelo_Usuario_Rol();
		$this->obj_usuario_trabajo = new Modelo_Usuario_Trabajo();
		$this->obj_rol = new Modelo_Rol();
		$this->obj_mail = new PHPMailer();
	}

	public function registrar_usuario(){

			$this->obj_usuario->set_nombre($_POST['nombre']);
			$this->obj_usuario->set_apellido($_POST['apellido']);
			$this->obj_usuario->set_cedula($_POST['cedula']);
			$this->obj_usuario->set_correo($_POST['correo']);
			$this->obj_usuario->set_telefono($_POST['telefono']);
			$this->obj_usuario->set_sexo($_POST['sexo']);
			$this->obj_usuario->set_direccion($_POST['direccion']);
			$this->obj_usuario->set_clave(md5($_POST['clave']));
			$this->obj_usuario->set_fk_categoria($_POST['categoria_actual']);
			$this->obj_usuario->set_estado(1);	

			$resultados = $this->obj_usuario->insertar();
			$ultimo_usuario = $this->obj_usuario->obtener_ultimo_usuario();
			$id_usuario = $ultimo_usuario->ultimo;

			if (!$resultados) {

				echo "error no se inserto";

			}else{

				$this->obj_usuario_rol->set_fk_rol($_POST['rol']);
				$this->obj_usuario_rol->set_fk_usuario($id_usuario);
				$this->obj_usuario_rol->asignar_rol();

				$this->obj_usuario_departamento->set_fk_departamento($_POST['departamento']);
				$this->obj_usuario_departamento->set_fk_usuario($id_usuario);
				$this->obj_usuario_departamento->asignar_departamento();

				header("location: ?controller=front&action=usuarios");
			}
	}

	public function eliminar_usuario(){

			$id_usuario = $_GET['id_usuario'];
			//verificamos si hay trabajos vinculados a el usuario

			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$usuarios = $this->obj_usuario_trabajo->consultar_usuario();

			//si hay usuarios vinculados a este usuario no va a poder borrar
			if ($usuarios) {
				echo '<script>alert("no puede borrar este usuario porque hay usuarios aun vinculados");</script>';
				echo '<script>window.location.href = "?controller=front&action=usuarios";</script>';
			}else{
				$this->obj_usuario->set_id($id_usuario);
				$eliminar = $this->obj_usuario->eliminar();		
				header("location: ?controller=front&action=usuarios");
			}
				
	}

	public function cambiar_estado(){

		$id_usuario = $_GET['id_usuario'];
		$this->obj_usuario->set_id($id_usuario);
		$datos_usuario = $this->obj_usuario->consultar();
		
		if ($datos_usuario->usuario_estado == 0) {
			$this->obj_usuario->set_estado(1);
		}else{
			$this->obj_usuario->set_estado(0);
		}
		$this->obj_usuario->cambiar_estado();

		header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
	}

	public function editar_usuario(){

			$id_usuario = $_POST['id_usuario'];
			//verificamos si hay trabajos vinculados a el usuario

			$this->obj_usuario->set_id($id_usuario);
			$this->obj_usuario->set_nombre($_POST['nombre']);
			$this->obj_usuario->set_apellido($_POST['apellido']);
			$this->obj_usuario->set_correo($_POST['correo']);
			$this->obj_usuario->set_telefono($_POST['telefono']);
			$this->obj_usuario->set_sexo($_POST['sexo']);
			$this->obj_usuario->set_direccion($_POST['direccion']);

			$actualizar = $this->obj_usuario->actualizar();

			if ($actualizar) {
				echo '<script>alert("datos actualizados");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_usuario&id_usuario=$id_usuario";</script>';
			}else{
				echo '<script>alert("datos no actualizados");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_usuario&id_usuario=$id_usuario";</script>';
			}	
	}

	public function cambio_de_departamento(){

			$id_usuario = $_POST['id_usuario'];
			$id_departamento = $_POST['departamento'];

			$this->obj_usuario_departamento->set_fk_usuario($id_usuario);
			$this->obj_usuario_departamento->set_fk_departamento($id_departamento);
			$actualizar = $this->obj_usuario_departamento->actualizar_departamento();

			if ($actualizar) {
				header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
			}			
	}

	public function cambio_de_rol(){

			$id_usuario = $_POST['id_usuario'];
			$id_rol = $_POST['rol'];

			$this->obj_usuario_rol->set_fk_usuario($id_usuario);
			$this->obj_usuario_rol->set_fk_rol($id_rol);
			$actualizar = $this->obj_usuario_rol->actualizar_rol();

			if ($actualizar) {
				header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
			}			
	}

	public function cambio_de_categoria(){

			$id_usuario = $_POST['id_usuario'];
			$id_categoria = $_POST['categoria'];

			$this->obj_usuario->set_id($id_usuario);
			$this->obj_usuario->set_fk_categoria($id_categoria);
			$actualizar = $this->obj_usuario->actualizar_categoria();

			if ($actualizar) {
				header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
			}			
	}

	public function login(){

		$this->obj_usuario->set_nombre($_POST['nombre']);
		$this->obj_usuario->set_clave(md5($_POST['clave']));
		$datos_usuario = $this->obj_usuario->validar_usuario();

		if (!$datos_usuario) {
			
			echo '<script>alert("datos incorrectos");</script>';
				echo '<script>window.location.href = "?controller=front&action=home";</script>';
		}else{

			//obtenemos el id del rol de este usuario
			$this->obj_usuario_rol->set_fk_usuario($datos_usuario->id_usuario);
			$usuario_rol = $this->obj_usuario_rol->consultar_usuario();
			//le enviamos el id del rol a la tabla rol_modulo para verificar si tiene el permiso de iniciar sesion
			$this->obj_rol_modulo->set_fk_rol($usuario_rol->fk_rol);
			$permiso = $this->obj_rol_modulo->consultar_modulo("iniciar sesion");
			
			if ($permiso == 0) {

				echo '<script>alert("no tienes permisos");</script>';
				echo '<script>window.location.href = "?controller=front&action=home";</script>';
			}else{

				if ($datos_usuario->usuario_estado == 0) {
					echo '<script>alert("usuario bloqueado");</script>';
					echo '<script>window.location.href = "?controller=front&action=home";</script>';
				}else{
					$this->obj_rol->set_id($usuario_rol->fk_rol);
					$rol = $this->obj_rol->consultar();

					$this->obj_rol_modulo->set_fk_rol($usuario_rol->fk_rol);
					$modulos = $this->obj_rol_modulo->consultar_rol();

					$this->obj_usuario_departamento->set_fk_usuario($datos_usuario->id_usuario);
					$usuario_departamento = $this->obj_usuario_departamento->consultar_usuario();

					session_start();
					$_SESSION['id']     = $datos_usuario->id_usuario;
					$_SESSION['nombre']   = $datos_usuario->usuario_nombre;
					$_SESSION['modulos'] = $modulos;
					$_SESSION['departamento'] = $usuario_departamento->departamento_nombre;
					$_SESSION['rol']   = $rol->rol_nombre;
					$_SESSION['id_rol']   = $rol->id_rol;

					header("location: ?controller=front&action=inicio");
				}
			}
			

		}
	}

	public function cerrar_sesion(){

		session_start();
		session_destroy();
		header("location: ?controller=front&action=home");
	}
}
?>