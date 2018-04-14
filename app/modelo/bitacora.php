<?php 
/**
MODELO DE BITACORA:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Bitacora{

	private $pdo;
	private $id;
	private $ip;
	private $id_usuario;


	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function listar(){

		try
			{

				$consulta = "SELECT * FROM bitacora";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar(){

		try
			{

				$consulta = "SELECT * FROM bitacora where id = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$consulta = "DELETE FROM 
								bitacora 
							WHERE 
								id = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_todo(){

		try
			{	
				$consulta = "DELETE FROM bitacora";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function vaciar(){

		try
			{	
				$consulta = "DELETE FROM bitacora";
				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>