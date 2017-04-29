<?php 
/**
* FrontController
*/
require_once "app/model/trabajo.php";
require_once "app/model/linea.php";
require_once "app/model/fase.php";
require_once "app/model/usuario.php";
require_once "app/model/usuario-trabajo.php";
require_once "app/model/categoria.php";
require_once "app/model/rol.php";
require_once "app/model/departamento.php";

class C_Front{

	private $obj_trabajo;
	private $obj_usuario;
	private $obj_usuario_trabajo;
	private $obj_linea;
	private $obj_fase;
	private $obj_rol;
	private $obj_departamento;
	private $obj_categoria;

	public function __construct(){

		$this->obj_usuario = new Usuario();
		$this->obj_trabajo = new Trabajo();
		$this->obj_linea = new Linea();
		$this->obj_fase = new Fase();
		$this->obj_rol = new Rol();
		$this->obj_departamento = new Departamento();
		$this->obj_usuario_trabajo = new Usuario_Trabajo();
		$this->obj_categoria = new Categoria();
	}
	
	public function home(){
		$title_view = "Home";
		require_once "app/view/home.php";
	}

	public function inicio(){
		$title_view = "Inicio";
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		require_once "app/view/inicio.php";
	}
	
	public function trabajos(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Gestionar Trabajos";
		$lineas = $this->obj_linea->ver_lineas();
		$fases = $this->obj_fase->ver_fases();
		require_once "app/view/trabajos.php";
	}
	public function usuarios(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$roles = $this->obj_rol->verRoles();
		$departamentos = $this->obj_departamento->verDepartamentos();
		$categorias = $this->obj_categoria->verCategorias();
		$title_view = "Gestionar Usuarios";
		require_once "app/view/usuarios.php";
		
	}
	
	public function reportes(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Gestionar Reportes";
		require_once "app/view/reportes.php";
	}

	public function categorias(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Gestionar Categorias de Docentes";
		$db = $this->obj_categoria->verCategorias();
		require_once "app/view/categorias.php";
	}
	public function roles(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$todos_los_modulos = $this->obj_usuario->todos_los_modulos();
		$title_view = "Gestionar Roles";
		$db = $this->obj_rol->verRoles();
		require_once "app/view/roles.php";
	}
	public function departamentos(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Gestionar Departamentos";
		$db = $this->obj_departamento->verDepartamentos();
		require_once "app/view/departamentos.php";
	}
	public function lineas(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Gestionar Lineas de Investigacion";
		$db = $this->obj_linea->ver_lineas();
		require_once "app/view/lineas.php";
	}
	
	public function detalles_trabajo(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Detalles Trabajo";
		$id_trabajo = $_GET['id_trabajo'];
		$datos_trabajo = $this->obj_trabajo->consultar_trabajo($id_trabajo);
		if ($datos_trabajo) {
			$autores = $this->obj_usuario_trabajo->docentes_del_trabajo($id_trabajo,"autor");
			$tutores = $this->obj_usuario_trabajo->docentes_del_trabajo($id_trabajo,"tutor");
			$jurados = $this->obj_usuario_trabajo->docentes_del_trabajo($id_trabajo,"jurado");
			$lineas = $this->obj_linea->ver_lineas();
			$fases = $this->obj_fase->ver_fases();
			require_once "app/view/detalles-trabajo.php";
		}else{

			header("location: ?controller=front&action=trabajos");
		}	
	}
	
	public function detalles_usuario(){
		session_start();
		$modulos = $this->obj_usuario->verModulos($_SESSION['id_rol']);
		$title_view = "Detalles Usuario";
		$id_usuario = $_GET['id_usuario'];
		$datos_usuario = $this->obj_usuario->consultar_id($id_usuario);

		if ($datos_usuario) {
			$trabajos = $this->obj_usuario_trabajo->trabajos_del_docente($id_usuario);
			$roles = $this->obj_rol->verRoles();
			$departamentos = $this->obj_departamento->verDepartamentos();
			$categorias = $this->obj_categoria->verCategorias();
			require_once "app/view/detalles-usuario.php";

		}else{

			header("location: ?controller=front&action=trabajos");
		}	
		
	}

	public function notFound(){
		$title_view = "Error: 404";
		require_once "app/view/404.php";
	}
}
 ?>