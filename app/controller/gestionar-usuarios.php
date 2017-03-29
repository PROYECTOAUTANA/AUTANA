<?php 
require "app/model/usuario.php";
$trabajo = new Usuario();
$db = $trabajo->listar();
require_once "app/view/usuarios.php";
 ?>