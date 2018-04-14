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

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_titulo($titulo = 'sin asignar'){$this->titulo = $titulo;}
	public function get_titulo(){return $this->titulo;}

	public function set_fecha_presentacion($fecha_presentacion){$this->fecha_presentacion = $fecha_presentacion;}
	public function get_fecha_presentacion(){return $this->fecha_presentacion;}
	
	public function set_proceso($proceso = 'sin asignar'){$this->proceso = $proceso;}
	public function get_proceso(){return $this->proceso;}

	public function set_mension($mension = 'sin asignar'){$this->mension = $mension;}
	public function get_mension(){return $this->mension;}

	public function set_resumen($resumen = 'sin asignar'){$this->resumen = $resumen;}
	public function get_resumen(){return $this->resumen;}


	public function insertar(){

	try
			{	
				$consulta = "INSERT INTO trabajo(trabajo_titulo, 
							trabajo_mension,trabajo_fecha_presentacion, 
							trabajo_proceso,trabajo_resumen,
							trabajo_fecha_registro)
							VALUES
								('$this->titulo',
									'$this->mension',
										' $this->fecha_presentacion',
											'$this->proceso',
													'$this->resumen',
														NOW())";

				$sql = $this->pdo->prepare($consulta);
        		
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function actualizar(){

		try
			{	
				$consulta = "UPDATE 
								trabajo 
							SET 
								trabajo_titulo = '$this->titulo', 
								trabajo_mension = '$this->mension', 
								trabajo_proceso = '$this->proceso', 
								trabajo_resumen = '$this->resumen' 
							WHERE 
								id_trabajo = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$consulta = "DELETE FROM trabajo WHERE id_trabajo = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$consulta = "SELECT 
								trabajo.*, linea.*,fase.* 
							FROM 
								trabajo
								join trabajo_fase on trabajo.id_trabajo = trabajo_fase.fk_trabajo 
								join fase on trabajo_fase.fk_fase = fase.id_fase
								join trabajo_linea on trabajo.id_trabajo = trabajo_linea.fk_trabajo 
								join linea on trabajo_linea.fk_linea = linea.id_linea 
							ORDER BY 
								id_trabajo";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	
	
	public function reportar_trabajos_fecha($desde,$hasta){
	
		try
			{	
				$consulta = "SELECT 
								trabajo.*,linea.*,fase.* 
							FROM 
								trabajo
								join trabajo_fase on trabajo.id_trabajo = trabajo_fase.fk_trabajo 
								join fase on trabajo_fase.fk_fase = fase.id_fase
								join trabajo_linea on trabajo.id_trabajo = trabajo_linea.fk_trabajo 
								join linea on trabajo_linea.fk_linea = linea.id_linea 
							WHERE 
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

	public function reportar_trabajos(){
	
		try
			{	
				$consulta = "SELECT 
								trabajo.*,linea.*,fase.* 
							FROM 
								trabajo
								join trabajo_fase on trabajo.id_trabajo = trabajo_fase.fk_trabajo 
								join fase on trabajo_fase.fk_fase = fase.id_fase
								join trabajo_linea on trabajo.id_trabajo = trabajo_linea.fk_trabajo 
								join linea on trabajo_linea.fk_linea = linea.id_linea";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function buscar($filtro){
	
		try
			{	
				$consulta = "SELECT 
								trabajo.*,linea.*,fase.* 
							FROM 
								trabajo
								join trabajo_fase on trabajo.id_trabajo = trabajo_fase.fk_trabajo 
								join fase on trabajo_fase.fk_fase = fase.id_fase
								join trabajo_linea on trabajo.id_trabajo = trabajo_linea.fk_trabajo 
								join linea on trabajo_linea.fk_linea = linea.id_linea
								join usuario_trabajo on trabajo.id_trabajo = usuario_trabajo.fk_trabajo 
								join usuario on usuario_trabajo.fk_usuario = usuario.id_usuario
							WHERE 
								trabajo.trabajo_titulo LIKE '$filtro%' 
							OR 
								fase.fase_nombre LIKE '$filtro%' 
							OR 
								linea.linea_nombre LIKE '$filtro%' 
							OR 
								usuario.usuario_nombre LIKE '$filtro%'
							OR 
								usuario.usuario_apellido LIKE '$filtro%'
							OR 
								usuario.usuario_cedula LIKE '$filtro%'
							OR 
								trabajo.trabajo_estado_actual LIKE '$filtro%'
							OR 
								trabajo.trabajo_mension LIKE '$filtro%'
							OR 
								trabajo.trabajo_proceso LIKE '$filtro%'";

				$sql = $this->pdo->prepare($consulta);
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
				$consulta = "SELECT * FROM trabajo WHERE id_trabajo = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
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
				$consulta = "SELECT MAX(id_trabajo) as ultimo FROM trabajo";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function reportar_trabajos_filtrados($id_fase,$id_linea,$desde,$hasta){
	
		try
			{	
				$consulta = "SELECT 
								trabajo.* , linea.*, fase.*
							FROM 
								trabajo
								join trabajo_fase on trabajo.id_trabajo = trabajo_fase.fk_trabajo 
								join fase on trabajo_fase.fk_fase = fase.id_fase
								join trabajo_linea on trabajo.id_trabajo = trabajo_linea.fk_trabajo 
								join linea on trabajo_linea.fk_linea = linea.id_linea 
							WHERE 
								trabajo_linea.fk_linea = '$id_linea' 
							AND 
								trabajo_fase.fk_fase = '$id_fase' 
							AND 
								trabajo.trabajo_fecha_registro 
							BETWEEN 
								('$desde') 
							AND 
								('$hasta')'";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function cerrar_trabajo(){

		try
			{	
				$consulta = "UPDATE 
								trabajo 
							SET 
								trabajo_estado_actual = 'cerrado', 
									trabajo_fecha_de_cierre = NOW() 
							WHERE 
								id_trabajo = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>