<?php
require "app/model/usuario.model.php";
Class usuarioController{

private $model;

	function __construct(){

		$this->model = new Usuario();
	}

	function validarSesion(){
		session_start();
		$pass = $this->model->encriptar($_POST['password']);
		$datosDB = $this->model->validar($_POST['usuario'],$pass);
		$_SESSION['id'] = $datosDB['id'];
		$_SESSION['nombre'] = $datosDB['nombre'];
		$_SESSION['cedula'] = $datosDB['cedula'];
		$_SESSION['user'] = $datosDB['user'];
		$_SESSION['correo'] = $datosDB['correo'];

		if ($datosDB['tipo'] == 1){ 	
			header("location: ?controller=index&action=portalAdmin");
		}
		elseif ($datosDB['tipo'] == 2){	
			
			header("location: ?controller=index&action=Portal");
		}	
	}

	function verificaEmail(){

		$this->model->validaCorreo($_POST['email']);
		
	}

	function cambioClave(){
		session_start();
		echo $this->model->cambioClave($_POST['pass'],$_GET['id']);
		session_start();
		session_destroy();
		header("location: index.php");
	}

	function cerrarSesion(){
		session_start();
		session_destroy();
		header("location: index.php");
	}
}
?>