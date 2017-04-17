<?php
	require '../mvc/model/model.php';

	try
	{
		authentifyAccount($_POST['username'],$_POST['password']);
	}
	catch(Exception $e)
	{
		header('Location: ../index.php');
	}


?>
