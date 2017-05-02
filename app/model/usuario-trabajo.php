<?php require_once "app/database/conexion.php";
class Usuario_Trabajo{

	private $pdo;
	private $id;
	private $fk_usuario;
	private $fk_trabajo;
	private $vinculo;
	private $fecha_de_registro;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_fk_usuario($fk_usuario){$this->fk_usuario = $fk_usuario;}
	public function get_fk_usuario(){return $this->fk_usuario;}
	
	public function set_fk_trabajo($fk_trabajo){$this->fk_trabajo = $fk_trabajo;}
	public function get_fk_trabajo(){return $this->fk_trabajo;}
	
	public function set_vinculo($vinculo){$this->vinculo = $vinculo;}
	public function get_vinculo(){return $this->vinculo;}

	public function set_fecha_de_registro($fecha_de_registro){$this->fecha_de_registro = $fecha_de_registro;}
	public function get_fecha_de_registro(){return $this->fecha_de_registro;}

	public function numero_de_trabajos(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario_trabajo WHERE fk_usuario = '$this->fk_usuario'");
    			$sql->execute();
    			return $sql->rowCount();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function docentes_del_trabajo(){
   		
		try
			{	
    			$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_trabajo, trabajo WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.vinculo = '$this->vinculo' AND  trabajo.id_trabajo = '$this->fk_trabajo' ");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function trabajos_del_docente(){
   		
		try
			{	
    			$sql = $this->pdo->prepare("SELECT usuario_trabajo.vinculo , trabajo.* FROM usuario , usuario_trabajo, trabajo WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario.id_usuario = '$this->fk_usuario'");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>