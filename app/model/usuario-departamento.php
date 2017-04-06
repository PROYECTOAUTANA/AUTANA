<?php require_once "app/database/conexion.php";
class Usuario_Departamento{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_usuario_departamento($id_usu_dep,$id_usuario,$id_departamento){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO usuario_departamento VALUES('$id_usu_dep','$id_usuario','$id_departamento')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_usuario_departamento($id_usuario,$id_departamento){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM usuario_departamento WHERE fk_usuario = '$id_usuario' AND fk_departamento = '$id_departamento'");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , departamento , usuario_departamento WHERE usuario_departamento.fk_usuario = usuario.usuario_id AND usuario_departamento.fk_departamento = departamento.id");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	


}
?>