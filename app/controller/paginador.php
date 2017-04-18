<?php 
/**
* controlador de usuarios
*/
require_once "app/model/departamento.php";
require_once "app/model/usuario-departamento.php";
require_once "app/model/rol.php";
require_once "app/model/usuario-rol.php";
require_once "app/model/usuario.php";
require_once "app/model/usuario.php";
require_once "app/model/trabajo.php";
require_once "libs/paginacion/paginador.config.php";

class C_Paginador{
	
	private $obj_usuario;
	private $obj_departamento;
	private $obj_usuario_departamento;
	private $obj_usuario_rol;
	private $obj_rol;
	private $obj_trabajo;

	public function __construct()
	{
		$this->obj_usuario = new Usuario();
		$this->obj_trabajo = new Trabajo();
		$this->obj_departamento = new Departamento();
		$this->obj_rol = new Rol();	
		$this->obj_usuario_departamento = new Usuario_Departamento();
		$this->obj_usuario_rol = new Usuario_Rol();
			
	}

	public function paginar_trabajos(){
 
	$accion = (isset($_REQUEST['accion'])&& $_REQUEST['accion'] !=NULL)?$_REQUEST['accion']:'';

		if($accion == 'ajax'){
			//las variables de paginación
			$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
			$per_page = 8; //la cantidad de registros que desea mostrar
			$adjacents  = 4; //brecha entre páginas después de varios adyacentes
			$offset = ($page - 1) * $per_page;
			//Cuenta el número total de filas de la tabla
			$numrows = $this->obj_trabajo->numero_de_trabajos();
			$total_pages = ceil($numrows/$per_page);
			$reload = '';
			//consulta principal para recuperar los datos
			$trabajos = $this->obj_trabajo->listar_trabajos($offset,$per_page);

				if ($numrows > 0){
					require_once "app/view/sections/tabla-trabajos.php";
				}else{
				?>
				<div class="alert alert-warning alert-dismissable">
		          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4>Aviso!!!</h4> No hay datos para mostrar
		        </div>
				<?php
				}
		}
	}

	public function paginar_usuarios(){
 
	$accion = (isset($_REQUEST['accion'])&& $_REQUEST['accion'] !=NULL)?$_REQUEST['accion']:'';

		if($accion == 'ajax'){
			//las variables de paginación
			$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
			$per_page = 8; //la cantidad de registros que desea mostrar
			$adjacents  = 4; //brecha entre páginas después de varios adyacentes
			$offset = ($page - 1) * $per_page;
			//Cuenta el número total de filas de la tabla
			$numrows = $this->obj_usuario->numero_de_usuarios();
			$total_pages = ceil($numrows/$per_page);
			$reload = '';
			//consulta principal para recuperar los datos
			$usuarios = $this->obj_usuario->listar_usuarios($offset,$per_page);

				if ($numrows > 0){
					require_once "app/view/sections/tabla-usuarios.php";
				}else{
				?>
				<div class="alert alert-warning alert-dismissable">
		          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <h4>Aviso!!!</h4> No hay datos para mostrar
		        </div>
				<?php
				}
		}
	}
}
?>