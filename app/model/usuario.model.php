<?php 
class Usuario{
	private $pdo;
	private $tabla;

	function __construct(){
		$this->pdo = new Conexion();
		$this->tabla = "usuarios";
	}

	function validar($usuario,$password){

	$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE user = '$usuario' AND pass= '$password';");
        $sql->execute();
        $contador = $sql->rowCount();
    	$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    	if ($contador == 1) return $datosDB;
    	elseif ($contador == 0) {
    		echo '<script>alert("Usuario o Contraseña Incorrecto")</script>';
    		header("location: index.php");
    	}
    		
	}

	function encriptar($pass){

		$md5 = md5($pass);
		return $md5;
	}
	
	function validaCorreo($email){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE correo = '$email';");  
        $sql->execute();
        $contador = $sql->rowCount();
    	$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    	if ($contador == 1) {

    	session_start();
		$_SESSION['id'] = $datosDB['id'];
		$_SESSION['nombre'] = $datosDB['nombre'];

		header("location: ?controller=index&action=reestablecer");
    	}

    	elseif ($contador == 0) header("location: index.php");
	}

	function cambioClave($pass,$id){
		$md5 = md5($pass);
		$sql = $this->pdo->prepare("UPDATE $this->tabla SET pass = '$md5' WHERE id='$id';");
		$sql->execute();
	}
}
?>