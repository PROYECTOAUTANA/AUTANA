<?php require_once "app/database/conexion.php";
class Usuario_Trabajo{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function registrar_usuario_trabajo($id_usuario_trabajo,$id_usuario,$id_trabajo,$vinculo){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario_trabajo VALUES('$id_usuario_trabajo','$id_usuario','$id_trabajo','$vinculo')");
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

	public function docentes_del_trabajo($id_trabajo,$vinculo){
   		
		try
			{	
    			$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_trabajo, trabajo WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.vinculo = '$vinculo' AND  trabajo.id_trabajo = '$id_trabajo' ");
    			$sql->execute();
    			$result = $sql->fetchAll();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>