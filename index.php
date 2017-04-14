<?php

	require '/mvc/model/model.php'

	try {
		$bdd = getBdd();
		require '/www/accueil.php';
	} catch (Exception $e) {

	}

?>
