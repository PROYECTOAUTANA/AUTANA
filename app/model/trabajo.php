<?php require_once "app/database/conexion.php";
class Trabajo{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function nuevo($id_trabajo,$titulo,$fecha_pp,$proceso,$categoria_ascenso){
	try
			{	
				$sql = $this->pdo->prepare("INSERT INTO trabajo(id_trabajo,trabajo_titulo,fecha_presentacion,proceso,categoria_de_ascenso) VALUES('$id_trabajo','$titulo','$fecha_pp','$proceso','$categoria_ascenso')");
        		$sql->execute(); 
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function listar_trabajos($offset,$per_page){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM trabajo , usuario_trabajo , trabajo_fase ,trabajo_linea , usuario , linea , fase WHERE usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.fk_usuario = usuario.id_usuario AND trabajo_fase.fk_trabajo = trabajo.id_trabajo AND trabajo_fase.fk_fase = fase.id_fase AND trabajo_linea.fk_trabajo = trabajo.id_trabajo AND trabajo_linea.fk_linea = linea.id_linea ORDER BY id LIMIT :per_page OFFSET :offset");
				$query->execute(array(':offset' => $offset, ':per_page' => $per_page));
				$resultado = $query->fetchAll();
				return $resultado;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}


	function todos_los_trabajos(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo , usuario_trabajo , trabajo_fase ,trabajo_linea , usuario , linea , fase WHERE usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.fk_usuario = usuario.id_usuario AND trabajo_fase.fk_trabajo = trabajo.id_trabajo AND trabajo_fase.fk_fase = fase.id_fase AND trabajo_linea.fk_trabajo = trabajo.id_trabajo AND trabajo_linea.fk_linea = linea.id_linea");
        		$sql->execute();
    			$datosDB = $sql->fetchAll();
    			$cant = $sql->rowCount();
    			$result = array('datos' => $datosDB, 'cantidad' => $cant);
    			return $result;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}


	public function numero_de_trabajos(){
	
		try
			{	
				$sql   = $this->pdo->query("SELECT COUNT(*) FROM trabajo , usuario_trabajo , trabajo_fase ,trabajo_linea , usuario , linea , fase WHERE usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.fk_usuario = usuario.id_usuario AND trabajo_fase.fk_trabajo = trabajo.id_trabajo AND trabajo_fase.fk_fase = fase.id_fase AND trabajo_linea.fk_trabajo = trabajo.id_trabajo AND trabajo_linea.fk_linea = linea.id_linea");
				$numrows = $sql->fetchColumn();
    			return $numrows;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function buscar($filtro){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo , usuario_trabajo , trabajo_fase ,trabajo_linea , usuario , linea , fase WHERE usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.fk_usuario = usuario.id_usuario AND trabajo_fase.fk_trabajo = trabajo.id_trabajo AND trabajo_fase.fk_fase = fase.id_fase AND trabajo_linea.fk_trabajo = trabajo.id_trabajo AND trabajo_linea.fk_linea = linea.id_linea AND trabajo.trabajo_titulo LIKE '$filtro%'");
        		$sql->execute(); 
    			$datosDB = $sql->fetchAll();
    			$cant = $sql->rowCount();
    			$result = array('datos' => $datosDB, 'cantidad' => $cant);
    			return $result;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_trabajo($id_trabajo){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM trabajo , usuario_trabajo , trabajo_fase ,trabajo_linea , usuario , linea , fase WHERE usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_trabajo.fk_usuario = usuario.id_usuario AND trabajo_fase.fk_trabajo = trabajo.id_trabajo AND trabajo_fase.fk_fase = fase.id_fase AND trabajo_linea.fk_trabajo = trabajo.id_trabajo AND trabajo_linea.fk_linea = linea.id_linea AND trabajo.id_trabajo = '$id_trabajo'");
        		$sql->execute();
        		//Con fetchAll() puedo hacer los crud PERO no puedo iniciar sesion
        		//Con fetch(PDO::FETCH_ASSOC)  puedo iniciar sesion  PERO no puedo gestionar los crud  
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>