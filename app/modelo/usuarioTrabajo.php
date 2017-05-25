<?php 
/**
MODELO DE USUARIO_TRABAJO:

METODOS:

**/
require_once "app/database/conexion.php";
class Modelo_Usuario_Trabajo{

	private $pdo;
	private $id;
	private $fk_usuario;
	private $fk_trabajo;
	private $vinculo;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_fk_usuario($fk_usuario){$this->fk_usuario = $fk_usuario;}
	public function get_fk_usuario(){return $this->fk_usuario;}
	
	public function set_fk_trabajo($fk_trabajo){$this->fk_trabajo = $fk_trabajo;}
	public function get_fk_trabajo(){return $this->fk_trabajo;}
	
	public function set_vinculo($vinculo){$this->vinculo = $vinculo;}
	public function get_vinculo(){return $this->vinculo;}


	public function relacionar_usuario(){
   		
		try
			{	
    			$sql = $this->pdo->prepare("INSERT INTO usuario_trabajo (fk_usuario, fk_trabajo, vinculo, fecha_de_asignacion) VALUES ('$this->fk_usuario', '$this->fk_trabajo', '$this->vinculo',NOW())");
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_usuario(){
   		
		try
			{	
    			$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_trabajo, trabajo WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario.id_usuario = '$this->fk_usuario' ");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_usuario_vinculo(){
   		
		try
			{	
    			$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_trabajo, trabajo WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario.id_usuario = '$this->fk_usuario' AND usuario_trabajo.vinculo = '$this->vinculo'");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar_vinculo(){
		try
			{	
				$consulta = "UPDATE 
								usuario_trabajo
							SET 
								vinculo = '$this->vinculo',
								fecha_de_asignacion = NOW()
							WHERE 
								fk_usuario = '$this->fk_usuario'
							AND 
								fk_trabajo = '$this->fk_trabajo'";

				$sql = $this->pdo->prepare($consulta);
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function trabajos_aprobados_como_autor(){
   		
		try
			{	
				$consulta = "SELECT 
								trabajo.* 
							FROM 
								trabajo
							join 
								trabajo_fase on trabajo.id_trabajo = trabajo_fase.fk_trabajo 
							join 
								fase on trabajo_fase.fk_fase = fase.id_fase
							join 
								usuario_trabajo on trabajo.id_trabajo = usuario_trabajo.fk_trabajo 
							join 
								usuario on usuario_trabajo.fk_usuario = usuario.id_usuario
							WHERE 
								usuario_trabajo.vinculo = 'autor' 
							AND 
								fase.fase_nombre = 'aprobacion' 
							AND 
								usuario.id_usuario = 1";

    			$sql = $this->pdo->prepare($consulta);
    			$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function consultar_trabajo(){
		try
			{	
    			$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_trabajo, trabajo WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND trabajo.id_trabajo = '$this->fk_trabajo' ");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function eliminar_relacion(){
		try
			{	
    			$sql = $this->pdo->prepare("DELETE FROM usuario_trabajo WHERE fk_usuario = '$this->fk_usuario' and vinculo = '$this->vinculo'");
    			
    			return $sql->execute();
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function consultar_trabajo_estatus(){
   		
		try
			{	
    			$sql = $this->pdo->prepare("SELECT * FROM usuario , usuario_trabajo, trabajo, usuario_departamento , departamento , categoria WHERE usuario_trabajo.fk_usuario = usuario.id_usuario AND usuario_trabajo.fk_trabajo = trabajo.id_trabajo AND usuario_departamento.fk_usuario = usuario.id_usuario AND usuario_departamento.fk_departamento = departamento.id_departamento AND usuario.fk_categoria = categoria.id_categoria AND trabajo.id_trabajo = '$this->fk_trabajo' ");
    			$sql->execute();
    			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
}
?>