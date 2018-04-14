<?php 
/**
MODELO DE CATEGORIA:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Linea{

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
									linea(linea_nombre, linea_descripcion, 
											linea_fecha_registro)
							VALUES (
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
				$consulta = "SELECT * FROM linea";

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
								linea 
							SET 
								linea_nombre = '$this->nombre',
									linea_descripcion = '$this->descripcion' 
							WHERE 
								id_linea = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$consulta = "DELETE FROM linea WHERE id_linea = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar(){
		try
			{	
				$consulta = "SELECT * FROM linea WHERE id_linea = '$this->id'";

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