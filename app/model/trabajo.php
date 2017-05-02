<?php require_once "app/database/conexion.php";
class Trabajo{

	private $pdo;
	private $tabla;
	private $id;
	private $titulo;
	private $fecha_presentacion;
	private $proceso;
	private $mension;
	private $resumen;
	private $categoria_ascenso;
	private $fecha_de_registro;

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

	public function set_fecha_de_registro($fecha_de_registro){$this->fecha_de_registro = $fecha_de_registro;}
	public function get_fecha_de_registro(){return $this->fecha_de_registro;}


	public function registrar_trabajo(){

	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO trabajo(trabajo_titulo, trabajo_mension, trabajo_fecha_presentacion, trabajo_proceso, trabajo_categoria_de_ascenso, trabajo_resumen,trabajo_fecha_registro)
					VALUES('$this->titulo','$this->mension',' $this->fecha_presentacion','$this->proceso','$this->categoria_ascenso','$this->resumen','$this->fecha_de_registro')");
        		
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function listar_trabajos($offset,$per_page){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo ORDER BY id_trabajo LIMIT :per_page OFFSET :offset");
				$sql->execute(array(':offset' => $offset, ':per_page' => $per_page));
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function numero_de_trabajos(){
	
		try
			{	
				$sql   = $this->pdo->query("SELECT COUNT(*) FROM trabajo");
    			return $sql->fetchColumn();;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function consultar_trabajo(){
	
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

	public function ultimo_trabajo(){
	
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