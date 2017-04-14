<?php

	function getBdd()
	{
		define('HOST','127.0.1.1');
		define('DBName','nl773507');
		define('USER','nl773507');
		define('PASS','nl773507');

		try
		{
			$bdd = new PDO('mysql:host='.HOST.';dbname='.DBName, USER, PASS);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$bdd->exec("SET CHARACTER SET utf8");
		}

		catch (PDOException $e)
		{
			echo "<p>Erreur ! : ". $e->getMessage(). "</p><br/>";
			die();
		}

		return $bdd;
	}

	function getAccount()
	{
		$bdd=getBdd();
		$account = $bdd->query('select * from account');
		return $account;
	}

	function authentifyAccount($username,$passwd)
	{
		$account=getAccount();
		while($donnees = $account -> fetch())
		{
			if($donnees['username']==$username)
			{
				$hashPasswd = md5($passwd);
				if($hashPasswd == $donnees['password'])
				{

					session_start();

					$_SESSION['accountLevel']=$donnees['accountLevel'];
					header('Location: index.php');
					exit();

				}
			}
		}
	}
?>
