<?php require_once "app/database/conexion.php";
class Categoria{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}
	public function registrar_categoria($id_categoria,$categoria){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO categoria VALUES('$id_categoria','$categoria')");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	public function eliminar_categoria($id_categoria){
   		
		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM categoria WHERE id_categoria = '$id_categoria'");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function verCategorias(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM categoria");
				$sql->execute();
				$result = $sql->fetchAll();
				return $result;
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>