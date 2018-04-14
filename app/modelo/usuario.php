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

	public function set_nombre($nombre = 'sin asignar'){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}

	public function set_apellido($apellido = 'sin asignar'){$this->apellido = $apellido;}
	public function get_apellido(){return $this->apellido;}
	
	public function set_cedula($cedula = 'sin asignar'){$this->cedula = $cedula;}
	public function get_cedula(){return $this->cedula;}

	public function set_correo($correo = 'sin asignar'){$this->correo = $correo;}
	public function get_correo(){return $this->correo;}

	public function set_telefono($telefono = 'sin asignar'){$this->telefono = $telefono;}
	public function get_telefono(){return $this->telefono;}

	public function set_sexo($sexo){$this->sexo = $sexo;}
	public function get_sexo(){return $this->sexo;}

	public function set_direccion($direccion = 'sin asignar'){$this->direccion = $direccion;}
	public function get_direccion(){return $this->direccion;}

	public function set_clave($clave = 'sin asignar'){$this->clave = $clave;}
	public function get_clave(){return $this->clave;}

	public function set_estado($estado = 0){$this->estado = $estado;}
	public function get_estado(){return $this->estado;}

	public function set_fk_categoria($fk_categoria){$this->fk_categoria = $fk_categoria;}
	public function get_fk_categoria(){return $this->fk_categoria;}

	
	public function insertar(){

		try
			{	
				$consulta = "INSERT INTO usuario(usuario_cedula, usuario_nombre, 
												usuario_apellido,usuario_sexo, 
												usuario_telefono, usuario_correo, 
												usuario_direccion, usuario_clave,
												usuario_fecha_registro,fk_categoria,fecha_asignacion_de_categoria,
												usuario_estado) 
							VALUES ('$this->cedula','$this->nombre',
									'$this->apellido','$this->sexo',
									'$this->telefono','$this->correo',
									'$this->direccion','$this->clave',
									NOW(),'$this->fk_categoria',NOW(),
									'$this->estado')";

				$sql = $this->pdo->prepare($consulta);
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	
	public function actualizar(){

		try
			{	
				$consulta = "UPDATE 
								usuario 
							SET usuario_nombre = '$this->nombre',
								 usuario_apellido = '$this->apellido',
								  usuario_sexo = '$this->sexo', 
								  	usuario_telefono = '$this->telefono',
								  	 usuario_correo = '$this->correo',
								  	  usuario_direccion = '$this->direccion'
							WHERE 
								id_usuario = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar(){

		try
			{	
				$consulta = "DELETE FROM usuario WHERE id_usuario = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM usuario
								join categoria on usuario.fk_categoria = categoria.id_categoria
								join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
								join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
								join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
								join rol on usuario_rol.fk_rol = rol.id_rol 
							ORDER BY usuario.id_usuario";

				$query = $this->pdo->prepare($consulta);
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
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM usuario
								join categoria on usuario.fk_categoria = categoria.id_categoria
								join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
								join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
								join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
								join rol on usuario_rol.fk_rol = rol.id_rol 
							WHERE 
								usuario.id_usuario = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_clave(){
		try
			{	
				$consulta = "SELECT 
								usuario.* 
							FROM usuario
								join categoria on usuario.fk_categoria = categoria.id_categoria
								join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
								join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
								join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
								join rol on usuario_rol.fk_rol = rol.id_rol 
							WHERE 
								usuario.usuario_clave = '$this->clave'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function consultar_cedula(){
		try
			{	
				$consulta = "SELECT usuario.*,rol.*,departamento.*,categoria.* 
							FROM usuario
								join categoria on usuario.fk_categoria = categoria.id_categoria
								join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
								join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
								join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
								join rol on usuario_rol.fk_rol = rol.id_rol 
							WHERE 
								usuario.usuario_cedula = '$this->cedula'";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function buscar($filtro){
	
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM usuario
								join categoria on usuario.fk_categoria = categoria.id_categoria
								join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
								join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
								join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
								join rol on usuario_rol.fk_rol = rol.id_rol

							WHERE 
								usuario.usuario_nombre LIKE '$filtro%' 
							OR 
								departamento.departamento_nombre LIKE '$filtro%' 
							OR 
								rol.rol_nombre LIKE '$filtro%' 
							OR 
								categoria.categoria_nombre LIKE '$filtro%'
							OR 
								usuario.usuario_cedula LIKE '$filtro%'
							OR 
								usuario.usuario_apellido LIKE '$filtro%'";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function validar_usuario(){
   		
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM 
								usuario
								join categoria on usuario.fk_categoria = categoria.id_categoria
								join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
								join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
								join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
								join rol on usuario_rol.fk_rol = rol.id_rol 
							WHERE 
								usuario_nombre = '$this->nombre' 
							AND 
								usuario_clave = '$this->clave'";

				$sql = $this->pdo->prepare($consulta);
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
				$consulta = "SELECT * FROM usuario WHERE usuario_correo = '$this->correo'";

				$sql = $this->pdo->prepare($consulta);
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
				$consulta = "UPDATE 
								usuario 
							SET 
								usuario_estado = '$this->estado' 
							WHERE 
								id_usuario='$this->id'";

				$sql = $this->pdo->prepare($consulta);
        		 
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambiar_clave(){
		try
			{	
				$consulta = "UPDATE 
								usuario 
							SET 
								usuario_clave = '$this->clave' 
							WHERE 
								id_usuario='$this->id'";

				$sql = $this->pdo->prepare($consulta);
    			return $sql->execute();
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function obtener_ultimo_usuario(){
	
		try
			{	
				$consulta = "SELECT MAX(id_usuario) as ultimo FROM usuario";

				$sql = $this->pdo->prepare($consulta);
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
				$consulta = "UPDATE 
								usuario 
							SET 
								fk_categoria = '$this->fk_categoria',
								fecha_asignacion_de_categoria = NOW()
							WHERE 
								id_usuario = '$this->id'";

				$sql = $this->pdo->prepare($consulta);
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_usuarios(){
	
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM 
								usuario
							join categoria on usuario.fk_categoria = categoria.id_categoria
							join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
							join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
							join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
							join rol on usuario_rol.fk_rol = rol.id_rol";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function reportar_usuarios_fecha($desde,$hasta){
	
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM 
								usuario
							join categoria on usuario.fk_categoria = categoria.id_categoria
							join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
							join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
							join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
							join rol on usuario_rol.fk_rol = rol.id_rol

							WHERE 
								usuario.usuario_fecha_registro BETWEEN ('$desde') AND ('$hasta')";

				$sql = $this->pdo->prepare($consulta);
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function reportar_usuario_categoria($desde,$hasta){
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM 
								usuario
							join categoria on usuario.fk_categoria = categoria.id_categoria
							join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
							join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
							join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
							join rol on usuario_rol.fk_rol = rol.id_rol 
							
							WHERE 
								categoria.id_categoria = '$this->fk_categoria'
							AND 
								usuario.usuario_fecha_registro BETWEEN ('$desde') AND ('$hasta')";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_usuarios_filtrados($id_departamento,$id_categoria,$desde,$hasta){
		try
			{	
				$consulta = "SELECT 
								usuario.*,rol.*,departamento.*,categoria.* 
							FROM 
								usuario
							join categoria on usuario.fk_categoria = categoria.id_categoria
							join usuario_departamento on usuario.id_usuario = usuario_departamento.fk_usuario 
							join departamento on usuario_departamento.fk_departamento = departamento.id_departamento
							join usuario_rol on usuario.id_usuario = usuario_rol.fk_usuario 
							join rol on usuario_rol.fk_rol = rol.id_rol 

							WHERE 
								departamento.id_departamento = '$id_departamento' 
							AND 
								categoria.id_categoria = '$id_categoria' 
							AND 
								usuario.usuario_fecha_registro BETWEEN ('$desde') AND ('$hasta')";

				$sql = $this->pdo->prepare($consulta);
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>