<?php 
class Usuario{
	private $pdo;
	private $tabla;

	function __construct(){

		try {
			$this->pdo = new PDO('mysql:host=localhost;dbname=AUTANA', 'root', '');
		} catch (Exception $e) {
			echo "PDO error: ".$e->getMessage();
		}

		$this->tabla = "usuarios";
	}

	function validar($usuario,$password){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE user = '$usuario' AND pass = '$password';");  
        $sql->execute();
        $contador = $sql->rowCount();
    	$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    	if ($contador == 1) return $datosDB;
    	elseif ($contador == 0) echo '<script>alert("Usuario o Contraseña Incorrecto")</script>';
	}

	function getDatos($id){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id = '$id';");
		$sql->execute();
		$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
		return $datosDB;
	}

	function validaCorreo($email){

		$sql = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE correo = '$email';");  
        $sql->execute();
        $contador = $sql->rowCount();
    	$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    	if ($contador == 1) return $datosDB;
    	elseif ($contador == 0) echo '<script>alert("Correo no existe")</script>';
	}

	function cambioClave($pass,$id){
		
		$sql = $this->pdo->prepare("UPDATE $this->tabla SET pass='$pass' WHERE id='$id';");
		$sql->execute();


	}
}
?>