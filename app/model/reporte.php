<?php require_once "app/database/conexion.php";
class Reporte{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	function todos_los_trabajos(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo");
        		$sql->execute();
    			$datosDB = $sql->fetchAll(PDO::FETCH_OBJ);
    			$cant = $sql->rowCount();
    			$result = array('datos' => $datosDB, 'cantidad' => $cant);
    			return $result;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	function todos_los_usuarios(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario");
        		$sql->execute();
    			$datosDB = $sql->fetchAll(PDO::FETCH_OBJ);
    			$cant = $sql->rowCount();
    			$result = array('datos' => $datosDB, 'cantidad' => $cant);
    			return $result;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function consultar_trabajo($id_trabajo){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo WHERE id_trabajo = '$id_trabajo'");
        		$sql->execute();
    			$datosDB = $sql->fetch(PDO::FETCH_OBJ);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

}
?>