<?php 

	# Conexion a la base de datos #
	function conexion(){
		$pdo = new PDO('mysql:host=localhost;dbname=todo_app', 'root', '');
		return $pdo;
	
    
    }
