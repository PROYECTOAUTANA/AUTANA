<?php 
/**
* controlador de usuarios
*/
require_once "app/model/usuario-departamento.php";
require_once "app/model/usuario-rol.php";
require_once "app/model/rol_modulo.php";
require_once "app/model/usuario.php";
require_once "app/model/rol.php";
require_once "app/model/bitacora-usuario.php";
require_once "libs/phpmailer/class.phpmailer.php";
require_once "libs/phpmailer/class.smtp.php";

class C_Usuario{
	
	private $obj_usuario;
	private $obj_usuario_departamento;
	private $obj_usuario_rol;
	private $obj_rol_modulo;
	private $obj_mail;
	private $obj_rol;
	private $obj_bitacora_usuario;

	public function __construct()
	{
		$this->obj_usuario = new Usuario();
		$this->obj_usuario_departamento = new Usuario_Departamento();
		$this->obj_rol_modulo = new Rol_Mod();
		$this->obj_usuario_rol = new Usuario_Rol();
		$this->obj_rol = new Rol();
		$this->obj_mail = new PHPMailer();
		$this->obj_bitacora_usuario = new Bitacora_Usuario();	
	}

	public function registrar_usuario(){

			$this->obj_usuario->set_nombre($_POST['nombre']);
			$this->obj_usuario->set_apellido($_POST['apellido']);
			$this->obj_usuario->set_cedula($_POST['cedula']);
			$this->obj_usuario->set_correo($_POST['correo']);
			$this->obj_usuario->set_telefono($_POST['telefono']);
			$this->obj_usuario->set_sexo($_POST['sexo']);
			$this->obj_usuario->set_direccion($_POST['direccion']);
			$this->obj_usuario->set_usuario( $_POST['usuario']);
			$this->obj_usuario->set_clave(md5($_POST['clave']));
			$this->obj_usuario->set_fk_categoria($_POST['categoria_actual']);	

			$resultados = $this->obj_usuario->registrar_usuario();
			$ultimo_usuario = $this->obj_usuario->ultimo_usuario();
			$id_usuario = $ultimo_usuario->ultimo;

			if (!$resultados) {

				$id = "";
				$estado = false;
				$mensaje = '<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Error!</strong> Hubo un error en la operacion
					</div>';

			}else{

				$this->obj_usuario_rol->set_fk_rol($_POST['rol']);
				$this->obj_usuario_rol->set_fk_usuario($id_usuario);
				$this->obj_usuario_rol->asignar_rol();

				$this->obj_usuario_departamento->set_fk_departamento($_POST['departamento']);
				$this->obj_usuario_departamento->set_fk_usuario($id_usuario);
				$this->obj_usuario_departamento->asignar_departamento();

				$id = $id_usuario;
				$estado = true;
				$mensaje = "";
			}
			//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
			header('Content-Type: application/json');
			//Guardamos los datos en un array
			$datos = array(
			'id' => $id,
			'estado' => $estado,
			'mensaje' => $mensaje
			);
			//Devolvemos el array pasado a JSON como objeto
			echo json_encode($datos, JSON_FORCE_OBJECT);	

	}

