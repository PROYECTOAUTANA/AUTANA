<?php 
/**
MODELO DE TRABAJO_FASE:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Trabajo_Fase{

	private $pdo;
	private $id;
	private $fk_trabajo;
	private $fk_fase;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_trabajo($fk_trabajo){$this->fk_trabajo = $fk_trabajo;}
	public function get_fk_trabajo(){return $this->fk_trabajo;}
	
	public function set_fk_fase($fk_fase){$this->fk_fase = $fk_fase;}
	public function get_fk_fase(){return $this->fk_fase;}

	public function relacionar_fase(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO trabajo_fase(fk_fase, fk_trabajo, trabajo_fase_fecha_registro) VALUES('$this->fk_fase','$this->fk_trabajo',NOW())");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_relacion(){
	try
			{	
				$sql = $this->pdo->prepare("DELETE FROM trabajo_fase WHERE fk_trabajo = '$this->fk_trabajo'");
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
	public function consultar_fase(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM fase, trabajo_fase,trabajo WHERE fk_fase = '$this->fk_fase'");
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
				$sql = $this->pdo->prepare("SELECT * FROM trabajo, trabajo_fase ,fase WHERE  trabajo_fase.fk_fase = fase.id_fase and trabajo_fase.fk_trabajo = trabajo.id_trabajo and trabajo.id_trabajo = '$this->fk_trabajo'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function actualizar_fase(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE trabajo_fase SET fk_fase = '$this->fk_fase' WHERE fk_trabajo = '$this->fk_trabajo'");
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_trabajos($desde,$hasta){
		try
			{	
				$sql = $this->pdo->prepare("SELECT trabajo.*,linea.*,fase.* FROM trabajo,trabajo_fase,fase,trabajo_linea,linea where trabajo_fase.fk_fase = fase.id_fase and trabajo_fase.fk_trabajo = trabajo.id_trabajo and trabajo_linea.fk_linea = linea.id_linea and trabajo_linea.fk_trabajo = trabajo.id_trabajo and trabajo_fase.fk_fase = '$this->fk_fase' and trabajo.trabajo_fecha_registro BETWEEN ('$desde') AND ('$hasta')");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

}
?>