<?php 
/**
MODELO DE DEPARTAMENTO:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Departamento{

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
								departamento(departamento_nombre,departamento_descripcion,
								departamento_fecha_registro) 
							VALUES(
								'$this->nombre',
									'$this->descripcion',
										NOW()
							)";

				$sql = $this->pdo->prepare($consulta);
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){

		try
			{	
				$consulta = "SELECT * FROM departamento";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$consulta = "UPDATE 
								departamento 
							SET 
								departamento_nombre = '$this->nombre',
								departamento_descripcion = '$this->descripcion' 
							WHERE 
								id_departamento = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$consulta = "DELETE FROM departamento WHERE id_departamento = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar(){
		try
			{	
				$consulta = "SELECT * FROM departamento WHERE id_departamento = '$this->id'";

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