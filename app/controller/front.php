<?php 
/**
* FrontController
*/
require_once "app/model/trabajo.php";
require_once "app/model/linea.php";
require_once "app/model/fase.php";
require_once "app/model/usuario.php";
require_once "app/model/usuario-trabajo.php";
require_once "app/model/usuario-rol.php";
require_once "app/model/categoria.php";
require_once "app/model/rol.php";
require_once "app/model/departamento.php";
require_once "app/model/rol_modulo.php";
require_once "app/model/modulo.php";

class C_Front{

	private $obj_trabajo;
	private $obj_usuario;
	private $obj_usuario_trabajo;
	private $obj_linea;
	private $obj_fase;
	private $obj_rol;
	private $obj_usuario_rol;
	private $obj_departamento;
	private $obj_categoria;
	private $obj_rol_modulo;
	private $obj_modulo;

	public function __construct(){

		$this->obj_usuario = new Usuario();
		$this->obj_trabajo = new Trabajo();
		$this->obj_linea = new Linea();
		$this->obj_fase = new Fase();
		$this->obj_rol = new Rol();
		$this->obj_departamento = new Departamento();
		$this->obj_usuario_trabajo = new Usuario_Trabajo();
		$this->obj_usuario_rol = new Usuario_Rol();
		$this->obj_rol_modulo = new Rol_Mod();
		$this->obj_categoria = new Categoria();
		$this->obj_modulo = new Modulo();
	}
	
	public function home(){
		$title_view = "Home";
		require_once "app/view/home.php";
	}

	public function inicio(){
		$title_view = "Inicio";
		require_once "app/view/inicio.php";
	}
	
	public function trabajos(){

		$title_view = "Gestionar Trabajos";

		$lineas = $this->obj_linea->ver_lineas();
        $fases = $this->obj_fase->ver_fases();
		require_once "app/view/trabajos.php";
	}
	public function usuarios(){

		$roles = $this->obj_rol->verRoles();
		$departamentos = $this->obj_departamento->verDepartamentos();
		$categorias = $this->obj_categoria->verCategorias();
		$title_view = "Gestionar Usuarios";
		require_once "app/view/usuarios.php";
	}
	
	public function reportes(){
		$title_view = "Gestionar Reportes";
		require_once "app/view/reportes.php";
	}

	public function categorias(){
		$title_view = "Gestionar Categorias de Docentes";
		$todas_las_categorias = $this->obj_categoria->verCategorias();
		require_once "app/view/categorias.php";
	}
	public function roles(){
		$todos_los_modulos = $this->obj_modulo->todos_los_modulos();
		$title_view = "Gestionar Roles";
		$todos_los_roles = $this->obj_rol->verRoles();
		require_once "app/view/roles.php";
	}
	public function departamentos(){
		$title_view = "Gestionar Departamentos";
		$todos_los_departamentos = $this->obj_departamento->verDepartamentos();
		require_once "app/view/departamentos.php";
	}
	public function lineas(){
		$title_view = "Gestionar Lineas de Investigacion";
		$lineas = $this->obj_linea->ver_lineas();
		require_once "app/view/lineas.php";
	}

	public function fases(){
		$title_view = "Gestionar Fases";
		$fases = $this->obj_fase->ver_fases();
		require_once "app/view/fases.php";
	}
	
	public function detalles_trabajo(){
		
		$title_view = "Detalles Trabajo";
		$this->obj_trabajo->set_id($_GET['id_trabajo']);
		$id_trabajo = $this->obj_trabajo->get_id();
		$datos_trabajo = $this->obj_trabajo->consultar_trabajo();

		if ($datos_trabajo) {
			$this->obj_usuario_trabajo->set_fk_trabajo($id_trabajo);

			$this->obj_usuario_trabajo->set_vinculo("autor");
			$autores = $this->obj_usuario_trabajo->docentes_del_trabajo();
			$this->obj_usuario_trabajo->set_vinculo("tutor");
			$tutores = $this->obj_usuario_trabajo->docentes_del_trabajo();
			$this->obj_usuario_trabajo->set_vinculo("jurado");
			$jurados = $this->obj_usuario_trabajo->docentes_del_trabajo();

			require_once "app/view/detalles-trabajo.php";
		}else{

			header("location: ?controller=front&action=trabajos");
		}	
	}
	
	public function detalles_usuario(){
		
		$title_view = "Detalles Usuario";

		$this->obj_usuario->set_id($_GET['id_usuario']);
		$id_usuario = $this->obj_usuario->get_id();
		$datos_usuario = $this->obj_usuario->consultar_id();

		if (!$datos_usuario) {
			header("location: ?controller=front&action=usuarios");
		}else{
			//verificamos los trabajos q pueda tener este usuario
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$trabajos = $this->obj_usuario_trabajo->trabajos_del_docente();
			//optenemos la id del rol
			$this->obj_usuario_rol->set_fk_usuario($id_usuario);
			$usuario_rol = $this->obj_usuario_rol->rol_de_usuario();
			//verificamos el rol de usuario q tiene el usuario
			$this->obj_rol->set_id($usuario_rol->fk_rol);
			$rol_de_usuario = $this->obj_rol->consultar_rol();
			$rol = $rol_de_usuario->rol_nombre;
			//en la variable $todos_los_roles guarfaremos todos los roles para cuando el usuario valla a cambiar de rol
			$todos_los_roles = $this->obj_rol->verRoles();
			require_once "app/view/detalles-usuario.php";	
		}	
		
		
	}

	public function notFound(){
		$title_view = "Error: 404";
		require_once "app/view/404.php";
	}
}
 ?>