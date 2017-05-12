<?php 
/**
MODELO DE ROL_MODULO:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Rol_Mod{

	private $pdo;
	private $id;
	private $fk_rol;
	private $fk_modulo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_rol($fk_rol){$this->fk_rol = $fk_rol;}
	public function get_fk_rol(){return $this->fk_rol;}
	
	public function set_fk_modulo($fk_modulo){$this->fk_modulo = $fk_modulo;}
	public function get_fk_modulo(){return $this->fk_modulo;}
	

	public function asignar_modulo(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro)
    VALUES ('$this->fk_rol','$this->fk_modulo',NOW());
");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){
   		
		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM rol_modulo WHERE fk_rol='$this->fk_rol'");
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_modulo($modulo){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM rol_modulo , modulo WHERE rol_modulo.fk_modulo = modulo.id_modulo AND rol_modulo.fk_rol = '$this->fk_rol' AND modulo.modulo_nombre = '$modulo'");
    			$sql->execute();
    			return $sql->rowCount();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_rol(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT modulo.* FROM rol , rol_modulo , modulo WHERE rol_modulo.fk_modulo = modulo.id_modulo AND rol_modulo.fk_rol = rol.id_rol AND rol_modulo.fk_rol = '$this->fk_rol' ORDER BY modulo.id_modulo");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function modulos_deshabilitados(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT modulo.* FROM modulo WHERE  NOT(modulo.id_modulo in (select fk_modulo FROM rol_modulo,modulo,rol WHERE  rol_modulo.fk_modulo = modulo.id_modulo AND rol_modulo.fk_rol = rol.id_rol AND rol_modulo.fk_rol = '$this->fk_rol'))");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>