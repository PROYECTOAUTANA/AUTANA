<?php require "app/model/docente.model.php";
Class docenteController{

private $model;

	public function __construct(){

		$this->model = new Docente();
	}

	public function nuevoDocente(){ 

    	$this->model->nuevo();
        header("location: ?controller=index&action=nuevoUsuario");
    }

    public function listar(){ 
        
        $datosDB = $this->model->obtenerTodos();
        header("location: ?controller=index&action=listarUsuarios");
    }
}
?>