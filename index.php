<?php

	require 'mvc/model/model.php';
	try {
		$bdd = getBdd();
		echo($_POST['username']);
		/*if(in_array($_COOKIE['username'],$_SESSION['name']))
			header('Location: www/inscription.php') ;
		else*/ require 'mvc/view/viewAccueil.php';

	} catch (Exception $e) {

	}
?>
