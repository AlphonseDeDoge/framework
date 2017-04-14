<?php

	require 'mvc/model/model.php';
	try {
		$bdd = getBdd();

		//if(isset($_SESSION[]))
		if($wrong_password==1)
			require 'mvc/view/viewAccueilWrongPwd.php';
		else
			require 'mvc/view/viewAccueil.php';

	} catch (Exception $e) {

	}
?>
