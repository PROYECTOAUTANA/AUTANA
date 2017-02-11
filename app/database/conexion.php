<?php  
Class Conexion extends PDO{

	public Function __construct(){

		try {
			parent::__construct('mysql:host=localhost;dbname=autana', 'root', '');
		} catch (Exception $e) {
			echo "PDO error: ".$e->getMessage();
		}
	}
}
?>