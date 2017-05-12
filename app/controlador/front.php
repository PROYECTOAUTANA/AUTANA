<?php 
/**
* FrontController
*/
require_once "app/modelo/trabajo.php";
require_once "app/modelo/linea.php";
require_once "app/modelo/fase.php";
require_once "app/modelo/usuario.php";
require_once "app/modelo/usuarioTrabajo.php";
require_once "app/modelo/usuarioRol.php";
require_once "app/modelo/categoria.php";
require_once "app/modelo/rol.php";
require_once "app/modelo/departamento.php";
require_once "app/modelo/rolModulo.php";
require_once "app/modelo/modulo.php";
require_once "app/modelo/usuarioDepartamento.php";
require_once "app/modelo/trabajoLinea.php";
require_once "app/modelo/trabajoFase.php";

class Controlador_Front{

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
	private $obj_usuario_departamento;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;

	public function __construct(){

		$this->obj_usuario = new Modelo_Usuario();
		$this->obj_trabajo = new Modelo_Trabajo();
		$this->obj_linea = new Modelo_Linea();
		$this->obj_fase = new Modelo_Fase();
		$this->obj_rol = new Modelo_Rol();
		$this->obj_departamento = new Modelo_Departamento();
		$this->obj_usuario_trabajo = new Modelo_Usuario_Trabajo();
		$this->obj_usuario_departamento = new Modelo_Usuario_Departamento();
		$this->obj_usuario_rol = new Modelo_Usuario_Rol();
		$this->obj_rol_modulo = new Modelo_Rol_Mod();
		$this->obj_categoria = new Modelo_Categoria();
		$this->obj_modulo = new Modelo_Modulo();
		$this->obj_trabajo_fase = new Modelo_Trabajo_Fase();
		$this->obj_trabajo_linea = new Modelo_Trabajo_Linea();
	}
	
	public function home(){
		$titulo_de_la_vista = "Home";
		require_once "app/vista/home.php";
	}

	public function inicio(){
		$titulo_de_la_vista = "Inicio";
		require_once "app/vista/inicio.php";
	}
	
	public function mis_trabajos(){

		$titulo_de_la_vista = "Mis Trabajos";
		//verificamos los trabajos q pueda tener este usuario
		session_start();
		$this->obj_usuario_trabajo->set_fk_usuario($_SESSION['id']);
		$trabajos_usuario = $this->obj_usuario_trabajo->consultar_usuario();
		require_once "app/vista/mis_trabajos.php";
	}

	public function trabajos(){

		$titulo_de_la_vista = "Gestionar Trabajos";
		$trabajos = $this->obj_trabajo->listar();
		$lineas = $this->obj_linea->listar();
        $fases = $this->obj_fase->listar();
		require_once "app/vista/trabajos.php";
	}
	public function usuarios(){
		$titulo_de_la_vista = "Gestionar Usuarios";
		$usuarios = $this->obj_usuario->listar();
		$roles = $this->obj_rol->listar();
		$departamentos = $this->obj_departamento->listar();
		$categorias = $this->obj_categoria->listar();
		
		require_once "app/vista/usuarios.php";
	}
	
	public function reportes(){
		$titulo_de_la_vista = "Gestionar Reportes";
		require_once "app/vista/reportes.php";
	}
	public function bitacora(){
		$titulo_de_la_vista = "Bitacora del Sistema";
		require_once "app/vista/bitacora.php";
	}
	public function categorias(){
		$titulo_de_la_vista = "Gestionar Categorias de Docentes";
		$categorias = $this->obj_categoria->listar();
		require_once "app/vista/categorias.php";
	}
	public function roles(){
		$todos_los_modulos = $this->obj_modulo->listar();
		$titulo_de_la_vista = "Gestionar Roles";
		$roles = $this->obj_rol->listar();
		require_once "app/vista/roles.php";
	}
	public function departamentos(){
		$titulo_de_la_vista = "Gestionar Departamentos";
		$departamentos = $this->obj_departamento->listar();
		require_once "app/vista/departamentos.php";
	}
	public function lineas(){
		$titulo_de_la_vista = "Gestionar Lineas de Investigacion";
		$lineas = $this->obj_linea->listar();
		require_once "app/vista/lineas.php";
	}

	public function fases(){
		$titulo_de_la_vista = "Gestionar Fases";
		$fases = $this->obj_fase->listar();
		require_once "app/vista/fases.php";
	}
	
	public function detalles_trabajo(){
		
		$titulo_de_la_vista = "Detalles Trabajo";
		$id_trabajo = $_GET['id_trabajo'];
		$this->obj_trabajo->set_id($id_trabajo);
		$datos_trabajo = $this->obj_trabajo->consultar();

		if ($datos_trabajo) {
			
			$this->obj_usuario_trabajo->set_fk_trabajo($id_trabajo);
			$usuario_trabajo = $this->obj_usuario_trabajo->consultar_trabajo();

			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$fase_del_trabajo = $this->obj_trabajo_fase->consultar_trabajo();
			
			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$linea_del_trabajo = $this->obj_trabajo_linea->consultar_trabajo();

			$usuarios = $this->obj_usuario->listar();
			$fases = $this->obj_fase->listar();
			$lineas = $this->obj_linea->listar();
			require_once "app/vista/detalles-trabajo.php";
		}else{

			header("location: ?controller=front&action=trabajos");
		}	
	}

