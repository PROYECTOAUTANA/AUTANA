<?php require "app/database/conexion.php";
class Usuario{

	private $pdo;
	private $tabla;

	public function __construct(){
		$this->pdo = new Conexion();
		$this->tabla = "usuarios";
	}

	public function nuevo($nombre,$cedula,$correo,$usuario,$password,$tipo){

		$sql = $this->pdo->prepare("INSERT INTO $this->tabla ");
        $sql->execute();		
	}

	public function modificar($id,$nombre,$cedula,$correo,$usuario,$password,$tipo){

    	$sql = $this->pdo->prepare("UPDATE $this->tabla SET nombre='$nombre', cedula='$cedula' WHERE id='$id'");
	    $sql->execute(); 
    }

	public function buscar($filtro){
		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE nombre LIKE '$filtro%'");
        $sql->execute();
        $datosDB = $sql->fetch(PDO::FETCH_ASSOC);
        return $datosDB;
	}

	public function obtenerTodos(){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla");
	    $sql->execute(); 
	    $datosDB = $sql->fetch(PDO::FETCH_ASSOC);
	    return $datosDB;
	}

	public function obtenerDatos($id){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id = '$id'");
	    $sql->execute(); 
	    $datosDB = $sql->fetch(PDO::FETCH_ASSOC);
	    return $datosDB;
	}

	public function eliminar($id){

	    $sql = $this->pdo->prepare("DELETE FROM $this->tabla WHERE id = '$id'");
	    $sql->execute(); 
	}
	
	public function eliminarTodo(){

	    $sql = $this->pdo->prepare("DELETE FROM $this->tabla");
	    $sql->execute(); 
	}

	public function encriptar($pass){
		$md5 = md5($pass);
		return $md5;
	}

	public function validar($usuario,$password){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE user = '$usuario' AND pass= '$password';");
        $sql->execute();
    	$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    	return $datosDB;		
	}
	
	public function validaCorreo($email){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE correo = '$email';");  
        $sql->execute();
    	$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    	return $datosDB;
	}

	public function cambioClave($pass,$id){
		$md5 = md5($pass);
		$sql = $this->pdo->prepare("UPDATE $this->tabla SET pass = '$md5' WHERE id='$id';");
		$sql->execute();
	}
}
?>