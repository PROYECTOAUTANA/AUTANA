<?php 
require "app/model/usuario.php";
$model = new Usuario();
$pass = md5($_POST['password']);

		$arreglo_datos = $model->login($_POST['usuario'],$pass);

			if (!$arreglo_datos) {
				header("location: home");
			}else{
				session_start();
				$_SESSION['id']     = $arreglo_datos['usuario_id'];
				$_SESSION['user']   = $arreglo_datos['usuario_usuario'];
				$_SESSION['rol']   = $arreglo_datos['rol'];
				header("location: perfil");	
			}
 ?>