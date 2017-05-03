<?php require_once "app/database/conexion.php";
class Usuario{

	private $pdo;
	private $id;
	private $nombre;
	private $apellido;
	private $cedula;
	private $correo;
	private $telefono;
	private $sexo;
	private $direccion;
	private $usuario;
	private $clave;
	private $fk_categoria;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}

	public function set_apellido($apellido){$this->apellido = $apellido;}
	public function get_apellido(){return $this->apellido;}
	
	public function set_cedula($cedula){$this->cedula = $cedula;}
	public function get_cedula(){return $this->cedula;}

	public function set_correo($correo){$this->correo = $correo;}
	public function get_correo(){return $this->correo;}

	public function set_telefono($telefono){$this->telefono = $telefono;}
	public function get_telefono(){return $this->telefono;}

	public function set_sexo($sexo){$this->sexo = $sexo;}
	public function get_sexo(){return $this->sexo;}

	public function set_direccion($direccion){$this->direccion = $direccion;}
	public function get_direccion(){return $this->direccion;}

	public function set_usuario($usuario){$this->usuario = $usuario;}
	public function get_usuario(){return $this->usuario;}

	public function set_clave($clave){$this->clave = $clave;}
	public function get_clave(){return $this->clave;}

	public function set_fk_categoria($fk_categoria){$this->fk_categoria = $fk_categoria;}
	public function get_fk_categoria(){return $this->fk_categoria;}

	
	public function registrar_usuario(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario(usuario_cedula, usuario_nombre, usuario_apellido, 
            usuario_sexo, usuario_telefono, usuario_correo, usuario_direccion, 
            usuario_usuario, usuario_clave, usuario_fecha_registro, fk_categoria) VALUES ('$this->cedula','$this->nombre','$this->apellido','$this->sexo','$this->telefono','$this->correo','$this->direccion','$this->usuario','$this->clave',NOW(),'$this->fk_categoria')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function login(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_usuario = '$this->usuario' AND usuario_clave = '$this->clave'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
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
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambio_clave(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET clave = '$new_pass' WHERE id_usuario='$id_usuario'");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}


	public function consultar_id(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , categoria WHERE usuario.id_usuario = '$this->id'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}


	public function listar_usuarios($offset,$per_page){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM usuario,  categoria ORDER BY id_usuario LIMIT :per_page OFFSET :offset");
				$query->execute(array(':offset' => $offset, ':per_page' => $per_page));
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function numero_de_usuarios(){
	
		try
			{	
				$sql   = $this->pdo->query("SELECT COUNT(*) FROM usuario");
    			return $sql->fetchColumn();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function ultimo_usuario(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT MAX(id_usuario) as ultimo FROM usuario");
        		$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>