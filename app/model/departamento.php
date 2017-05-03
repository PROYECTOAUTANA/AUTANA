<?php require_once "app/database/conexion.php";
class Departamento{

	private $pdo;
	private $id;
	private $nombre;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}


	public function registrar_departamento(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO departamento(departamento_nombre,departamento_fecha_registro) VALUES('$this->nombre',NOW())");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function verDepartamentos(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM departamento");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>