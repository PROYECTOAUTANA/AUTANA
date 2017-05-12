<?php 
/**
MODELO DE TRABAJO:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Trabajo{

	private $pdo;
	private $tabla;
	private $id;
	private $titulo;
	private $fecha_presentacion;
	private $proceso;
	private $mension;
	private $resumen;
	private $categoria_ascenso;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_titulo($titulo){$this->titulo = $titulo;}
	public function get_titulo(){return $this->titulo;}

	public function set_fecha_presentacion($fecha_presentacion){$this->fecha_presentacion = $fecha_presentacion;}
	public function get_fecha_presentacion(){return $this->fecha_presentacion;}
	
	public function set_proceso($proceso){$this->proceso = $proceso;}
	public function get_proceso(){return $this->proceso;}

	public function set_mension($mension){$this->mension = $mension;}
	public function get_mension(){return $this->mension;}

	public function set_categoria_ascenso($categoria_ascenso){$this->categoria_ascenso = $categoria_ascenso;}
	public function get_categoria_ascenso(){return $this->categoria_ascenso;}

	public function set_resumen($resumen){$this->resumen = $resumen;}
	public function get_resumen(){return $this->resumen;}


	public function insertar(){

	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO trabajo(trabajo_titulo, trabajo_mension, trabajo_fecha_presentacion, trabajo_proceso, trabajo_categoria_de_ascenso, trabajo_resumen,trabajo_fecha_registro)
					VALUES('$this->titulo','$this->mension',' $this->fecha_presentacion','$this->proceso','$this->categoria_ascenso','$this->resumen',NOW())");
        		
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE trabajo SET trabajo_titulo = '$this->titulo', trabajo_mension = '$this->mension', trabajo_proceso = '$this->proceso', trabajo_categoria_de_ascenso = '$this->categoria_ascenso', trabajo_resumen = '$this->resumen' WHERE id_trabajo = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM trabajo WHERE id_trabajo = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo ORDER BY id_trabajo");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function reportar_trabajos(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo,trabajo_fase,fase,trabajo_linea,linea where trabajo_fase.fk_fase = fase.id_fase and trabajo_fase.fk_trabajo = trabajo.id_trabajo and trabajo_linea.fk_linea = linea.id_linea and trabajo_linea.fk_trabajo = trabajo.id_trabajo");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function consultar(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo WHERE id_trabajo = '$this->id'");
        		$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function obtener_ultimo_trabajo(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT MAX(id_trabajo) as ultimo FROM trabajo");
        		$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>