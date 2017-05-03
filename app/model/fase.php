<?php require_once "app/database/conexion.php";
class Fase{

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

	public function registrar_fase(){
	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO fase(fase_nombre, fase_fecha_registro)VALUES ('$this->nombre',NOW())");
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function ver_fases(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM fase"); 
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>