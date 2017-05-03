<?php require_once "app/database/conexion.php";
class Linea{

	private $pdo;
	private $id;
	private $nombre;
	private $descripcion;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}

	public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
	public function get_descripcion(){return $this->descripcion;}

	public function registrar_linea(){
	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO linea(linea_nombre, linea_descripcion, linea_fecha_registro)VALUES ('$this->nombre','$this->descripcion',NOW())");
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}


	public function ver_lineas(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM linea"); 
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
	
}
?>