	public function detalles_trabajo_lectura(){
		
		$titulo_de_la_vista = "Detalles Trabajo";
		$id_trabajo = $_GET['id_trabajo'];
		$this->obj_trabajo->set_id($id_trabajo);
		$datos_trabajo = $this->obj_trabajo->consultar();

		if ($datos_trabajo) {
			
			$this->obj_usuario_trabajo->set_fk_trabajo($id_trabajo);
			$usuario_trabajo = $this->obj_usuario_trabajo->consultar_trabajo();

			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$fase_del_trabajo = $this->obj_trabajo_fase->consultar_trabajo();
			
			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$linea_del_trabajo = $this->obj_trabajo_linea->consultar_trabajo();

			require_once "app/vista/detalles-trabajo-solo-lectura.php";
		}else{

			header("location: ?controller=front&action=trabajos");
		}	
	}
	
	public function detalles_usuario(){
		
		$titulo_de_la_vista = "Detalles Usuario";

		$id_usuario = $_GET['id_usuario'];
		$this->obj_usuario->set_id($id_usuario);
		$datos_usuario = $this->obj_usuario->consultar();

		if (!$datos_usuario) {
			header("location: ?controller=front&action=usuarios");
		}else{

			//verificamos los trabajos q pueda tener este usuario
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$trabajos_usuario = $this->obj_usuario_trabajo->consultar_usuario();
			//consultamos que rol de usuario de este usuario
			$this->obj_usuario_rol->set_fk_usuario($id_usuario);
			$usuario_rol = $this->obj_usuario_rol->consultar_usuario();
			//consultamos el departamento del usuario
			$this->obj_usuario_departamento->set_fk_usuario($id_usuario);
			$usuario_departamento = $this->obj_usuario_departamento->consultar_usuario();

			//en estas variables vamos a guardar la seleccion de una determinada tabla para cuando
			//se tenga q necesitar el listado de todos los departamentos para actualizarlos
			$departamentos = $this->obj_departamento->listar();
			$roles = $this->obj_rol->listar();
			$categorias = $this->obj_categoria->listar();
			$trabajos = $this->obj_trabajo->listar();
			require_once "app/vista/detalles-usuario.php";	
		}		
	}

	public function detalles_rol(){
		
		$titulo_de_la_vista = "Detalles Rol de Usuario";
		$id_rol = $_GET['id_rol'];
		$this->obj_rol->set_id($id_rol);
		$datos_rol = $this->obj_rol->consultar();

		if ($datos_rol) {
			//verificamos que modulos tiene el rol de usuario seleccionado
			$this->obj_rol_modulo->set_fk_rol($id_rol);
            $modulos = $this->obj_rol_modulo->consultar_rol();
            //obtenemos los modulos que no estan habilitados para este rol
            $modulos_deshabilitados =  $this->obj_rol_modulo->modulos_deshabilitados();
			require_once "app/vista/detalles-rol.php";
		}else{

			header("location: ?controller=front&action=roles");
		}	
	}

	public function detalles_categoria(){
		
		$titulo_de_la_vista = "Detalles Categoria";
		$id_categoria = $_GET['id_categoria'];
		$this->obj_categoria->set_id($id_categoria);
		$datos_categoria = $this->obj_categoria->consultar();

		if ($datos_categoria) {
			require_once "app/vista/detalles-categoria.php";
		}else{

			header("location: ?controller=front&action=categorias");
		}	
	}

	public function detalles_departamento(){
		
		$titulo_de_la_vista = "Detalles Departamento";
		$id_departamento = $_GET['id_departamento'];
		$this->obj_departamento->set_id($id_departamento);
		$datos_departamento = $this->obj_departamento->consultar();

		if ($datos_departamento) {
            $todos_los_departamentos = $this->obj_departamento->listar();
			require_once "app/vista/detalles-departamento.php";
		}else{

			header("location: ?controller=front&action=departamentos");
		}	
	}

	public function detalles_linea(){
		
		$titulo_de_la_vista = "Detalles Linea de Investigacion";
		$id_linea = $_GET['id_linea'];
		$this->obj_linea->set_id($id_linea);
		$datos_linea = $this->obj_linea->consultar();

		if ($datos_linea) {
            $todas_las_lineas = $this->obj_linea->listar();
			require_once "app/vista/detalles-linea.php";
		}else{

			header("location: ?controller=front&action=lineas");
		}	
	}


	public function detalles_fase(){
		
		$titulo_de_la_vista = "Detalles de la Fase";
		$id_fase = $_GET['id_fase'];
		$this->obj_fase->set_id($id_fase);
		$datos_fase = $this->obj_fase->consultar();

		if ($datos_fase) {
            $todas_las_fases = $this->obj_fase->listar();
			require_once "app/vista/detalles-fase.php";
		}else{

			header("location: ?controller=front&action=fases");
		}	
	}

	


	public function notFound(){
		$titulo_de_la_vista = "Error: 404";
		require_once "app/vista/404.php";
	}
}
 ?>