<?php 
/**
* controlador de trabajo fase
*/
require_once "app/model/fase.php";
require_once "app/model/trabajo-fase.php";

class C_TrabajoFase{
	

	private $obj_trabajo_fase;

	public function __construct()
	{
		$this->obj_trabajo_fase = new Trabajo_Fase();
			
	}

	public function cambiar_fase(){

					$id_trabajo = $_POST['id_trabajo'];
					$id_fase = $_POST['id_fase'];
					

					$operacion = $this->obj_trabajo_fase->cambiar_de_fase($id_trabajo,$id_fase);

					if ($operacion) {
						$estado = true;
						$mensajeoperacion = '<div class="alert alert-default alert-dismissible col-sm-12" role="alert">
			  <strong>Listo!</strong> Fase cambiada con exito...  </div>';
						
					}else{

						$estado = false;
						$mensajeoperacion = "hubo un error...!!";
					}

					//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
					header('Content-Type: application/json');
					//Guardamos los datos en un array
					$datos = array('mensajeoperacion' => $mensajeoperacion);
					//Devolvemos el array pasado a JSON como objeto
					echo json_encode($datos, JSON_FORCE_OBJECT);
	}
}
?>