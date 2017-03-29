<?php
$id_usuario = $_GET['id_usuario'];
$id_departamento = $_GET['id_departamento'];
$id_categoria = $_GET['id_categoria'];
$id_rol = $_GET['id_rol'];

require_once "app/model/usuario.php";
require_once "app/model/usuario-departamento.php";
require_once "app/model/departamento.php";
require_once "app/model/usuario-rol.php";
require_once "app/model/rol.php";


$obj_usuario = new Usuario();
$obj_usu_dep = new Usuario_Departamento();
$obj_departamento = new Departamento();
$obj_usu_rol = new Usuario_Rol();
$obj_rol = new Rol();



$obj_usu_dep->eliminar_usuario_departamento($id_usuario,$id_departamento);	
$obj_departamento->eliminar_departamento($id_departamento);	
$obj_usu_rol->eliminar_usuario_rol($id_usuario,$id_rol);
$obj_rol->eliminar_rol($id_rol);
$obj_usuario->eliminar_usuario($id_usuario);
$obj_usuario->eliminar_categoria($id_categoria);


header("location: gestionar-usuarios");
?>