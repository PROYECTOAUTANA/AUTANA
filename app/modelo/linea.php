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
				$sql = $this->pdo->prepare("INSERT INTO linea(linea_nombre, linea_descripcion, linea_fecha_registro)VALUES ('$this->nombre','$this->descripcion',NOW())");
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}


	
	public function listar(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM linea"); 
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
				$sql = $this->pdo->prepare("UPDATE linea SET linea_nombre = '$this->nombre',linea_descripcion = '$this->descripcion' WHERE id_linea = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM linea WHERE id_linea = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM linea WHERE id_linea = '$this->id'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>