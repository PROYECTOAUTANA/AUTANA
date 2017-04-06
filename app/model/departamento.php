<?php require_once "app/database/conexion.php";
class Departamento{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_departamento($id_departamento,$departamento){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO departamento VALUES('$id_departamento','$departamento')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_departamento($id_departamento){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM departamento WHERE id_departamento ='$id_departamento'");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>