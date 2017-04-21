<?php 
/**
* controlador de trabajos
*/
require_once "app/model/trabajo.php";
require_once "app/model/usuario-trabajo.php";
require_once "app/model/trabajo-linea.php";
require_once "app/model/trabajo-fase.php";

class C_Trabajo{
	
	private $obj_trabajo;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;
	private $obj_usuario_trabajo;

	public function __construct()
	{
		$this->obj_trabajo = new Trabajo();		
		$this->obj_trabajo_linea = new Trabajo_Linea();	
		$this->obj_trabajo_fase = new Trabajo_Fase();	
		$this->obj_usuario_trabajo = new Usuario_Trabajo();		
	}

	public function registrar_trabajo(){

					$id_trabajo = rand();
					$id_trabajo_linea = rand();
					$id_trabajo_fase = rand();
					$titulo = $_POST['titulo'];
					$id_linea = $_POST['linea'];
					$proceso = $_POST['proceso'];
					$fecha_pp = $_POST['fecha_pp'];
					$id_fase = $_POST['fase'];

					$this->obj_trabajo->registrar_trabajo($id_trabajo,$titulo,$fecha_pp,$proceso);
					$this->obj_trabajo_linea->asignar_linea($id_trabajo_linea,$id_trabajo,$id_linea);
					$this->obj_trabajo_fase->asignar_fase($id_trabajo_fase,$id_trabajo,$id_fase);

					$estado = true;
					$mensaje = "Listo!";
					//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
					header('Content-Type: application/json');
					//Guardamos los datos en un array
					$datos = array(
					'id' => $id_trabajo,
					'estado' => $estado,
					'mensaje' => $mensaje
					);
					//Devolvemos el array pasado a JSON como objeto
					echo json_encode($datos, JSON_FORCE_OBJECT);
	}
}
?>