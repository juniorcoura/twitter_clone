<?php

	//ini_set('error_reporting', 'E_STRICT');

	require_once "../vendor/autoload.php";

	$route = new \App\Route;
	
	try {

		$conn = new \PDO(
			"mysql:host=localhost;dbname=twitter_clone;charset=utf8",
			"root",
			"" 
		);
		
		return $conn;

	} catch (\PDOException $e) {
		echo($e);
	}

?>