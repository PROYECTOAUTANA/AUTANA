<?php 
/**
* MODELO DE MODULO:

METODOS: 

*/

require_once "app/database/conexion.php";

class Modelo_Modulo
{
	
	private $pdo;
	private $id;
	private $nombre;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}


	public function listar(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM modulo ORDER BY id_modulo");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
 ?>