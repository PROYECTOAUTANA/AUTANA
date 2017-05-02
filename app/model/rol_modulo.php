<?php 
require_once "app/database/conexion.php";
class Rol_Mod{

	private $pdo;
	private $id;
	private $fk_rol;
	private $fk_modulo;
	private $fecha_de_registro;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_fk_rol($fk_rol){$this->fk_rol = $fk_rol;}
	public function get_fk_rol(){return $this->fk_rol;}
	
	public function set_fk_modulo($fk_modulo){$this->fk_modulo = $fk_modulo;}
	public function get_fk_modulo(){return $this->fk_modulo;}

	public function set_fecha_de_registro($fecha_de_registro){$this->fecha_de_registro = $fecha_de_registro;}
	public function get_fecha_de_registro(){return $this->fecha_de_registro;}

	public function asignar_modulo(){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO rol_modulo(fk_rol, fk_modulo, rol_modulo_fecha_registro)
    VALUES ('$this->fk_rol','$this->fk_modulo','$this->fecha_de_registro');
");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function verificar_permiso($modulo){
   		
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

	public function verModulos(){
   		
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
}
?>