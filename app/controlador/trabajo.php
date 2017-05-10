<?php 
/**
* controlador de trabajos
*/
require_once "app/modelo/trabajo.php";
require_once "app/modelo/trabajoFase.php";
require_once "app/modelo/trabajoLinea.php";
require_once "app/modelo/usuarioTrabajo.php";

class Controlador_Trabajo{
	
	private $obj_trabajo;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;
	private $obj_usuario_trabajo;

	public function __construct()
	{
		$this->obj_trabajo = new Modelo_Trabajo();
		$this->obj_trabajo_fase = new Modelo_Trabajo_Fase();
		$this->obj_trabajo_linea = new Modelo_Trabajo_Linea();	
		$this->obj_usuario_trabajo = new Modelo_Usuario_Trabajo();			
	}

	public function revisar_permiso($permiso){

		session_start();
		$respuesta = true;
		foreach ($_SESSION['modulos'] as $modulo) {
			if ($modulo == $permiso) {
				$respuesta = true;
			}else{
				$respuesta = false;
			}
		}

		return $respuesta;
	}

	public function registrar_trabajo(){

			$this->obj_trabajo->set_titulo($_POST['titulo']);
			$this->obj_trabajo->set_proceso($_POST['proceso']);
			$this->obj_trabajo->set_fecha_presentacion($_POST['fecha_pp']);
			$this->obj_trabajo->set_mension("fds");
			$this->obj_trabajo->set_resumen("fsdfsd");
			$this->obj_trabajo->set_categoria_ascenso("fsd");

			$registro = $this->obj_trabajo->insertar();
			$ultimo_trabajo = $this->obj_trabajo->obtener_ultimo_trabajo();
			$id_trabajo = $ultimo_trabajo->ultimo;

			if (!$registro) {
				echo "hubo un error!";
			}else{

				$this->obj_trabajo_fase->set_fk_fase($_POST['fase']);
				$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
				$this->obj_trabajo_fase->relacionar_fase();

				$this->obj_trabajo_linea->set_fk_linea($_POST['linea']);
				$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
				$this->obj_trabajo_linea->relacionar_linea();

				header("location: ?controller=front&action=trabajos");
			}
	}

	public function editar_trabajo(){

			$id_trabajo = $_POST['id_trabajo'];
			$titulo = $_POST['titulo'];
			$proceso = $_POST['proceso'];
			$fecha_pp = $_POST['fecha_pp'];
			$mension = $_POST['mension'];
			$resumen = $_POST['resumen'];
			$categoria_ascenso = $_POST['categoria_ascenso'];

			$this->obj_trabajo->set_id($id_trabajo);
			$this->obj_trabajo->set_titulo($titulo);
			$this->obj_trabajo->set_proceso($proceso);
			$this->obj_trabajo->set_mension($mension);
			$this->obj_trabajo->set_resumen($resumen);
			$this->obj_trabajo->set_categoria_ascenso($categoria_ascenso);

			$actualizar = $this->obj_trabajo->actualizar();

			if (!$actualizar) {
				echo "hubo un error!";
			}else{
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}
	}

	public function eliminar_trabajo(){

				$id_trabajo = $_GET['id_trabajo'];
				$this->obj_trabajo->set_id($id_trabajo);
				$eliminar = $this->obj_trabajo->eliminar();		
				header("location: ?controller=front&action=trabajos");	

			if (!$actualizar) {
				echo "hubo un error!";
			}else{
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}		
	}

	public function quitar_docente(){

			$id_usuario = $_GET['id_usuario'];
			$id_trabajo = $_GET['id_trabajo'];
			$vinculo = $_GET['vinculo'];
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$this->obj_usuario_trabajo->set_vinculo($vinculo);
			$eliminar_relacion = $this->obj_usuario_trabajo->eliminar_relacion();	

			header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
	}

	public function asignar_fase(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_fase = $_POST['fase'];

			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_fase->set_fk_fase($id_fase);
			$asignar_fase = $this->obj_trabajo_fase->relacionar_fase();		
			if ($asignar_fase) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}
	}

	public function asignar_linea(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_linea = $_POST['linea'];

			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_linea->set_fk_linea($id_linea);
			$asignar_linea = $this->obj_trabajo_linea->relacionar_linea();		
			if ($asignar_linea) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}	
	}

	public function cambio_de_fase(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_fase = $_POST['fase'];

			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_fase->set_fk_fase($id_fase);
			$actualizar = $this->obj_trabajo_fase->actualizar_fase();	
	
			if ($actualizar) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}		
	}

	public function cambio_de_linea(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_linea = $_POST['linea'];

			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_linea->set_fk_linea($id_linea);
			$actualizar = $this->obj_trabajo_linea->actualizar_linea();

			if ($actualizar) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}			
	}

	public function asignar_usuario(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_usuario = $_POST['usuario'];
			$vinculo = $_POST['vinculo'];

			$this->obj_usuario_trabajo->set_fk_trabajo($id_trabajo);
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$this->obj_usuario_trabajo->set_vinculo($vinculo);
			$asignar_usuario = $this->obj_usuario_trabajo->relacionar_usuario();	

			if ($asignar_usuario) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}					
	}
}
?>