<?php 
/**
* 
*/
require_once "app/model/trabajo.php";
require_once "app/model/usuario.php";
require_once "app/model/usuario-trabajo.php";

class C_Front{

	private $obj_trabajo;
	private $obj_usuario;
	private $obj_usuario_trabajo;

	public function __construct(){

		$this->obj_usuario = new Usuario();
		$this->obj_trabajo = new Trabajo();
		$this->obj_usuario_trabajo = new Usuario_Trabajo();
	}
	
	public function home(){

		require_once "app/view/home.php";
	}

	public function perfil(){

		require_once "app/view/perfil.php";
	}
	
	public function trabajos(){

		$db = $this->obj_trabajo->verTrabajos();
		require_once "app/view/trabajos.php";
	}
	
	public function usuarios(){

		$db = $this->obj_usuario->listar();
		require_once "app/view/usuarios.php";
	}
	
	public function reportes(){

		require_once "app/view/reportes.php";
	}
	
	public function detalles_trabajo(){

		$id_trabajo = $_GET['id_trabajo'];
		$datos_trabajo = $this->obj_trabajo->consultar_trabajo($id_trabajo);
		require_once "app/view/detalles-trabajo.php";
	}
	
	public function detalles_usuario(){

		$id_usuario = $_GET['id_usuario'];
		$datos_usuario = $this->obj_usuario->consultar_id($id_usuario);
		$n_trabajos = $this->obj_usuario_trabajo->numero_de_trabajos($id_usuario);
		require_once "app/view/detalles-usuario.php";
	}

	public function notFound(){

		require_once "app/view/404.php";
	}
}
 ?>