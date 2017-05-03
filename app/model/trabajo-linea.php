<?php 
require_once "app/database/conexion.php";
class Trabajo_Linea{

	private $pdo;
	private $id;
	private $fk_trabajo;
	private $fk_linea;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_trabajo($fk_trabajo){$this->fk_trabajo = $fk_trabajo;}
	public function get_fk_trabajo(){return $this->fk_trabajo;}
	
	public function set_fk_linea($fk_linea){$this->fk_linea = $fk_linea;}
	public function get_fk_linea(){return $this->fk_linea;}

	public function asignar_linea(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO trabajo_linea(fk_linea, fk_trabajo, trabajo_linea_fecha_registro) VALUES('$this->fk_linea','$this->fk_trabajo',NOW())");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

}
?>