<?php 
/**
MODELO DE TRABAJO_LINEA:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Trabajo_Linea{

	private $pdo;
	private $id;
	private $fk_trabajo;
	private $fk_linea;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_trabajo($fk_trabajo){$this->fk_trabajo = $fk_trabajo;}
	public function get_fk_trabajo(){return $this->fk_trabajo;}
	
	public function set_fk_linea($fk_linea){$this->fk_linea = $fk_linea;}
	public function get_fk_linea(){return $this->fk_linea;}

	public function relacionar_linea(){
   		
		try
			{	
				$consulta = "INSERT INTO 
								trabajo_linea(
										fk_linea, fk_trabajo, 
											trabajo_linea_fecha_registro) 
							VALUES(
								'$this->fk_linea',
									'$this->fk_trabajo',
										NOW()
							)";

				$sql = $this->pdo->prepare($consulta);
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_relacion(){
	try
			{	
				$consulta = "DELETE FROM trabajo_linea WHERE fk_trabajo = '$this->fk_trabajo'";

				$sql = $this->pdo->prepare($consulta);
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_linea(){
		try
			{	
				$consulta = "SELECT 
							* 
							FROM 
								linea, trabajo_linea , trabajo 
							WHERE 
								fk_linea = '$this->fk_linea'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_trabajo(){
		try
			{	
				$consulta = "SELECT 
							* 
							FROM 
								trabajo, trabajo_linea ,linea 
							WHERE  
								trabajo_linea.fk_linea = linea.id_linea 
							AND 
								trabajo_linea.fk_trabajo = trabajo.id_trabajo 
							AND 
								trabajo.id_trabajo = '$this->fk_trabajo'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function actualizar_linea(){
		try
			{	
				$consulta = "UPDATE 
								trabajo_linea 
							SET 
								fk_linea = '$this->fk_linea' 
							WHERE 
								fk_trabajo = '$this->fk_trabajo'";

				$sql = $this->pdo->prepare($consulta);
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_trabajos($desde,$hasta){
		try
			{	
				$consulta = "SELECT 
								trabajo.*,linea.*,fase.* 
							FROM 
								trabajo,trabajo_fase,fase,trabajo_linea,linea 
							WHERE 
								trabajo_fase.fk_fase = fase.id_fase 
							AND 
								trabajo_fase.fk_trabajo = trabajo.id_trabajo 
							AND 
								trabajo_linea.fk_linea = linea.id_linea 
							AND 
								trabajo_linea.fk_trabajo = trabajo.id_trabajo 
							AND 
								trabajo_linea.fk_linea = '$this->fk_linea' 
							AND 
								trabajo.trabajo_fecha_registro 
							BETWEEN 
								('$desde') 
							AND 
								('$hasta')";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

}
?>