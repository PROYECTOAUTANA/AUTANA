<?php require_once "app/database/conexion.php";
class Usuario{

	private $pdo;

	public function __construct(){
	
		$this->pdo = new Conexion();
	}

	public function registrar_usuario($id_usuario,$cedula,$nombre,$apellido,$sexo,$edad,$telefono,$correo,$direccion,$usuario,$clave,$tipo,$categoria){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario VALUES('$id_usuario','$cedula','$nombre','$apellido','$sexo','$edad','$telefono','$correo','$direccion',null,'$usuario','$clave','$tipo','$categoria')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_usuario($id_usuario){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario ='$id_usuario'");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function registrar_categoria($id_categoria,$categoria){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("INSERT INTO categoria VALUES('$id_categoria','$categoria')");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	public function eliminar_categoria($id_categoria){
   		
		try
			{	
				$sql3 = $this->pdo->prepare("DELETE FROM categoria WHERE id_categoria = '$id_categoria'");
    			$result = $sql3->execute();
    			return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function login($usuario,$password){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_rol , rol WHERE usuario.usuario_usuario = '$usuario' AND usuario.clave = '$password'");
        		$sql->execute(); 
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function validaCorreo($email){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_correo = '$email'");
        		$sql->execute(); 
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambio_clave($id_usuario,$new_pass){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET clave = '$new_pass' WHERE id_usuario='$id_usuario'");
        		$sql->execute(); 
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}


	public function consultar_id($id_usuario){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_departamento , departamento , categoria , usuario_rol ,rol WHERE usuario_departamento.fk_departamento = departamento.id_departamento AND usuario_departamento.fk_usuario = usuario.id_usuario AND usuario.fk_categoria = categoria.id_categoria AND usuario_rol.fk_rol = rol.id_rol AND usuario_rol.fk_usuario = usuario.id_usuario  AND usuario.id_usuario = '$id_usuario'");
        		$sql->execute(); 
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_cedula($usuario_cedula){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_departamento , departamento , categoria , usuario_rol ,rol WHERE usuario_departamento.fk_departamento = departamento.id_departamento AND usuario_departamento.fk_usuario = usuario.id_usuario AND usuario.fk_categoria = categoria.id_categoria AND usuario_rol.fk_rol = rol.id_rol AND usuario_rol.fk_usuario = usuario.id_usuario  AND usuario.usuario_cedula = '$usuario_cedula'");
        		$sql->execute(); 
    			$datosDB = $sql->fetch(PDO::FETCH_ASSOC);
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}


	public function buscar($filtro){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_departamento , departamento , categoria , usuario_rol ,rol WHERE usuario_departamento.fk_departamento = departamento.id_departamento AND usuario_departamento.fk_usuario = usuario.id_usuario AND usuario.fk_categoria = categoria.id_categoria AND usuario_rol.fk_rol = rol.id_rol AND usuario_rol.fk_usuario = usuario.id_usuario AND usuario.usuario_nombre LIKE '$filtro%'");
        		$sql->execute(); 
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function listar(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_departamento , departamento , categoria , usuario_rol ,rol WHERE  usuario_departamento.fk_departamento = departamento.id_departamento AND usuario_departamento.fk_usuario = usuario.id_usuario AND usuario.fk_categoria = categoria.id_categoria AND usuario_rol.fk_rol = rol.id_rol AND usuario_rol.fk_usuario = usuario.id_usuario");
        		$sql->execute(); 
    			$datosDB = $sql->fetchAll();
    			return $datosDB;
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

}
?>