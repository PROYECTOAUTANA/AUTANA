<?php 
/**
MODELO DE USUARIO_DEPARTAMENTO:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Usuario_Departamento{

	private $pdo;
	private $id;
	private $fk_usuario;
	private $fk_departamento;

	public function __construct(){
		$this->pdo = new Conexion();
	}


	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_fk_usuario($fk_usuario){$this->fk_usuario = $fk_usuario;}
	public function get_fk_usuario(){return $this->fk_usuario;}

	public function set_fk_departamento($fk_departamento){$this->fk_departamento = $fk_departamento;}
	public function get_fk_departamento(){return $this->fk_departamento;}

	public function asignar_departamento(){
   		
		try
			{	
				$consulta = "INSERT INTO 
								usuario_departamento(
									fk_usuario, fk_departamento, 
										usuario_departamento_fecha_registro) 
							VALUES(
								'$this->fk_usuario',
									'$this->fk_departamento',
										NOW()
							)";

				$sql = $this->pdo->prepare($consulta);
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_usuario(){
		try
			{	
				$consulta = "SELECT 
							* 
							FROM 
								usuario,usuario_departamento,departamento 
							WHERE 
								usuario_departamento.fk_departamento = departamento.id_departamento 
							AND 
								usuario_departamento.fk_usuario = usuario.id_usuario 
							AND 
								usuario.id_usuario = '$this->fk_usuario'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_departamento(){
		try
			{	
				$consulta = "SELECT 
							* 
							FROM 
								usuario,usuario_departamento,departamento 
							WHERE 
								usuario_departamento.fk_departamento = departamento.id_departamento 
							AND 
								usuario_departamento.fk_usuario = usuario.id_usuario 
							AND 
								departamento.id_departamento = '$this->fk_departamento'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function actualizar_departamento(){
		try
			{	
				$consulta = "UPDATE 
								usuario_departamento 
							SET 
								fk_departamento = '$this->fk_departamento' 
							WHERE 
								fk_usuario = '$this->fk_usuario'";

				$sql = $this->pdo->prepare($consulta);
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_usuarios($desde,$hasta){
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM 
								usuario,usuario_departamento,departamento,categoria,usuario_rol,rol 
							WHERE 
								usuario_departamento.fk_departamento = departamento.id_departamento 
							AND  
								usuario_departamento.fk_usuario = usuario.id_usuario 
							AND  
								usuario_rol.fk_rol = rol.id_rol 
							AND  
								usuario_rol.fk_usuario = usuario.id_usuario 
							AND  
								usuario.fk_categoria = categoria.id_categoria 
							AND 
							 	departamento.id_departamento = '$this->fk_departamento' 
							AND  
								usuario.usuario_fecha_registro 
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