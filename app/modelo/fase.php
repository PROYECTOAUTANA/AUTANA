<?php 
/**
MODELO DE FASE:

METODOS:

**/
require_once "app/database/conexion.php";
class Modelo_Fase{

	private $pdo;
	private $id;
	private $nombre;
	private $descripcion;


	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}

	public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
	public function get_descripcion(){return $this->descripcion;}

	public function insertar(){
	try
			{	
				$consulta = "INSERT INTO 
								fase(
									fase_nombre,fase_descripcion,
										 fase_fecha_registro)
							VALUES(
								'$this->nombre',
									'$this->descripcion',
										NOW()
							)";

				$sql = $this->pdo->prepare($consulta);
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function listar(){
	
		try
			{	
				$consulta = "SELECT * FROM fase";

				$sql = $this->pdo->prepare($consulta); 
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function actualizar(){

		try
			{	
				$consulta = "UPDATE 
								fase 
							SET 
								fase_nombre = '$this->nombre',
									fase_descripcion = '$this->descripcion' 
							WHERE 
								id_fase = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$consulta = "DELETE FROM fase WHERE id_fase = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar(){
		try
			{	
				$consulta = "SELECT * FROM fase WHERE id_fase = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>