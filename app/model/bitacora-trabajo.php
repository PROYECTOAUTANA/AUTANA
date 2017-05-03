<?php 
require_once "app/database/conexion.php";
class Bitacora_Trabajo{

	private $pdo;
	private $id;
	private $fk_trabajo;
	private $fk_usuario_gestor;
	private $hora;
	private $fecha;
	private $observacion;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_usuario_gestor($fk_usuario_gestor){$this->fk_usuario_gestor = $fk_usuario_gestor;}
	public function get_fk_usuario_gestor(){return $this->fk_usuario_gestor;}

	public function set_fk_trabajo($fk_trabajo){$this->fk_trabajo = $fk_trabajo;}
	public function get_fk_trabajo(){return $this->fk_trabajo;}

	public function set_fecha($fecha){$this->fecha = $fecha;}
	public function get_fecha(){return $this->fecha;}

	public function set_hora($hora){$this->hora = $hora;}
	public function get_hora(){return $this->hora;}

	public function set_observacion($observacion){$this->observacion = $observacion;}
	public function get_observacion(){return $this->observacion;}


	public function registrar_bitacora(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO bitacora_trabajo(fk_usuario_gestor, fk_trabajo, fecha, hora, 
            observacion) VALUES ('$this->fk_usuario_gestor', '$this->fk_trabajo', NOW(), NOW(), 
            '$this->observacion')");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function ver_bitacora(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM bitacora_trabajo");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>
