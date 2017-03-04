<?php require "app/database/conexion.php";
class Usuario{

	private $pdo;
	private $tabla;

	public function __construct(){
		$this->pdo = new Conexion();
		$this->tabla = "usuario";
	}

	public function nuevo($nombre,$cedula,$correo,$usuario,$password,$tipo){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO $this->tabla ");
        		$sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){
				
				echo 'ERROR : '.$e->getMessage();
			}		
	}

	public function modificar($id,$nombre,$cedula,$correo,$usuario,$password,$tipo){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE $this->tabla SET nombre='$nombre', cedula='$cedula' WHERE id='$id'");
	    		$sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){
				
				echo 'ERROR : '.$e->getMessage();
			}
    }

	public function buscar($filtro){
		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE nombre LIKE '$filtro%'");
        		$sql->execute();
        		$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
        		return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){
				echo 'ERROR : '.$e->getMessage();
			}
	}

	public function obtenerTodos(){
		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla");
	    		$sql->execute(); 
	    		$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
	    		return $datosDB;		
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){
				echo 'ERROR : '.$e->getMessage();
			}
	}

	public function obtenerDatos($id){

		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id = '$id'");
	    		$sql->execute(); 
	    		$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
	    		return $datosDB;		
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			}catch(Exception $e){
				
				echo 'ERROR : '.$e->getMessage();
			}
		
	}

	public function eliminar($id){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM $this->tabla WHERE id = '$id'");
	    		$sql->execute();		
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			}catch(Exception $e){
				
				echo 'ERROR : '.$e->getMessage();
			}
	}
	
	public function eliminarTodo(){
		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM $this->tabla");
	    		$sql->execute();		
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			}catch(Exception $e){
				
				echo 'ERROR : '.$e->getMessage();
			}
	}

	public function encriptar($pass){
		$md5 = md5($pass);
		return $md5;
	}

	public function validar($usuario,$password){
		try
			{	
				
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE usuario = '$usuario' AND pass= '$password';");
        		$sql->execute();
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;	
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
			}		
	}
	
	public function validaCorreo($email){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE correo = '$email';");  
        		$sql->execute();
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;		
				parent::setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){
				echo 'ERROR : '.$e->getMessage();
			}
	}

	public function cambioClave($pass,$id){
		$md5 = md5($pass);
		$sql = $this->pdo->prepare("UPDATE $this->tabla SET pass = '$md5' WHERE id='$id';");
		$sql->execute();
	}
}
?>