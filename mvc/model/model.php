<?php

	function getBdd()
	{
		define('HOST','localhost');
		define('DBName','projet');
		define('USER','root');
		define('PASS','root');

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
					$_SESSION['username']=$donnees['username'];
					header('Location: ../../index.php');
					exit();

				}
			}
		}
	}
?>
