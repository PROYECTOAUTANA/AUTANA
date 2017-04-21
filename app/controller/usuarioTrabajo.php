<?php 
/**
* controlador de usuarios
*/
require_once "app/model/usuario.php";
require_once "libs/phpmailer/class.phpmailer.php";
require_once "libs/phpmailer/class.smtp.php";
require_once "app/model/usuario-trabajo.php";

class C_UsuarioTrabajo{
	
	private $obj_usuario;
	private $obj_usuario_trabajo;
	private $obj_mail;

	public function __construct()
	{
		$this->obj_usuario_trabajo = new Usuario_Trabajo();
		$this->obj_mail = new PHPMailer();
			
	}

	public function vincular_usuario(){
		
					$id_usuario_trabajo = rand();
					$id_trabajo = $_POST['id_trabajo'];
					$id_usuario = $_POST['id_docente'];
					$vinculo = $_POST['vinculo'];

					$operacion = $this->obj_usuario_trabajo->registrar_usuario_trabajo($id_usuario_trabajo,$id_usuario,$id_trabajo,$vinculo);

					if ($operacion) {
						$estado = true;
						$mensajeboton = "Listo!";
						$mensajeoperacion = '<div class="alert alert-default alert-dismissible col-sm-12" role="alert">
			  <strong>Listo!</strong> <strong>'.ucwords($vinculo).'</strong> Asignado con exito... </div>';
						
					}else{

						$estado = false;
						$mensajeoperacion = "hubo un error...!!";
					}

					//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
					header('Content-Type: application/json');
					//Guardamos los datos en un array
					$datos = array(
					'estado' => $estado,
					'mensajeboton' => $mensajeboton,
					'mensajeoperacion' => $mensajeoperacion
					);
					//Devolvemos el array pasado a JSON como objeto
					echo json_encode($datos, JSON_FORCE_OBJECT);
	}

}
?>