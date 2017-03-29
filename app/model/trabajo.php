<?php require_once "app/database/conexion.php";
class Trabajo{

	private $pdo;
	private $tabla;

	public function __construct(){
		$this->pdo = new Conexion();
		$this->tabla = "trabajo";
	}

	public function nuevo($titulo){
	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO $this->tabla(id,titulo) VALUES(2,'$titulo')");
        		$sql->execute();
        		//Con fetchAll() puedo hacer los crud PERO no puedo iniciar sesion
        		//Con fetch(PDO::FETCH_ASSOC)  puedo iniciar sesion  PERO no puedo gestionar los crud  
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function buscar($filtro){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE titulo LIKE '$filtro%'");
        		$sql->execute(); 
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function ver(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla");
        		$sql->execute();
        		//Con fetchAll() puedo hacer los crud PERO no puedo iniciar sesion
        		//Con fetch(PDO::FETCH_ASSOC)  puedo iniciar sesion  PERO no puedo gestionar los crud  
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>