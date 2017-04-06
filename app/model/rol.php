<?php require_once "app/database/conexion.php";
class Rol{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_rol($id_rol,$rol){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO rol VALUES('$id_rol','$rol')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_rol($id_rol){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM rol WHERE id_rol ='$id_rol'");
				$result = $sql->execute();
				return $result;
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>