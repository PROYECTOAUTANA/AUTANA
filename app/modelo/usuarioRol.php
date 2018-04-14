<?php 
/**
MODELO DE USUARIO_ROL:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Usuario_Rol{

	private $pdo;
	private $id;
	private $fk_usuario;
	private $fk_rol;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_usuario($fk_usuario){$this->fk_usuario = $fk_usuario;}
	public function get_fk_usuario(){return $this->fk_usuario;}
	
	public function set_fk_rol($fk_rol){$this->fk_rol = $fk_rol;}
	public function get_fk_rol(){return $this->fk_rol;}

	public function asignar_rol(){
   		
		try
			{	
				$consulta = "INSERT INTO 
								usuario_rol(
									fk_usuario, fk_rol, 
										usuario_rol_fecha_registro) 
							VALUES(
								'$this->fk_usuario',
									'$this->fk_rol', 
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
								usuario,usuario_rol,rol 
							WHERE 
								usuario_rol.fk_rol = rol.id_rol 
							AND
							 	usuario_rol.fk_usuario = usuario.id_usuario 
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

	public function consultar_rol(){
		try
			{	
				$consulta = "SELECT 
							* 
							FROM 
								usuario,usuario_rol,rol 
							WHERE 
								usuario_rol.fk_rol = rol.id_rol 
							AND 
								usuario_rol.fk_usuario = usuario.id_usuario 
							AND 
								rol.id_rol = '$this->fk_rol'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function actualizar_rol(){
		try
			{	
				$consulta = "UPDATE 
								usuario_rol 
							SET 
								fk_rol = '$this->fk_rol' 
							WHERE 
								fk_usuario = '$this->fk_usuario'";

				$sql = $this->pdo->prepare($consulta);
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>