<?php
	require_once "app/model/usuario.php";
    $controller = "buscar";
	$filtro = $_POST['filtro'];
    $usuario = new Usuario();
	$db = $usuario->buscar($filtro);
    require_once "app/view/usuarios.php";     
?>