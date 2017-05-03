<?php 
/**
* controlador de trabajos
*/
require_once "app/model/trabajo.php";
require_once "app/model/trabajo-fase.php";
require_once "app/model/trabajo-linea.php";
require_once "app/model/bitacora-trabajo.php";

class C_Trabajo{
	
	private $obj_trabajo;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;
	private $obj_bitacora_trabajo;

	public function __construct()
	{
		$this->obj_trabajo = new Trabajo();
		$this->obj_trabajo_fase = new Trabajo_Fase();
		$this->obj_trabajo_linea = new Trabajo_Linea();	
		$this->obj_bitacora_trabajo = new Bitacora_Trabajo();			
	}

	public function registrar_trabajo(){

		
		$this->obj_trabajo->set_titulo($_POST['titulo']);
		$this->obj_trabajo->set_proceso($_POST['proceso']);
		$this->obj_trabajo->set_fecha_presentacion($_POST['fecha_pp']);
		$this->obj_trabajo->set_mension("fds");
		$this->obj_trabajo->set_resumen("fsdfsd");
		$this->obj_trabajo->set_categoria_ascenso("fsd");

		$registro = $this->obj_trabajo->registrar_trabajo();
		$ultimo_trabajo = $this->obj_trabajo->ultimo_trabajo();
		$id_trabajo = $ultimo_trabajo->ultimo;

		if (!$registro) {
			$id = '';
			$estado = false;
			$mensaje = "hubo un error!";
		}else{

			$this->obj_trabajo_fase->set_fk_fase($_POST['fase']);
			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_fase->asignar_fase();


			$this->obj_trabajo_linea->set_fk_linea($_POST['linea']);
			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_linea->asignar_linea();

			session_start();
			$this->obj_bitacora_trabajo->set_fk_usuario_gestor($_SESSION['id']);
			$this->obj_bitacora_trabajo->set_fk_trabajo($id_trabajo);
			$this->obj_bitacora_trabajo->set_observacion("Registro del Trabajo, Asignacion de fase y Linea de Investigacion");
			$this->obj_bitacora_trabajo->registrar_bitacora();

			$id = $id_trabajo;
			$estado = true;
			$mensaje = "Listo!";
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
}
?>