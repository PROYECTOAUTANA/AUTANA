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

		$consulta = $this->obj_usuario->consultar_cedula($_POST['cedula']);
	
			if (!$consulta) {
				echo "error: no se encontro ese usuario...";
			}else{
					
					$id_usuario = $consulta['id_usuario'];

					$id_trabajo = rand();
					$id_linea = rand();
					$id_fase = rand();
					$id_trabajo_fase = rand();
					$id_trabajo_linea = rand();
					$id_usuario_trabajo = rand();
					$titulo = $_POST['titulo'];
					$linea = $_POST['linea'];
					$n_consejo = $_POST['n_consejo'];
					$proceso = $_POST['proceso'];
					$fecha_pp = $_POST['fecha_pp'];
					$categoria_ascenso = $_POST['categoria_ascenso'];
					$fase = $_POST['fase'];
					$observacion = $_POST['observacion'];

					$result1 = $this->obj_trabajo->nuevo($id_trabajo,$titulo,$n_consejo,$observacion,$fecha_pp,$proceso,$categoria_ascenso);

					$result2 = $this->obj_fase->registrar_fase($id_fase,$fase);
					
					$result3 = $this->obj_linea->registrar_linea($id_linea,$linea);

					$result4 = $this->obj_trabajo_linea->registrar_trabajo_linea($id_trabajo_linea,$id_trabajo,$id_linea);

					$result5 = $this->obj_trabajo_fase->registrar_trabajo_fase($id_trabajo_fase,$id_trabajo,$id_fase);

					$result6 = $this->obj_usuario_trabajo->registrar_usuario_trabajo($id_usuario_trabajo,$id_usuario,$id_trabajo);

					if ($result1 && $result2 && $result3 && $result4 && $result5 && $result6) {
						header("location: ?controller=front&action=trabajos");
					}else{
						echo "ERORR!";
					}	

			}
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