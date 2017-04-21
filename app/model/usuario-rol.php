<?php require_once "app/database/conexion.php";
class Usuario_Rol{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function asignar_rol($id_usu_rol,$id_usuario,$id_rol){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO usuario_rol VALUES('$id_usu_rol','$id_usuario','$id_rol')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_usuario_rol($id_usuario, $id_rol){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM usuario_rol WHERE fk_usuario = '$id_usuario' AND fk_rol = '$id_rol'");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	public function cambiar_de_rol($id_usuario,$id_rol){
   		
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario_rol SET fk_rol = '$id_rol' WHERE fk_usuario = '$id_usuario'");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	


}
?>