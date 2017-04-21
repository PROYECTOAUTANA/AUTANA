<?php 
require_once "app/database/conexion.php";
class Trabajo_Fase{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function asignar_fase($id_trabajo_fase,$id_trabajo,$id_fase){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO trabajo_fase VALUES('$id_trabajo_fase','$id_fase','$id_trabajo')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function cambiar_de_fase($id_trabajo,$id_fase){
   		
		try
			{	
				$sql = $this->pdo->prepare("UPDATE trabajo_fase SET fk_fase = '$id_fase' WHERE fk_trabajo = '$id_trabajo'");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>