	public function login(){

		$this->obj_usuario->set_usuario($_POST['u']);
		$this->obj_usuario->set_clave(md5($_POST['p']));
		$datos_usuario = $this->obj_usuario->login();

		if (!$datos_usuario) {
			
			$estado = false;
			$mensaje = '<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Error!</strong> Usuario o Contraseña Incorrecto, Vuelva a intentarlo
					</div>';
		}else{

			//obtenemos el id del rol de este usuario
			$this->obj_usuario_rol->set_fk_usuario($datos_usuario->id_usuario);
			$usuario_rol = $this->obj_usuario_rol->rol_de_usuario();
			//le enviamos el id del rol a la tabla rol_modulo para verificar si tiene el permiso de iniciar sesion
			$this->obj_rol_modulo->set_fk_rol($usuario_rol->fk_rol);
			$permiso = $this->obj_rol_modulo->verificar_permiso("iniciar sesion");
			
			if ($permiso == 0) {
	
			  	$estado = false;
			  	$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Error!</strong> Actualmente su Rol de Usuario no posee permiso para acceder al sistema, comuniquese con el administrador del sistema para solicitar permisos</div>';
			}else{

				$estado = true;
				$mensaje = '';

				$this->obj_rol->set_id($usuario_rol->fk_rol);
				$rol = $this->obj_rol->consultar_rol();

				$this->obj_rol_modulo->set_fk_rol($usuario_rol->fk_rol);
				$modulos = $this->obj_rol_modulo->verModulos();
				

				session_start();
				$_SESSION['id']     = $datos_usuario->id_usuario;
				$_SESSION['user']   = $datos_usuario->usuario_usuario;
				$_SESSION['nombre']   = $datos_usuario->usuario_nombre;
				$_SESSION['modulos'] = $modulos;
				$_SESSION['rol']   = $rol->rol_nombre;
				$_SESSION['id_rol']   = $rol->id_rol;

				//registramos la entrada en la bitacora

				$this->obj_bitacora_usuario->set_fk_usuario($_SESSION['id']);
				$this->obj_bitacora_usuario->set_estado(1);
				$this->obj_bitacora_usuario->registrar_bitacora();
			}
			

		}
	
		header('Content-Type: application/json');
		//Guardamos los datos en un array
		$datos = array('estado' => $estado,
						'mensaje' => $mensaje);
		//Devolvemos el array pasado a JSON como objeto
		echo json_encode($datos, JSON_FORCE_OBJECT);
		
	}

	public function cerrar_sesion(){

		session_start();
		$this->obj_bitacora_usuario->set_fk_usuario($_SESSION['id']);
		$this->obj_bitacora_usuario->set_estado(0);
		$this->obj_bitacora_usuario->actualizar_bitacora();
		session_destroy();
		header("location: ?controller=front&action=home");
	}

	public function validar_correo(){

		$email = $_POST['c'];
		$result = $this->obj_usuario->validaCorreo($email);

		//EN DADO CASO DE QUE EL CORREO EXISTA
		if ($result) {
			//TOMAMOS EL ID
			$id_usuario = $result['id_usuario'];
			//CREAMOS LA NUEVA PASS
			$new_pass = rand();
			//ENCRIPTAMOS
			$new_pass_encrypt = md5($new_pass);
			//HACEMOS EL UPDATE
			$cambiar = $this->obj_usuario->cambio_clave($id_usuario,$new_pass_encrypt);
		//SI SE LOGRO EL CAMBIO HARA ESTO
			if ($cambiar) {

					//SI TODO SALIO BIEN EN EL UPDATE SE ENVIARA UN CORREO

					//Librerías para el envío de mail

					//Recibir todos los parámetros del formulario
					$asunto = 'Restablecer Clave de Acceso';
					$cuerpo_mensaje='su nueva clave es  ' .$new_pass;
					$pie_mensaje='<center><br><br><br><br><br><br><b>PERTINENCIA SOCIAL Y PARTICIPACIÓN POPULAR</b></center>';
					$para = $result['usuario_correo'];;
					$asunto = $asunto;
					$mensaje = $cuerpo_mensaje.$pie_mensaje;

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

					//Avisar si fue enviado o no el correo
					if($this->obj_mail->Send())
					{
						echo'<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Operacion Exitosa!</strong> Le hemos enviado un correo con su nueva contraseña
					</div>';
					}
					else{
						echo'<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Warning!</strong> experimentamos un error al enviar el correo con la nueva clave, verifique su conexion a internet
					</div>';
					}
			}else{

				//ESTE MENSAJE SERA EN CASO DE QUE EL UPDATE NO FUNCIONE
				echo'<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Error!</strong> Clave no se pudo cambiar...</div>';
			}



		}else{


		//ESTE MENSAJE SERA EN DADO CASO QUE EL CORREO NO EXISTA
		echo'<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Error!</strong> Direccion de correo electronico no encontrada...</div>';
		}
	}


}
?>