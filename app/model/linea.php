<?php require_once "app/database/conexion.php";
class Linea{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_linea($id_linea,$linea){
	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO linea VALUES('$id_linea','$linea')");
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


	public function ver_lineas(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM linea"); 
    			$sql->execute();
    			$result = $sql->fetchAll();
    			return $result;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
	public function eliminar_linea($id_linea){
	
		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM linea WHERE id_linea = '$id_linea'");
        		//Con fetchAll() puedo hacer los crud PERO no puedo iniciar sesion
        		//Con fetch(PDO::FETCH_ASSOC)  puedo iniciar sesion  PERO no puedo gestionar los crud  
    			$result = $sql->execute();
    			return $result;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>