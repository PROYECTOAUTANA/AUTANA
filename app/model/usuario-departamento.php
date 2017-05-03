<?php require_once "app/database/conexion.php";
class Usuario_Departamento{

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
				$sql = $this->pdo->prepare("INSERT INTO usuario_departamento(fk_usuario, fk_departamento, usuario_departamento_fecha_registro) VALUES('$this->fk_usuario','$this->fk_departamento',NOW())");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>