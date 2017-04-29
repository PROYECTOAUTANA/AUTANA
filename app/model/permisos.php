<?php 
require_once "app/database/conexion.php";
/**
* 
*/
class Permisos
{
	
	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function revisarPermisos(){
		try
			{	
				$sql = $this->pdo->prepare("");
        		$sql->execute();
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}

?>