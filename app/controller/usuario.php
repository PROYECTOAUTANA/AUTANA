<?php 
/**
* controlador de usuarios
*/
require_once "app/model/departamento.php";
require_once "app/model/usuario-departamento.php";
require_once "app/model/rol.php";
require_once "app/model/usuario-rol.php";
require_once "app/model/usuario.php";
require_once "libs/class.phpmailer.php";
require_once "libs/class.smtp.php";
require_once "app/model/usuario.php";

class C_Usuario{
	
	private $obj_usuario;
	private $obj_departamento;
	private $obj_usuario_departamento;
	private $obj_usuario_rol;
	private $obj_rol;
	private $obj_mail;

	public function __construct()
	{
		$this->obj_usuario = new Usuario();
		$this->obj_departamento = new Departamento();
		$this->obj_rol = new Rol();	
		$this->obj_usuario_departamento = new Usuario_Departamento();
		$this->obj_usuario_rol = new Usuario_Rol();
		$this->obj_mail = new PHPMailer();
			
	}

	public function registrar_usuario(){

			$id_usuario = rand();
			$id_categoria = rand();
			$id_departamento = rand();
			$id_usu_dep = rand();
			$id_rol = rand();
			$id_usu_rol = rand();

			$cedula = $_POST['cedula'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$sexo = $_POST['sexo'];
			$edad = $_POST['edad'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$direccion = $_POST['direccion'];
			$tipo = $_POST['tipo'];

			if ($tipo == 1) {
				$rol = "administrador";
			}elseif ($tipo == 2) {
				$rol = "supervisor";
			}elseif ($tipo == 3) {
				$rol = "docente";
			}
			if ($tipo == 1 OR $tipo == 2) {

				$usuario = $_POST['usuario'];
				$clave = md5($_POST['clave']);
				$categoria = "ninguna";
				$result0 = $this->obj_usuario->registrar_categoria($id_categoria,$categoria);
				$result1 = $this->obj_usuario->registrar_usuario($id_usuario,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$direccion,$usuario,$clave,$id_categoria);
				
				
				$departamento = "sin departamento";
				$result2 = $this->obj_departamento->registrar_departamento($id_departamento,$departamento);
				
				$result3 = $this->obj_usuario_departamento->registrar_usuario_departamento($id_usu_dep,$id_usuario,$id_departamento);

				$result4 = $this->obj_rol->registrar_rol($id_rol,$rol);

				$result5 = $this->obj_usuario_rol->registrar_usuario_rol($id_usu_rol,$id_usuario,$id_rol);

				if ($result0 && $result1 && $result2 && $result3 && $result4 && $result5) {
					header("location: ?controller=front&action=usuarios");
				}else{
					echo "ERORR!";
				}

			}elseif ($tipo == 3) {
				
				$usuario = $cedula;
				$clave = md5($cedula);
				$categoria = $_POST['categoria_actual'];
				$result2 = $this->obj_usuario->registrar_categoria($id_categoria,$categoria);
				$result3 = $this->obj_usuario->registrar_usuario($id_usuario,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$direccion,$usuario,$clave,$id_categoria);
				$departamento = $_POST['departamento'];
				$result4 = $this->obj_departamento->registrar_departamento($id_departamento,$departamento);
				$result5 = $this->obj_usuario_departamento->registrar_usuario_departamento($id_usu_dep,$id_usuario,$id_departamento);
				$result6 = $this->obj_rol->registrar_rol($id_rol,$rol);
				$result7 = $this->obj_usuario_rol->registrar_usuario_rol($id_usu_rol,$id_usuario,$id_rol);

				if ($result2 && $result3 && $result4 && $result5 && $result6 && $result7) {

					header("location: ?controller=front&action=usuarios");
				
				}else{
				
					echo "ERORR!";
				}
			}
	}

	public function buscar(){

			$filtro = $_POST['n'];
			$db = $this->obj_usuario->buscar($filtro);
			if(!$db){
				echo 'No hay sugerencias para: <b>'.$filtro."</b>...";
			}else{
				echo '<b>Sugerencias:</b><br />';
				require_once "app/view/sections/tabla-usuarios.php";
			}  
	}

	public function buscar_docente(){

			$filtro = $_POST['docente'];
			$db = $this->obj_usuario->buscar($filtro);
			if(!$db){
				echo 'No hay sugerencias para: <b>'.$filtro."</b>...";
			}else{
				
				echo '<b>Sugerencias:</b><br />';
				foreach ($db as $dato) {
					require_once "app/view/sections/tabla-usuarios-2.php";
				}
				
			}  
	}

	public function consultar_cedula(){

			$cedula = $_POST['c'];
			echo $cedula;
			/*
$db = $this->obj_usuario->consultar_cedula($cedula);
			if(!$db){
				echo 'No hay sugerencias para: <b>'.$cedula."</b>...";
			}else{
				
			echo "encontrado";	
			}
			*/  
	}

	public function eliminar(){

		$id_usuario = $_GET['id_usuario'];
		$id_departamento = $_GET['id_departamento'];
		$id_categoria = $_GET['id_categoria'];
		$id_rol = $_GET['id_rol'];

		$this->obj_usuario_departamento->eliminar_usuario_departamento($id_usuario,$id_departamento);	
		$this->obj_usuario_rol->eliminar_usuario_rol($id_usuario,$id_rol);
		$this->obj_rol->eliminar_rol($id_rol);
		$this->obj_usuario->eliminar_usuario($id_usuario);
		$this->obj_usuario->eliminar_categoria($id_categoria);

		header("location: ?controller=front&action=usuarios");
	}

		public function login(){

		$usuario = $_POST['u'];
		$pass = md5($_POST['p']);

		$arreglo_datos = $this->obj_usuario->login($usuario,$pass);

			if (!$arreglo_datos) {
				
			  
			  echo'<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Usuario o clave incorrecta</div>';
			}else{

				echo'<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Operacion Exitosa!</strong> Te logueaste</div>';

				session_start();
				$_SESSION['id']     = $arreglo_datos['id_usuario'];
				$_SESSION['user']   = $arreglo_datos['usuario_usuario'];
				$_SESSION['usuario_nombre']   = $arreglo_datos['usuario_nombre'];
				$_SESSION['rol']   = $arreglo_datos['rol'];
				echo "<script>window.location.href = '?controller=front&action=perfil';</script>";
			}
	}

	public function cerrar_sesion(){

		session_start();
		session_destroy();
		header("location: ?controller=front&action=home");
	}

	public function validar_correo(){

		$email = $_POST['c'];
		$result = $this->obj_usuario->validaCorreo($email);
/**/
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