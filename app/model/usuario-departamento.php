<?php require_once "app/database/conexion.php";
class Usuario_Departamento{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function asignar_departamento($id_usu_dep,$id_usuario,$id_departamento){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO usuario_departamento VALUES('$id_usu_dep','$id_usuario','$id_departamento')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>