<?php require "app/database/conexion.php";
class Docente{

	private $pdo;
	private $tabla;

	public function __construct(){
		$this->pdo = new Conexion();
		$this->tabla = "docente";
	}

	public function nuevo($nombre,$cedula,$correo,$usuario,$password,$tipo){

		$sql = $this->pdo->prepare("INSERT INTO $this->tabla ");
        $sql->execute();		
	}
}
?>