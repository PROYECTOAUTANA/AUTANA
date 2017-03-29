<?php 
require "app/model/trabajo.php";
$trabajo = new Trabajo();
$db = $trabajo->ver();
require_once "app/view/trabajos.php";
 ?>