<?php

	function getBdd()
	{
		require_once(root.'/Assets/conf.php');

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
				$hashPasswd = password_hash($passwd);
				if($hashPasswd == password_verify($donnees['password'],$hashPasswd))
				{

					$_SESSION['connection']='true';
					$_SESSION['accountLevel']=$donnees['accountLevel'];
					$_SESSION['username']=$donnees['username'];

				}
			}
		}
	}

	function registerAccount()
	{
		$bdd = getBdd();

			try
			{
		        //On remplit la bdd
				$_SESSION['connection']=true;
		        $_SESSION['accountLevel']='1';
				$_SESSION['hashedpwd']=password_hash($_POST['password']);
				$_SESSION['username']=$_POST['user'];
				$_SESSION['name']=$_POST['name'];
				$_SESSION['fname']=$_POST['fname'];
				$_SESSION['email']=$_POST['email'];
				//insertBdd('account(username,password,accountLevel)',$test,$bdd);
		        $bdd -> exec('INSERT INTO account(username,password,accountLevel) VALUES(\''.$_SESSION['username'].'\',\''.$_SESSION['hashedpwd'].'\',\''.$_SESSION['accountLevel'].'\')');

		        //Récupération de l'id pour faire match l'id de l'account et l'id de l'user

		        $tmp = $bdd -> query('SELECT id FROM account ORDER BY id DESC limit 1');
		        $id = $tmp -> fetch();

		        $bdd -> exec('INSERT INTO user VALUES(\''.$id['id'].'\',\''.$_SESSION['name'].'\',\''.$_SESSION['fname'].'\',\''.$_SESSION['email'].'\')');
			}
			catch(Exception $e)
			{
				echo($e->getMessage());
			}

	}
?>
