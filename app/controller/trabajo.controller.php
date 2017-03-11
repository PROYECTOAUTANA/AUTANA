<?php require "app/model/trabajo.model.php";
Class trabajoController{

private $model;

	public function __construct(){

		$this->model = new Usuario();
	}

	public function nuevoTrabajo(){ 

    	$this->model->nuevo();
        header("location: ?controller=index&action=nuevoUsuario");
    }

    public function listar(){ 
        
        $datosDB = $this->model->obtenerTodos();
        header("location: ?controller=index&action=listarUsuarios");
    }
}
?>