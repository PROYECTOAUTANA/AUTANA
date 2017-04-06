<?php require_once "app/database/conexion.php";
class Usuario_Trabajo{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_usuario_trabajo($id_usuario_trabajo,$id_usuario,$id_trabajo){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario_trabajo VALUES('$id_usuario_trabajo','$id_usuario','$id_trabajo')");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function numero_de_trabajos($id_usuario){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario_trabajo WHERE fk_usuario = '$id_usuario'");
    			$sql->execute();
    			//$result = $sql->fetch(PDO::FETCH_ASSOC);
    			$result = $sql->rowCount();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>