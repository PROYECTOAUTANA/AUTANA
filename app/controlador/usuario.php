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
require_once "app/modelo/trabajo.php";
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
	private $obj_trabajo;

	public function __construct()
	{
		$this->obj_usuario = new Modelo_Usuario();
		$this->obj_usuario_departamento = new Modelo_Usuario_Departamento();
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_usuario_rol = new Modelo_Usuario_Rol();
		$this->obj_usuario_trabajo = new Modelo_Usuario_Trabajo();
		$this->obj_rol = new Modelo_Rol();
		$this->obj_mail = new PHPMailer();
		$this->obj_trabajo = new Modelo_Trabajo();
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

				header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
			}
	}

	public function buscar_usuario(){

			$filtro = $_POST['filtro'];

			$resultado = $this->obj_usuario->buscar($filtro);
			
			if(!$resultado){
				echo 'No hay sugerencias para: <b>'.$filtro."</b>...";
			}else{

				$cantidad = count($resultado);
				echo '<br>'.$cantidad.'  Sugerencia(s) encontrada(s) para: <b>'.$filtro.'</b><br />';
				require_once "app/vista/resultado-busqueda-usuario.php";
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


			//consultar si este usuario es autor en algun trabajo y si ese trabajo esta en fase de aprobacion 
			//de esta forma verificamnos si puede o no ascender 
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$resultado = $this->obj_usuario_trabajo->trabajos_aprobados_como_autor();

			if (!$resultado) {
				//EL USUARIO NO POSEE NINGUN TRABAJO EN APROBACION COMO AUTOR
				echo "este usuario NO posee ningun trabajo EN APROBACION COMO AUTOR";
			}else{
				
				$this->obj_usuario->set_id($id_usuario);
				$this->obj_usuario->set_fk_categoria($id_categoria);
				$this->obj_usuario->actualizar_categoria();
					
				$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
				$this->obj_usuario_trabajo->set_fk_trabajo($resultado->id_trabajo);
				$this->obj_usuario_trabajo->set_vinculo("autor ascendido");
				$this->obj_usuario_trabajo->actualizar_vinculo();


				$this->obj_usuario_trabajo->set_fk_trabajo($resultado->id_trabajo);
				$resultado_autores = $this->obj_usuario_trabajo->consultar_trabajo();

				foreach ($resultado_autores as $trabajo) {

					if ($trabajo->vinculo == "autor") {
						header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
					}else{
						//echo "este trabajo se cerrara porque todos los autores ya fueron ascendidos";
						$this->obj_trabajo->set_id($resultado->id_trabajo);
						$this->obj_trabajo->cerrar_trabajo();
						header("location: ?controller=front&action=detalles_usuario&id_usuario=$id_usuario");
					}
				}

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
					$_SESSION['apellido']   = $datos_usuario->usuario_apellido;
					$_SESSION['cedula']   = $datos_usuario->usuario_cedula;
					$_SESSION['direccion']   = $datos_usuario->usuario_direccion;
					$_SESSION['sexo']   = $datos_usuario->usuario_sexo;
					$_SESSION['telefono']   = $datos_usuario->usuario_telefono;
					$_SESSION['correo']   = $datos_usuario->usuario_correo;
					$_SESSION['modulos'] = $modulos;
					$_SESSION['departamento'] = $usuario_departamento->departamento_nombre;
					$_SESSION['rol']   = $rol->rol_nombre;
					$_SESSION['id_rol']   = $rol->id_rol;

					header("location: ?controller=front&action=inicio");
				}
			}
			

		}
	}

	public function correo($asunto = '',$cuerpo = '',$pie = '',$para = ''){

		$asunto = $asunto;
		$mensaje = $cuerpo.$pie;

		//Este bloque es importante			
		$this->obj_mail->IsSMTP();
		$this->obj_mail->SMTPAuth = true;
		$this->obj_mail->SMTPSecure = "ssl";
		$this->obj_mail->Host = "smtp.gmail.com";
		$this->obj_mail->Port =  465;
		//Nuestra cuenta
		$this->obj_mail->Username ='juaneliezer13@gmail.com';
		$this->obj_mail->Password = '25627918';
		//Agregar destinatario
		$this->obj_mail->AddAddress($para);
		$this->obj_mail->Subject = $asunto;
		$this->obj_mail->Body = $mensaje;
		//Para adjuntar archivo
		$this->obj_mail->MsgHTML($mensaje);
		if($this->obj_mail->Send()) $resultado = true;
		else $resultado = false;

		return $resultado;
	}

	public function reestablecer_clave(){

		$email = $_POST['correo'];
		$this->obj_usuario->set_correo($email);
		$result = $this->obj_usuario->validar_correo();

		if ($result) {
			
			$id_usuario = $result->id_usuario;
			$nueva_clave = rand();
			$nueva_clave_encriptada = md5($nueva_clave);

			$asunto = 'Restablecer Clave de Acceso';
			$cuerpo_mensaje='Su nueva clave es:  ' .$nueva_clave;
			$pie_mensaje='<center><br><br><br><br><br><br><b>PERTINENCIA SOCIAL Y PARTICIPACIÓN POPULAR</b></center>';
			$para = $result->usuario_correo;
			$resultado_envio = Controlador_Usuario::correo($asunto,$cuerpo_mensaje,$pie_mensaje,$para);
					
				if($resultado_envio){
					echo'<script>alert("correcto, le hemos enviado un correo con su nueva clave...")</script>';
					//HACEMOS EL UPDATE
					$this->obj_usuario->set_id($id_usuario);
					$this->obj_usuario->set_clave($nueva_clave_encriptada);
					$cambiar = $this->obj_usuario->cambiar_clave();

					//echo '<script>window.location.href = "?controller=front&action=home";</script>';
				}else{
					echo'<script>alert("El servidor experimenta errores a la hora de enviar su correo por favor intente mas tarde o revise su conexion a Internet...")</script>';
					echo '<script>window.location.href = "?controller=front&action=home";</script>';
				}
		}else{

			//ESTE MENSAJE SERA EN DADO CASO QUE EL CORREO NO EXISTA
			echo'<script>alert("Direccion de correo electronico no encontrada...")</script>';

			echo '<script>window.location.href = "?controller=front&action=home";</script>';
		}
	}

	public function cambio_de_clave(){

		$id_usuario = $_POST['id_usuario'];
		$clave_vieja = $_POST['clave_vieja'];
		$clave_nueva = $_POST['clave_nueva'];

		$this->obj_usuario->set_clave(md5($clave_vieja));
		$resultado_clave = $this->obj_usuario->consultar_clave();

		if ($resultado_clave) {
			$nueva_clave_encriptada = md5($clave_nueva);
			$this->obj_usuario->set_id($id_usuario);
			$this->obj_usuario->set_clave($nueva_clave_encriptada);
			$cambiar = $this->obj_usuario->cambiar_clave();

			echo'<script>alert("Clave cambiada satisfactoriamente...")</script>';
		}else{
			echo'<script>alert("Clave la clave actual ingresada es incorrecta...")</script>';
		}

		

	}

	public function cerrar_sesion(){

		session_start();
		session_destroy();
		header("location: ?controller=front&action=home");
	}
}
?>