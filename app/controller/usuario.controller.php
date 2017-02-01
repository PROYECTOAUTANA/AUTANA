<?php
require "app/model/usuario.model.php";
Class usuarioController{

private $model;

	function __construct(){

		$this->model = new Usuario();
	}

	function validarSesion(){
		session_start();
		$datosDB = $this->model->validar($_POST['usuario'],$_POST['password']);
		$_SESSION['id'] = $datosDB['id'];

		if ($datosDB['tipo'] == 1) 	header("location: ?controller=index&action=portalAdmin");
		elseif ($datosDB['tipo'] == 2)	header("location: ?controller=index&action=Portal");	
	}

	function verificaEmail(){

		$datosDB = $this->model->validaCorreo($_POST['email']);
		session_start();
		$_SESSION['id'] = $datosDB['id'];
		$_SESSION['nombre'] = $datosDB['nombre'];

		header("location: ?controller=index&action=reestablecer");
	}

	function cambioClave(){
		session_start();
		$this->model->cambioClave($_POST['pass'],$_GET['id']);
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