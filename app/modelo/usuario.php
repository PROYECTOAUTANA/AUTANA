<?php 
/**
MODELO DE USUARIO:

METODOS:


**/
require_once "app/database/conexion.php";
class Modelo_Usuario{

	private $pdo;
	private $id;
	private $nombre;
	private $apellido;
	private $cedula;
	private $correo;
	private $telefono;
	private $sexo;
	private $direccion;
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

	public function set_correo($correo=''){$this->correo = $correo;}
	public function get_correo(){return $this->correo;}

	public function set_telefono($telefono){$this->telefono = $telefono;}
	public function get_telefono(){return $this->telefono;}

	public function set_sexo($sexo){$this->sexo = $sexo;}
	public function get_sexo(){return $this->sexo;}

	public function set_direccion($direccion){$this->direccion = $direccion;}
	public function get_direccion(){return $this->direccion;}

	public function set_clave($clave){$this->clave = $clave;}
	public function get_clave(){return $this->clave;}

	public function set_estado($estado){$this->estado = $estado;}
	public function get_estado(){return $this->estado;}

	public function set_fk_categoria($fk_categoria){$this->fk_categoria = $fk_categoria;}
	public function get_fk_categoria(){return $this->fk_categoria;}

	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario(usuario_cedula, usuario_nombre, usuario_apellido, 
            usuario_sexo, usuario_telefono, usuario_correo, usuario_direccion, usuario_clave, usuario_fecha_registro, fk_categoria,usuario_estado) VALUES ('$this->cedula','$this->nombre','$this->apellido','$this->sexo','$this->telefono','$this->correo','$this->direccion','$this->clave',NOW(),'$this->fk_categoria','$this->estado')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET usuario_nombre = '$this->nombre', usuario_apellido = '$this->apellido', usuario_sexo = '$this->sexo', usuario_telefono = '$this->telefono', usuario_correo = '$this->correo', usuario_direccion = '$this->direccion' WHERE id_usuario = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM usuario , categoria where usuario.fk_categoria = categoria.id_categoria order by usuario.id_usuario");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function consultar(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , categoria WHERE usuario.fk_categoria = categoria.id_categoria and usuario.id_usuario = '$this->id'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function validar_usuario(){
   		
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_nombre = '$this->nombre' AND usuario_clave = '$this->clave'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function validar_correo(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_correo = '$this->correo'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambiar_estado(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET usuario_estado = '$this->estado' WHERE id_usuario='$this->id'");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambiar_clave(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET clave = '$this->clave' WHERE id_usuario='$this->id'");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function obtener_ultimo_usuario(){
	
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

	public function actualizar_categoria(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET fk_categoria = '$this->fk_categoria' WHERE id_usuario = '$this->id'");
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_usuarios(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario,categoria,usuario_rol,rol,usuario_departamento,departamento where usuario.fk_categoria = categoria.id_categoria and usuario_departamento.fk_usuario = usuario.id_usuario and usuario_departamento.fk_departamento = departamento.id_departamento and usuario_rol.fk_usuario = usuario.id_usuario and usuario_rol.fk_rol = rol.id_rol");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}
?>