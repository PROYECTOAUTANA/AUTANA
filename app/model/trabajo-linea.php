<?php require_once "app/database/conexion.php";
class Trabajo_Linea{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_trabajo_linea($id_trabajo_linea,$id_trabajo,$id_linea){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO trabajo_linea VALUES('$id_trabajo_linea','$id_linea','$id_trabajo')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>