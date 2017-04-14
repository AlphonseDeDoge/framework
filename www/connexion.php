<?php
	require '../mvc/model/model.php';

	try
	{
		authentifyAccount($_POST['username'],$_POST['password']);
	}
	catch(Exception $e)
	{
		echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';
	}


?>
