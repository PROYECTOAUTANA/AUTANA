<?php
require_once "app/database/conexion.php";
class Trabajo_Linea{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function asignar_linea($id_trabajo_linea,$id_trabajo,$id_linea){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO trabajo_linea VALUES('$id_trabajo_linea','$id_linea','$id_trabajo')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_id_trabajo($id_trabajo){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo_linea WHERE fk_trabajo = '$id_trabajo'");
    			$sql->execute();
    			$result = $sql->fetch(PDO::FETCH_ASSOC);
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_trabajo_linea($id_trabajo){
   		
		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM trabajo_linea WHERE fk_trabajo = '$id_trabajo'");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>