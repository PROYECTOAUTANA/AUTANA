<?php require "app/model/usuario.model.php";
Class usuarioController{

private $model;

	public function __construct(){

		$this->model = new Usuario();
	}

	public function nuevoUsuario(){ 

    	$this->model->nuevo();
        header("location: ?controller=index&action=nuevoUsuario");
    }

    public function listar(){ 
        
        $datosDB = $this->model->obtenerTodos();
        header("location: ?controller=index&action=listarUsuarios");
    }

    public function buscar(){ 
        
        $datosDB = $this->model->buscar($_POST['filtro']);
        header("location: ?controller=index&action=listarUsuarios");
    }

    public function eliminar(){ 
        
        $datosDB = $this->model->obtenerDatos($_POST['id']);
        if ($datosDB) $this->model->eliminar($_POST['id']); 
        header("location: ?controller=index&action=listarUsuarios");
    }

    public function borrarTodo(){ 
        
        $this->model->eliminarTodo();
        header("location: ?controller=index&action=listarUsuarios");
    }

    public function verDatos(){ 
        
        $datosDB = $this->model->obtenerDatos($_POST["id"]);
    
        foreach ($datosDB as $dato) {
                $id = $dato[0];
            $nombre = $dato[1];
            $cedula = $dato[2];
        }
        header("location: ?controller=index&action=perfilUsuario");
    }

    public function editar(){ 
        
        $result = $this->model->obtenerDatos($_POST['id']);
        
        if ($result){ 
            $this->model->modificar($_POST['id'],$_POST['nombre'],$_POST['cedula']); 
            header("location: ?controller=index&action=listarUsuarios");
        }
    }

	public function validarSesion(){

		$pass = $this->model->encriptar($_POST['password']);
		$datosDB = $this->model->validar($_POST['usuario'],$pass);
			
			if ($datosDB) {
				session_start();
				$_SESSION['id']     = $datosDB['id'];
				$_SESSION['user']   = $datosDB['usuario'];
				$_SESSION['tipo']   = $datosDB['tipo'];
				header("location: ?controller=index&action=Portal");

			}else{
				header("location: ?controller=index&action=Home");
			}
	}

	public function verificaEmail(){

		$datosDB = $this->model->validaCorreo($_POST['email']);

			if ($datosDB) {
	    		session_start();
				$_SESSION['id'] = $datosDB['id'];
				$_SESSION['nombre'] = $datosDB['nombre'];
				header("location: ?controller=index&action=reestablecer");
	    	}elseif (!$datosDB) {
	    		header("location: ?controller=index&action=Home");	
	    	}
		
	}

	public function cambioClave(){
		session_start();
		echo $this->model->cambioClave($_POST['pass'],$_GET['id']);
		session_start();
		session_destroy();
		header("location: ?controller=index&action=Home");
	}

	public function cerrarSesion(){
		session_start();
		session_destroy();
		header("location: ?controller=index&action=Home");
	}
}
?>