<?php

require('configBD.php');

try 
{
	$connection = new PDO('mysql:host='.HOST.';dbname='.DBName, USER, PASS);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connection->exec("SET CHARACTER SET utf8");
} 

catch (PDOException $e) 
{
	echo "<p>Erreur ! : ". $e->getMessage(). "</p><br/>";
	die();
}

?>
