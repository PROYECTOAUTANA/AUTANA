<?php require_once "app/database/conexion.php";
class Trabajo_Fase{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_trabajo_fase($id_trabajo_fase,$id_trabajo,$id_fase){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO trabajo_fase VALUES('$id_trabajo_fase','$id_fase','$id_trabajo')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>