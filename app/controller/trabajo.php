<?php 
/**
* controlador de trabajos
*/
require_once "app/model/trabajo.php";
require_once "app/model/usuario.php";
require_once "app/model/fase.php";
require_once "app/model/linea.php";
require_once "app/model/usuario-trabajo.php";
require_once "app/model/trabajo-linea.php";
require_once "app/model/trabajo-fase.php";

class C_Trabajo{
	
	private $obj_usuario;
	private $obj_trabajo;
	private $obj_linea;
	private $obj_fase;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;
	private $obj_usuario_trabajo;

	public function __construct()
	{
		$this->obj_trabajo = new Trabajo();	
		$this->obj_usuario = new Usuario();	
		$this->obj_linea = new Linea();	
		$this->obj_fase = new Fase();	
		$this->obj_trabajo_linea = new Trabajo_Linea();	
		$this->obj_trabajo_fase = new Trabajo_Fase();	
		$this->obj_usuario_trabajo = new Usuario_Trabajo();		
	}

	public function registrar_trabajo(){

					$id_trabajo = rand();
					$id_linea = rand();
					$id_fase = rand();
					$id_trabajo_fase = rand();
					$id_trabajo_linea = rand();
					$titulo = $_POST['titulo'];
					$linea = $_POST['linea'];
					$proceso = $_POST['proceso'];
					$fecha_pp = $_POST['fecha_pp'];
					$categoria_ascenso = $_POST['categoria_ascenso'];
					$fase = $_POST['fase'];

					$this->obj_trabajo->nuevo($id_trabajo,$titulo,$fecha_pp,$proceso,$categoria_ascenso);

					$this->obj_fase->registrar_fase($id_fase,$fase);
					
					$this->obj_linea->registrar_linea($id_linea,$linea);

					$this->obj_trabajo_linea->registrar_trabajo_linea($id_trabajo_linea,$id_trabajo,$id_linea);

					$this->obj_trabajo_fase->registrar_trabajo_fase($id_trabajo_fase,$id_trabajo,$id_fase);
					

					$estado = true;
					$id = $id_trabajo;	
					$mensaje = "Listo!";
					//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
					header('Content-Type: application/json');
					//Guardamos los datos en un array
					$datos = array(
					'estado' => $estado,
					'id' => $id,
					'mensaje' => $mensaje
					);
					//Devolvemos el array pasado a JSON como objeto
					echo json_encode($datos, JSON_FORCE_OBJECT);
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
			  <strong>Listo!</strong> Se agrego un <strong>'.ucwords($vinculo).'</strong> con exito al trabajo...   <a href="#" class="btn btn-default" data-dismiss="alert" aria-label="Close" > Ok!</a></div>';
						
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

	public function buscar(){
			$filtro = $_POST['filtro'];
			$db = $this->obj_trabajo->buscar($filtro);
			if(!$db){
				echo 'No hay sugerencias para: <b>'.$filtro."</b>...";
			}else{
				echo '<b>Sugerencias:</b><br />';
				require_once "app/view/sections/tabla-trabajos.php";
			} 
	}
	
}
?>