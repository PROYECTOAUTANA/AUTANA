<?php require_once "app/database/conexion.php";
class Usuario_Rol{

	private $pdo;
	private $id;
	private $fk_usuario;
	private $fk_rol;
	private $fecha_de_registro;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_usuario($fk_usuario){$this->fk_usuario = $fk_usuario;}
	public function get_fk_usuario(){return $this->fk_usuario;}
	
	public function set_fk_rol($fk_rol){$this->fk_rol = $fk_rol;}
	public function get_fk_rol(){return $this->fk_rol;}

	public function set_fecha_de_registro($fecha_de_registro){$this->fecha_de_registro = $fecha_de_registro;}
	public function get_fecha_de_registro(){return $this->fecha_de_registro;}

	public function asignar_rol(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario_rol(fk_usuario, fk_rol, usuario_rol_fecha_registro) VALUES('$this->fk_usuario','$this->fk_rol', '$this->fecha_de_registro')");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function rol_de_usuario(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT usuario_rol.* FROM usuario_rol WHERE fk_usuario = '$this->fk_usuario'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>