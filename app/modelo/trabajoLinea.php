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
				$sql = $this->pdo->prepare("INSERT INTO trabajo_linea(fk_linea, fk_trabajo, trabajo_linea_fecha_registro) VALUES('$this->fk_linea','$this->fk_trabajo',NOW())");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_relacion(){
	try
			{	
				$sql = $this->pdo->prepare("DELETE FROM trabajo_linea WHERE fk_trabajo = '$this->fk_trabajo'");
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_linea(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM linea, trabajo_linea , trabajo WHERE fk_linea = '$this->fk_linea'");
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
				$sql = $this->pdo->prepare("SELECT * FROM trabajo, trabajo_linea ,linea WHERE  trabajo_linea.fk_linea = linea.id_linea and trabajo_linea.fk_trabajo = trabajo.id_trabajo and trabajo.id_trabajo = '$this->fk_trabajo'");
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
				$sql = $this->pdo->prepare("UPDATE trabajo_linea SET fk_linea = '$this->fk_linea' WHERE fk_trabajo = '$this->fk_trabajo'");
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_trabajos($desde,$hasta){
		try
			{	
				$sql = $this->pdo->prepare("SELECT trabajo.*,linea.*,fase.* FROM trabajo,trabajo_fase,fase,trabajo_linea,linea where trabajo_fase.fk_fase = fase.id_fase and trabajo_fase.fk_trabajo = trabajo.id_trabajo and trabajo_linea.fk_linea = linea.id_linea and trabajo_linea.fk_trabajo = trabajo.id_trabajo and trabajo_linea.fk_linea = '$this->fk_linea' and trabajo.trabajo_fecha_registro BETWEEN ('$desde') AND ('$hasta')");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

}
?>