<?php require_once "app/database/conexion.php";
class Rol{

	private $pdo;
	private $id;
	private $nombre;
	private $descripcion;
	private $fecha_de_registro;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}

	public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
	public function get_descripcion(){return $this->descripcion;}

	public function set_fecha_de_registro($fecha_de_registro){$this->fecha_de_registro = $fecha_de_registro;}
	public function get_fecha_de_registro(){return $this->fecha_de_registro;}

	public function registrar_rol(){
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO rol(rol_nombre, rol_descripcion, rol_fecha_registro) VALUES('$this->nombre', '$this->descripcion', '$this->fecha_de_registro')");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_rol(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM rol WHERE id_rol = '$this->id'");
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function verRoles(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM rol");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function ultimo_rol(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT MAX(id_rol) as ultimo FROM rol");
        		$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>