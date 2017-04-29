<?php 
require_once "app/database/conexion.php";
class Rol_Mod{

	private $pdo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function asignar_modulos($id_rol_mod,$id_rol,$id_mod){
   		
		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO rol_modulo VALUES('$id_rol_mod','$id_rol','$id_mod')");
    			$result = $sql->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>