<?php require_once "app/database/conexion.php";
class Reporte{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
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

	function todos_los_usuarios(){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_departamento , departamento , categoria , usuario_rol ,rol WHERE  usuario_departamento.fk_departamento = departamento.id_departamento AND usuario_departamento.fk_usuario = usuario.id_usuario AND usuario.fk_categoria = categoria.id_categoria AND usuario_rol.fk_rol = rol.id_rol AND usuario_rol.fk_usuario = usuario.id_usuario");
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
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

}
?>