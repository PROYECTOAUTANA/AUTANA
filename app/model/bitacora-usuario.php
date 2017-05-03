<?php 
require_once "app/database/conexion.php";
class Bitacora_Usuario{

	private $pdo;
	private $id;
	private $fk_usuario;
	private $fecha_de_entrada;
	private $hora_de_entrada;
	private $fecha_de_salida;
	private $hora_de_salida;
	private $estado;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_usuario($fk_usuario){$this->fk_usuario = $fk_usuario;}
	public function get_fk_usuario(){return $this->fk_usuario;}

	public function set_fecha_de_entrada($fecha_de_entrada){$this->fecha_de_entrada = $fecha_de_entrada;}
	public function get_fecha_de_entrada(){return $this->fecha_de_entrada;}

	public function set_hora_de_entrada($hora_de_entrada){$this->hora_de_entrada = $hora_de_entrada;}
	public function get_hora_de_entrada(){return $this->hora_de_entrada;}

	public function set_fecha_de_salida($fecha_de_salida){$this->fecha_de_salida = $fecha_de_salida;}
	public function get_fecha_de_salida(){return $this->fecha_de_salida;}

	public function set_hora_de_salida($hora_de_salida){$this->hora_de_salida = $hora_de_salida;}
	public function get_hora_de_salida(){return $this->hora_de_salida;}

	public function set_estado($estado){$this->estado = $estado;}
	public function get_estado(){return $this->estado;}


	public function registrar_bitacora(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO bitacora_usuario(fk_usuario, fecha_de_entrada, hora_de_entrada,fecha_de_salida,hora_de_salida,estado) VALUES('$this->fk_usuario', '$this->fecha_de_entrada', '$this->hora_de_entrada','','','$this->estado')");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar_bitacora(){
   		
		try
			{	
				$sql = $this->pdo->prepare("UPDATE bitacora_usuario SET fecha_de_salida='$this->fecha_de_salida', hora_de_salida='$this->hora_de_salida', estado='$this->estado' WHERE id_bitacora_usuario = '$this->id';");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function ver_bitacora(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM bitacora_usuario");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

}
?>

